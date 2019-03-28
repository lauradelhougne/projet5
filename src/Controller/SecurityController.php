<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Nanny;
use App\Form\RegistrationType;

class SecurityController extends AbstractController
{
    /**
     * @Route("/registration", name="security_registration")
     */
    public function nannyRegistration()
    {
        $user = new Nanny();
        $form = $this->createForm(RegistrationType::class, $user);

        return $this->render('security/nannyRegistration.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/connection", name="security_connection")
     */
    public function connection()
    {
        return $this->render('security/connection.html.twig');
    }





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
        return $this->render('security/requestsNanny.html.twig');
    }
}
