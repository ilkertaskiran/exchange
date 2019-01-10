<?php

namespace App\Repository;

use App\Entity\ExchangeValue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ExchangeValue|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExchangeValue|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExchangeValue[]    findAll()
 * @method ExchangeValue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExchangeValueRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ExchangeValue::class);
    }

    // /**
    //  * @return ExchangeValue[] Returns an array of ExchangeValue objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ExchangeValue
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

}
