<?php

namespace App\Repository;

use App\Entity\GroupeDeTag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GroupeDeTag|null find($id, $lockMode = null, $lockVersion = null)
 * @method GroupeDeTag|null findOneBy(array $criteria, array $orderBy = null)
 * @method GroupeDeTag[]    findAll()
 * @method GroupeDeTag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GroupeDeTagRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GroupeDeTag::class);
    }

    // /**
<<<<<<< HEAD
    //  * @return GroupeTag[] Returns an array of GroupeTag objects
=======
    //  * @return GroupeDeTag[] Returns an array of GroupeDeTag objects
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GroupeTag
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
