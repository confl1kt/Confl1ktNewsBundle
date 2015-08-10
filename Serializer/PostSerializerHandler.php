<?php
namespace Confl1kt\NewsBundle\Serializer;

use Sonata\CoreBundle\Serializer\BaseSerializerHandler;

/**
 * @author Sylvain Deloux <sylvain.deloux@ekino.com>
 */
class PostSerializerHandler extends BaseSerializerHandler
{
    /**
     * {@inheritdoc}
     */
    public static function getType()
    {
        return 'sonata_news_post_id';
    }
}
