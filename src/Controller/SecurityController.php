<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Child;
use App\Entity\Parents;
use App\Entity\RequestNanny;
use App\Form\CreateArticleType;
use App\Form\NannyInformationsType;
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
     * @Route("/nanny_login", name="nanny_login")
     */
    public function nannyLogin()
    {
        return $this->render('security/connection.html.twig', [
            'user' => 'nanny'
        ]);
    }

    /**
     * @Route("/parents_login", name="parents_login")
     */
    public function parentsLogin()
    {
        return $this->render('security/connection.html.twig', [
            'user' => 'parents'
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
     * @Route("/childListNanny", name="security_childListNanny")
     */
    public function childListNanny()
    {
        $em = $this->getDoctrine()->getManager();
        $childsList = $em->getRepository(Child::class)->findBy(['nannyId' => $this->getUser()->getId()]);
        return $this->render('security/childListNanny.html.twig', [
            "childsList" => $childsList
        ]);
    }

    /**
     * @Route("/readChildInfos/{id}", name="security_readChildInfos")
     */
    public function readChildInfos($id)
    {
        $em = $this->getDoctrine()->getManager();
        $child = $em->getRepository(Child::class)->findOneBy(['id' => $id]);
        return $this->render('security/readChildInfos.html.twig', [
            'child' => $child
        ]);
    }

    /**
     * @Route("/modifyNannyInfos", name="security_modifyNannyInfos")
     */
    public function modifyNannyInfos(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $nanny = $em->getRepository(Nanny::class)->findOneBy(['id' => $this->getUser()->getId()]);
        $form = $this->createForm(NannyInformationsType::class, $nanny);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if(empty($articleId)) {
                $em->persist($nanny);
            }
            $em->flush();
            return $this->redirectToRoute("security_createArticle", ["id" => $id]);
        }

        return $this->render('security/modifyNannyInfos.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/createArticle/{id}/{articleId}",
     *     name="security_createArticle")
     */
    public function createArticle(Request $request, $id, $articleId = null)
    {
        $em = $this->getDoctrine()->getManager();
        $child = $em->getRepository(Child::class)->findOneBy(['id' => $id]);

        $articles = $em->getRepository(Article::class)->findBy(['childId' => $id], ["datetime" => "DESC"]);

        if(!empty($articleId)) {
            $article = $em->getRepository(Article::class)->findOneBy(['id' => $articleId]);
        } else {
            $article = new Article();
            $article->setChildId($child->getId());
        }

        $form = $this->createForm(CreateArticleType::class, $article);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if(empty($articleId)) {
                $em->persist($article);
            }
            $em->flush();
            return $this->redirectToRoute("security_createArticle", ["id" => $id]);
        }

        return $this->render('security/createArticle.html.twig', [
            'form' => $form->createView(),
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/requestsNanny", name="security_requestsNanny")
     */
    public function requestsNanny()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $listRequests = $em->getRepository(RequestNanny::class)->findBy(['nannyId' => $this->getUser()->getId()]);

        return $this->render('security/requestsNanny.html.twig', [
            'listRequests' => $listRequests,
        ]);
    }

    /**
     * @Route("/deleteRequest", name="ajax_delete_request")
     */
    public function deleteRequest(Request $request)
    {
        if($request->isXmlHttpRequest()){
            $em = $this->getDoctrine()->getManager();
            $requestToDelete = $em->getRepository(RequestNanny::class)->findOneBy(['id' => $request->get("id")]);
            $em->remove($requestToDelete);
            $em->flush();
            $listRequests = $em->getRepository(RequestNanny::class)->findBy(['nannyId' => $this->getUser()->getId()]);
            return $this->render('security/fragments/listRequestsNanny.html.twig', [
                'listRequests' => $listRequests,
            ]);
        }
    }

    /**
     * @Route("/acceptRequest", name="ajax_accept_request")
     */
    public function acceptRequest(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $em = $this->getDoctrine()->getManager();
        //$requestToDelete = $em->getRepository(RequestNanny::class)->findOneBy(['id' => $request->get("id")]);

        $parents = new Parents;
        $parents->setLastName('test');
        $parents->setFirstName("test");
        $parents->setRelation("test");
        $parents->setEmail("test@test.fr");
        $parents->setPhone("0670454658");
        $parents->setClearpassword('test');
        $hash = $encoder->encodePassword($parents, 'test');
        $parents->setPassword($hash);

        $em->persist($parents);
        $em->flush();
        /*if($request->isXmlHttpRequest()){
            $em = $this->getDoctrine()->getManager();
            $requestToDelete = $em->getRepository(RequestNanny::class)->findOneBy(['id' => $request->get("id")]);

            $parents = new Parents;
            $parents->setLastName($requestToDelete->getParentLastName());
            $parents->setFirstName($requestToDelete->getParentFirstName());
            $parents->setRelation($requestToDelete->getRelation());
            $parents->setEmail($requestToDelete->getEmail());
            $parents->setPhone($requestToDelete->getPhone());
            $parents->setClearpassword('test');
            $hash = $encoder->encodePassword($parents, 'test');
            $parents->setPassword($hash);

            $em->persist($parents);
            $em->flush();

            $parents = $em->getRepository(Parents::class)->findOneBy(['email' => $requestToDelete->getEmail()]);
            $child = new Child;
            $child->setNannyId($requestToDelete->getNannyId());
            $child->setParentsId($parents->getId());
            $child->setFirstName($requestToDelete->getChildFirstName());
            $child->setLastName($requestToDelete->getChildLastName());
            $child->setBirthDate($requestToDelete->getDateBirth());
            $child->setStartDate($requestToDelete->getStartDate());
            $child->setDaysChildcare($requestToDelete->getDaysChildcare());
            $child->setParent1LastName($requestToDelete->getParentLastName());
            $child->setParent1FirstName($requestToDelete->getParentFirstName());
            $child->setParent1Email($requestToDelete->getEmail());
            $child->setParent1Phone($requestToDelete->getPhone());

            $em->persist($child);
            $em->flush();*/

            //$em->remove($requestToDelete);
            //$em->flush();
            $listRequests = $em->getRepository(RequestNanny::class)->findBy(['nannyId' => "1"]);
            return $this->render('security/fragments/listRequestsNanny.html.twig', [
                'listRequests' => $listRequests,
            ]);

    }
}
