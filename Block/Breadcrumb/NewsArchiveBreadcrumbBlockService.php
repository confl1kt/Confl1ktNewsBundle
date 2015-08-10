<?php
namespace Confl1kt\NewsBundle\Block\Breadcrumb;

use Sonata\BlockBundle\Block\BlockContextInterface;

/**
 * BlockService for archive breadcrumb.
 *
 * @author Sylvain Deloux <sylvain.deloux@ekino.com>
 */
class NewsArchiveBreadcrumbBlockService extends BaseNewsBreadcrumbBlockService
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'sonata.news.block.breadcrumb_archive';
    }

    /**
     * {@inheritdoc}
     */
    protected function getMenu(BlockContextInterface $blockContext)
    {
        $menu = $this->getRootMenu($blockContext);

        if ($collection = $blockContext->getBlock()->getSetting('collection')) {
            $menu->addChild($collection->getName(), array(
                'route'           => 'sonata_news_collection',
                'routeParameters' => array(
                    'collection' => $collection->getSlug(),
                ),
            ));
        }

        if ($tag = $blockContext->getBlock()->getSetting('tag')) {
            $menu->addChild($tag->getName(), array(
                'route'           => 'sonata_news_tag',
                'routeParameters' => array(
                    'tag' => $tag->getSlug(),
                ),
            ));
        }

        return $menu;
    }
}
