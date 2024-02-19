<?php

namespace App\Repository;

use App\Entity\Recipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\Parameter;


/**
 * @extends ServiceEntityRepository<Recipe>
 *
 * @method Recipe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recipe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recipe[]    findAll()
 * @method Recipe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recipe::class);
    }

    public function getWithDurationLowerThan(int $duration, int $id) : array
    {
        $parameters = new ArrayCollection([
            new Parameter('duration', $duration),
            new Parameter('id', $id),
        ]);
    
        return $this->createQueryBuilder('r')
            ->where('r.duration < :duration')
            ->andWhere('r.id = :id')
            ->orderBy('r.duration', 'ASC')
            ->setMaxResults(3)
            ->setParameters($parameters)
            ->getQuery()
            ->getResult();
    }

    public function getTotalTime() :int
    {
        return $this->createQueryBuilder('e')
        ->select('sum(e.duration ) AS TOTAL')
        ->getQuery()
        ->getSingleScalarResult();
    }
//    /**
//     * @return Recipe[] Returns an array of Recipe objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Recipe
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
