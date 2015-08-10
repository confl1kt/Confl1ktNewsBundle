<?php
namespace Confl1kt\NewsBundle\Permalink;

use Confl1kt\NewsBundle\Model\PostInterface;

interface PermalinkInterface
{
    /**
     * @param \Confl1kt\NewsBundle\Model\PostInterface $post
     */
    public function generate(PostInterface $post);

    /**
     * @param string $permalink
     *
     * @return array
     */
    public function getParameters($permalink);
}
