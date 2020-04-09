<?php

namespace App\Controller;

use App\Entity\RequestNanny;
use Symfony\Component\HttpFoundation\Request;
use App\Form\RequestNannyType;
use App\Entity\Nanny;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index()
    {
        return $this->render('app/index.html.twig', [
        ]);
    }

    /**
     * @Route("/", name="index")
     */
    public function home()
    {
        return $this->render('app/index.html.twig', [
        ]);
    }

    /**
     * @Route("/nannyList", name="nannyList")
     */
    public function nannyList()
    {
        $em = $this->getDoctrine()->getManager();
        $listNanny = $em->getRepository(Nanny::class)->findAll();
        return $this->render('app/nannyList.html.twig', [
            'listNanny' => $listNanny,
        ]);
    }

    /**
     * @Route("/contactNanny/{id}", name="contactNanny")
     */
    public function contactNanny(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $nanny = $em->getRepository(Nanny::class)->findBy(['id' => $id]);

        $requestNanny = new RequestNanny();
        $requestNanny->setNannyId($nanny[0]->getId());
        $requestNanny->setDatetime();

        $form = $this->createForm(RequestNannyType::class, $requestNanny);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($requestNanny);

            $em->flush();
        }

        return $this->render('app/contactNanny.html.twig', [
            'userType' => $userType,
            'form' => $form->createView(),
        ]);
    }

}
