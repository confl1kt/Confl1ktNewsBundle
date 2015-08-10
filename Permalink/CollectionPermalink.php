<?php
namespace Confl1kt\NewsBundle\Permalink;

use Confl1kt\NewsBundle\Model\PostInterface;

class CollectionPermalink implements PermalinkInterface
{
    /**
     * {@inheritdoc}
     */
    public function generate(PostInterface $post)
    {
        return null == $post->getCollection()
            ? $post->getSlug()
            : sprintf('%s/%s', $post->getCollection()->getSlug(), $post->getSlug());
    }

    /**
     * @param string $permalink
     *
     * @return array
     */
    public function getParameters($permalink)
    {
        $parameters = explode('/', $permalink);

        if (count($parameters) > 2 || count($parameters) == 0) {
            throw new \InvalidArgumentException('wrong permalink format');
        }

        if (false === strpos($permalink, '/')) {
            $collection = null;
            $slug = $permalink;
        } else {
            list($collection, $slug) = $parameters;
        }

        return array(
            'collection' => $collection,
            'slug'       => $slug,
        );
    }
}
