<?php

namespace Blage\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Blage\BlogBundle\Entity\Category;

/**
 * Description of ArticleRepository
 *
 * @author srohweder
 */
class ArticleRepository extends EntityRepository
{
    /**
     * @param int $limit
     * @return array
     */
    public function findLatest($limit = 5)
    {
        return $this->createQueryBuilder('a')
                ->where('a.online = :online')
                ->orderBy('a.publishedAt', 'DESC')
                ->setMaxResults($limit)
                ->getQuery()
                ->setParameter('online', true)
                ->getResult();
    }

    /**
     * @param Category $category
     * @return array
     */
    public function findByCategory(Category $category)
    {
        return $this->createQueryBuilder('a')
                ->select('a')
                ->join('a.category', 'c', \Doctrine\ORM\Query\Expr\Join::ON, 'a.category = c' )
                ->where('a.online = :online')
                ->orderBy('a.publishedAt', 'DESC')
                ->getQuery()
                ->setParameter('online', true)
                ->getResult();
                
    }
}
