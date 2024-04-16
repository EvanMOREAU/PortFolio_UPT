<?php

namespace App\Repository;

use App\Entity\HappyClients;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HappyClients>
 *
 * @method HappyClients|null find($id, $lockMode = null, $lockVersion = null)
 * @method HappyClients|null findOneBy(array $criteria, array $orderBy = null)
 * @method HappyClients[]    findAll()
 * @method HappyClients[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HappyClientsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HappyClients::class);
    }

//    /**
//     * @return HappyClients[] Returns an array of HappyClients objects
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

//    public function findOneBySomeField($value): ?HappyClients
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
