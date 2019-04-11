<?php

namespace App\Repository;

use App\Entity\PersonaContacto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PersonaContacto|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonaContacto|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonaContacto[]    findAll()
 * @method PersonaContacto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonaContactoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PersonaContacto::class);
    }

    // /**
    //  * @return PersonaContacto[] Returns an array of PersonaContacto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PersonaContacto
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
