<?php
namespace Confl1kt\NewsBundle\Entity;

use Confl1kt\NewsBundle\Model\Comment as ModelComment;

abstract class BaseComment extends ModelComment
{
    public function prePersist()
    {
        $this->setCreatedAt(new \DateTime());
        $this->setUpdatedAt(new \DateTime());
    }
}
