<?php
namespace Confl1kt\NewsBundle\Document;

use Doctrine\ODM\MongoDB\DocumentRepository;

class BasePostRepository extends DocumentRepository
{
    /**
     * @param int $limit
     *
     * @return mixed
     */
    public function findLastPostQueryBuilder($limit)
    {
        return $this->createQueryBuilder()
            ->field('enabled')->equals(true)
            ->sort('createdAt', 'desc')
            ->limit($limit)
            ->getQuery()
            ->execute();
    }
}
