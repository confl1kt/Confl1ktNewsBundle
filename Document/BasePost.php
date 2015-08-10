<?php
namespace Confl1kt\NewsBundle\Document;

use Confl1kt\NewsBundle\Model\Post as ModelPost;

abstract class BasePost extends ModelPost
{
    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->tags     = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }
}
