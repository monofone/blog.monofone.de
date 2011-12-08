<?php

namespace Blage\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;

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
                ->orderBy('a.createdAt', 'DESC')
                ->setMaxResults($limit)
                ->getQuery()
                ->getResult();
    }
}
