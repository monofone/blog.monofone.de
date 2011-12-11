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
    public function findLatest($limit = 5)
    {
        return $this->createQueryBuilder('a')
                ->where('a.online = :online')
                ->orderBy('a.createdAt', 'DESC')
                ->setMaxResults($limit)
                ->getQuery()
                ->setParameter('online', true)
                ->getResult();
    }
    
    public function findByCategory(Category $category)
    {
        return $this->createQueryBuilder('a')
                ->select('a')
                ->join('a.category', 'c', \Doctrine\ORM\Query\Expr\Join::ON, 'a.category = c' )
                ->where('a.online = :online')
                ->orderBy('a.createdAt', 'DESC')
                ->getQuery()
                ->setParameter('online', true)
                ->getResult();
                
    }
}
