<?php
namespace Confl1kt\NewsBundle\Mailer;

use Confl1kt\NewsBundle\Model\CommentInterface;

interface MailerInterface
{
    /**
     * @param CommentInterface $comment
     * @return mixed
     */
    public function sendCommentNotification(CommentInterface $comment);
}
