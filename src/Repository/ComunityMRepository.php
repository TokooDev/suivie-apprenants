<?php

namespace App\Repository;

use App\Entity\ComunityM;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ComunityM|null find($id, $lockMode = null, $lockVersion = null)
 * @method ComunityM|null findOneBy(array $criteria, array $orderBy = null)
 * @method ComunityM[]    findAll()
 * @method ComunityM[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComunityMRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ComunityM::class);
    }

    // /**
    //  * @return ComunityM[] Returns an array of ComunityM objects
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
    public function findOneBySomeField($value): ?ComunityM
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
