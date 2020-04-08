<?php

namespace App\Controller;

use App\Entity\RequestNanny;
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
        return $this->render('security/connection.html.twig');
    }


    /**
     * @Route("/test", name="test")
     */
    public function test()
    {
        return $this->render('security/childListNanny.html.twig');
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
        return $this->render('security/childListNanny.html.twig');
    }

    /**
     * @Route("/childListParents", name="security_childListParents")
     */
    public function childListParents()
    {
        return $this->render('security/childListParents.html.twig');
    }

    /**
     * @Route("/modifyChildInfos", name="security_modifyChildInfos")
     */
    public function modifyChildInfos()
    {
        return $this->render('security/modifyChildInfos.html.twig');
    }

    /**
     * @Route("/modifyParentsInfos", name="security_modifyParentsInfos")
     */
    public function modifyParentsInfos()
    {
        return $this->render('security/modifyParentsInfos.html.twig');
    }

    /**
     * @Route("/modifyNannyInfos", name="security_modifyNannyInfos")
     */
    public function modifyNannyInfos()
    {
        return $this->render('security/modifyNannyInfos.html.twig');
    }

    /**
     * @Route("/createArticle", name="security_createArticle")
     */
    public function createArticle()
    {
        return $this->render('security/createArticle.html.twig');
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
}
