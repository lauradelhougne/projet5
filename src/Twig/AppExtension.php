<?php

namespace App\Twig;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public $userType = "";

    public function __construct(EntityManagerInterface $em, Security $security){
        if($security->getUser() !== null){
            $this->userType = $em->getMetadataFactory()->getMetadataFor(get_class($security->getUser()))->table['name'];
        }
    }
    public function getFunctions()
    {
        return [
            new TwigFunction('getUserType', [$this, 'getUserType']),
        ];
    }

    public function getUserType()
    {
        if (strval($this->userType) == 'nanny') {
            $userType = "nanny";
        } elseif (strval($this->userType) == 'parents') {
            $userType = "parents";
        } else {
            $userType = "";
        }
        return $userType;
    }
}