<?php

namespace App\Repository;

use App\Entity\RequestNanny;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RequestNanny|null find($id, $lockMode = null, $lockVersion = null)
 * @method RequestNanny|null findOneBy(array $criteria, array $orderBy = null)
 * @method RequestNanny[]    findAll()
 * @method RequestNanny[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RequestNannyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RequestNanny::class);
    }

    // /**
    //  * @return Request[] Returns an array of Request objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Request
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
