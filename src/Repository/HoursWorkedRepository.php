<?php

namespace App\Repository;

use App\Entity\HoursWorked;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HoursWorked>
 *
 * @method HoursWorked|null find($id, $lockMode = null, $lockVersion = null)
 * @method HoursWorked|null findOneBy(array $criteria, array $orderBy = null)
 * @method HoursWorked[]    findAll()
 * @method HoursWorked[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HoursWorkedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HoursWorked::class);
    }

//    /**
//     * @return HoursWorked[] Returns an array of HoursWorked objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('h.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?HoursWorked
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
