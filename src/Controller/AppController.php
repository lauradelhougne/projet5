<?php

namespace App\Controller;

use App\Repository\NannyRepository;
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
            'controller_name' => 'AppController',
        ]);
    }

    /**
     * @Route("/", name="index")
     */
    public function home()
    {
        return $this->render('app/index.html.twig', [
            'controller_name' => 'AppController',
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
     * @Route("/contactNanny", name="contactNanny")
     */
    public function contactNanny()
    {
        return $this->render('app/contactNanny.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

}
