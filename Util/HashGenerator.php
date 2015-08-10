<?php
namespace Confl1kt\NewsBundle\Util;

use Confl1kt\NewsBundle\Model\CommentInterface;

class HashGenerator implements HashGeneratorInterface
{
    protected $salt;

    /**
     * @param string $salt
     */
    public function __construct($salt)
    {
        $this->salt = $salt;
    }

    /**
     * {@inheritdoc}
     */
    public function generate(CommentInterface $comment)
    {
        return md5(sprintf('%s/%s/%s', $comment->getPost()->getId(), $comment->getId(), $this->salt));
    }
}
