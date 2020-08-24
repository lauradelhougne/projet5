<?php

namespace App\Service;

use App\Entity\Child;
use App\Entity\Parents;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserService
{
    public function createChild($requestToDelete, $nanny, $parents){
        $child = new Child();
        $child->setParentsId($parents->getId());
        $child->setNannyId($nanny->getId());
        $child->setFirstName($requestToDelete->getChildFirstName());
        $child->setLastName($requestToDelete->getChildLastName());
        $child->setBirthDate($requestToDelete->getDateBirth());
        $child->setDaysChildcare($requestToDelete->getDaysChildcare());
        $child->setParent1FirstName($requestToDelete->getParentFirstName());
        $child->setParent1LastName($requestToDelete->getParentLastName());
        $child->setParent1Phone($requestToDelete->getPhone());
        $child->setParent1Email($requestToDelete->getEmail());
        return $child;
    }
}