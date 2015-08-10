<?php

namespace Confl1kt\NewsBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Confl1kt\NewsBundle\Model\Post as ModelPost;

abstract class BasePost extends ModelPost
{
    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        parent::__construct();

        $this->tags     = new ArrayCollection();
        $this->comments = new ArrayCollection();

        $this->setPublicationDateStart(new \DateTime());
    }
}
