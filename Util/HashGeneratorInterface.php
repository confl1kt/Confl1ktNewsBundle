<?php
namespace Confl1kt\NewsBundle\Util;

use Confl1kt\NewsBundle\Model\CommentInterface;

interface HashGeneratorInterface
{
    /**
     * @param \Confl1kt\NewsBundle\Model\CommentInterface $comment
     *
     * @return string
     */
    public function generate(CommentInterface $comment);
}
