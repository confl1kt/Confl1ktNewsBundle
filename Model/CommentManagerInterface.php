<?php
namespace Confl1kt\NewsBundle\Model;

use Sonata\CoreBundle\Model\ManagerInterface;
use Sonata\CoreBundle\Model\PageableManagerInterface;

interface CommentManagerInterface extends ManagerInterface, PageableManagerInterface
{
    /**
     * Update the number of comment for a comment.
     * @param PostInterface $post
     * @return mixed
     */
    public function updateCommentsCount(PostInterface $post = null);
}
