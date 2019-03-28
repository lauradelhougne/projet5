<?php

namespace App\Controller;

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
        return $this->render('app/nannyList.html.twig', [
            'controller_name' => 'AppController',
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
