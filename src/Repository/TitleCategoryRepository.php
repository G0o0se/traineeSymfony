<?php

namespace App\Repository;

use App\Entity\TitleCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TitleCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method TitleCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method TitleCategory[]    findAll()
 * @method TitleCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TitleCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TitleCategory::class);
    }

    // /**
    //  * @return TitleCategory[] Returns an array of TitleCategory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TitleCategory
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
