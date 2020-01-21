<?php

namespace App\Repository;

use App\Entity\Campagnie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Campagnie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Campagnie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Campagnie[]    findAll()
 * @method Campagnie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CampagnieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Campagnie::class);
    }

    // /**
    //  * @return Campagnie[] Returns an array of Campagnie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Campagnie
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
