<?php
namespace Confl1kt\NewsBundle\Block\Breadcrumb;

use Sonata\BlockBundle\Block\BlockContextInterface;
use Sonata\SeoBundle\Block\Breadcrumb\BaseBreadcrumbMenuBlockService;

/**
 * Abstract class for news breadcrumbs.
 *
 * @author Sylvain Deloux <sylvain.deloux@ekino.com>
 */
abstract class BaseNewsBreadcrumbBlockService extends BaseBreadcrumbMenuBlockService
{
    /**
     * {@inheritdoc}
     */
    protected function getRootMenu(BlockContextInterface $blockContext)
    {
        $menu = parent::getRootMenu($blockContext);

        $menu->addChild('sonata_news_archive_breadcrumb', array(
            'route'  => 'sonata_news_home',
            'extras' => array('translation_domain' => 'Confl1ktNewsBundle'),
        ));

        return $menu;
    }
}
