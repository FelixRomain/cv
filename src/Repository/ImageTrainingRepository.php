<?php

namespace App\Repository;

use App\Entity\ImageTraining;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ImageTraining|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageTraining|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageTraining[]    findAll()
 * @method ImageTraining[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageTrainingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImageTraining::class);
    }

    // /**
    //  * @return ImageTraining[] Returns an array of ImageTraining objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ImageTraining
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
