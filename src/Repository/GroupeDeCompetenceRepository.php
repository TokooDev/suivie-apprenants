<?php

namespace App\Repository;

use App\Entity\GroupeDeCompetence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GroupeDeCompetence|null find($id, $lockMode = null, $lockVersion = null)
 * @method GroupeDeCompetence|null findOneBy(array $criteria, array $orderBy = null)
 * @method GroupeDeCompetence[]    findAll()
 * @method GroupeDeCompetence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GroupeDeCompetenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GroupeDeCompetence::class);
    }

    // /**
    //  * @return GroupeDeCompetence[] Returns an array of GroupeDeCompetence objects
    //  */
<<<<<<< HEAD
<<<<<<< HEAD
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
=======
    
    public function getGrpeCompetencesRefs()
=======
    /*
    public function findByExampleField($value)
>>>>>>> e27215435756dbc4cdd6dea62908b5cb8c82b04f
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
<<<<<<< HEAD
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
=======
            ->setMaxResults(10)
>>>>>>> e27215435756dbc4cdd6dea62908b5cb8c82b04f
            ->getQuery()
            ->getResult()
        ;
    }
<<<<<<< HEAD
<<<<<<< HEAD
    */

    /*
    public function findOneBySomeField($value): ?GroupeCompetence
=======
    
=======
    */
>>>>>>> e27215435756dbc4cdd6dea62908b5cb8c82b04f

    /*
    public function findOneBySomeField($value): ?GroupeDeCompetence
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
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
