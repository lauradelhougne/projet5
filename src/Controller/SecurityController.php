<?php

namespace App\Controller;

use App\Entity\Parents;
use App\Entity\RequestNanny;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Nanny;
use App\Form\RegistrationType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/registration", name="security_registration")
     */
    public function nannyRegistration(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $user = new Nanny();
        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $manager->persist($user);
            $manager->flush();
            return $this->render('security/connection.html.twig');
        };

        return $this->render('security/nannyRegistration.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/security_login", name="security_login")
     */
    public function login()
    {
        return $this->render('security/connection.html.twig', [
        ]);
    }

    /**
     * @Route("/parents/security_login", name="parents_login")
     */
    public function parentsLogin()
    {
        return $this->render('security/connection.html.twig', [
        ]);
    }

    /**
     * @Route("/test", name="test")
     */
    public function test()
    {
        return $this->render('security/childListNanny.html.twig', [
        ]);
    }

    /**
     * @Route("/logout", name="security_logout")
     */
    public function logout()
    {}

    /**
     * @Route("/childListNanny", name="security_childListNanny")
     */
    public function childListNanny()
    {
        return $this->render('security/childListNanny.html.twig', [
        ]);
    }

    /**
     * @Route("/childListParents", name="security_childListParents")
     */
    public function childListParents()
    {
        return $this->render('security/childListParents.html.twig', [
        ]);
    }

    /**
     * @Route("/modifyChildInfos", name="security_modifyChildInfos")
     */
    public function modifyChildInfos()
    {
        return $this->render('security/modifyChildInfos.html.twig', [
        ]);
    }

    /**
     * @Route("/modifyParentsInfos", name="security_modifyParentsInfos")
     */
    public function modifyParentsInfos()
    {
        return $this->render('security/modifyParentsInfos.html.twig', [
        ]);
    }

    /**
     * @Route("/modifyNannyInfos", name="security_modifyNannyInfos")
     */
    public function modifyNannyInfos()
    {
        return $this->render('security/modifyNannyInfos.html.twig', [
        ]);
    }

    /**
     * @Route("/createArticle", name="security_createArticle")
     */
    public function createArticle()
    {
        return $this->render('security/createArticle.html.twig', [
        ]);
    }

    /**
     * @Route("/requestsNanny", name="security_requestsNanny")
     */
    public function requestsNanny()
    {
        $em = $this->getDoctrine()->getManager();
        $listRequests = $em->getRepository(RequestNanny::class)->findBy(['nannyId' => $this->getUser()->getId()]);

        return $this->render('security/requestsNanny.html.twig', [
            'listRequests' => $listRequests,
        ]);
    }

    /**
     * @Route("/deleteRequest", name="ajax_delete_request")
     */
    public function deleteRequest(Request $request, \Swift_Mailer $mailer)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $requestToDelete = $em->getRepository(RequestNanny::class)->findOneBy(['id' => $request->get("id")]);
            $nanny = $em->getRepository(Nanny::class)->findOneBy(['id' => $requestToDelete->getNannyId()]);

            $message = (new \Swift_Message("Réponse négative garde d'enfant"))
                ->setFrom('delhougne.laura@gmail.com')
                ->setTo($requestToDelete->getEmail())
                ->setBody($this->renderView(
                        'emails/deleteRequest.html.twig', [
                            'firstName' => $requestToDelete->getParentFirstName(),
                            'lastName' => $requestToDelete->getParentLastName(),
                            'nannyFirstName' => $nanny->getFirstName(),
                            'nannyLastName' => $nanny->getLastName(),
                        ]
                    ), 'text/html');
            $mailer->send($message);

            //$em->remove($requestToDelete);
            //$em->flush();

            $listRequests = $em->getRepository(RequestNanny::class)->findBy(['nannyId' => $this->getUser()->getId()]);
            return $this->render('security/fragments/listRequestsNanny.html.twig', [
                'listRequests' => $listRequests,
            ]);
        }
    }

    /**
     * @Route("/acceptRequest", name="ajax_accept_request")
     */
    public function acceptRequest(Request $request, \Swift_Mailer $mailer, UserPasswordEncoderInterface $encoder)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $requestToDelete = $em->getRepository(RequestNanny::class)->findOneBy(['id' => $request->get("id")]);
            $nanny = $em->getRepository(Nanny::class)->findOneBy(['id' => $requestToDelete->getNannyId()]);

            $service = new UserService;
            $parentUser = new Parents();
            $parentUser->setFirstName($requestToDelete->getParentFirstName());
            $parentUser->setLastName($requestToDelete->getParentLastName());
            $parentUser->setRelation($requestToDelete->getRelation());
            $parentUser->setEmail($requestToDelete->getEmail());
            $parentUser->setPhone($requestToDelete->getPhone());
            /*$parentUser->setPassword(random_int(10, 10));
            $hash = $encoder->encodePassword($parentUser, $parentUser->getPassword());
            $parentUser->setPassword($hash);*/
            $parentUser->setPassword("test");
            $hash = $encoder->encodePassword($parentUser, $parentUser->getPassword());
            $parentUser->setPassword($hash);
            $parentUser->setClearPassword("test");
            $em->persist($parentUser);
            $em->flush();

            $parent = $em->getRepository(Parents::class)->findOneBy(['email' => $requestToDelete->getEmail()]);

            $child = $service->createChild($requestToDelete, $nanny, $parent);

            $em->persist($child);
            $em->flush();

            /*$message = (new \Swift_Message("Réponse négative garde d'enfant"))
                ->setFrom('delhougne.laura@gmail.com')
                ->setTo($requestToDelete->getEmail())
                ->setBody($this->renderView(
                    'emails/deleteRequest.html.twig', [
                        'firstName' => $requestToDelete->getParentFirstName(),
                        'lastName' => $requestToDelete->getParentLastName(),
                        'nannyFirstName' => $nanny->getFirstName(),
                        'nannyLastName' => $nanny->getLastName(),
                    ]
                ), 'text/html');
            $mailer->send($message);*/

            //$em->remove($requestToDelete);
            //$em->flush();

            $listRequests = $em->getRepository(RequestNanny::class)->findBy(['nannyId' => $this->getUser()->getId()]);
            return $this->render('security/fragments/listRequestsNanny.html.twig', [
                'listRequests' => $listRequests,
                ''
            ]);
        }
    }
}
