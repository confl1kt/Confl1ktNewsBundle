<?php
namespace Confl1kt\NewsBundle\Block\Breadcrumb;

use Knp\Menu\FactoryInterface;
use Knp\Menu\Provider\MenuProviderInterface;
use Sonata\BlockBundle\Block\BlockContextInterface;
use Confl1kt\NewsBundle\Model\BlogInterface;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

/**
 * BlockService for post breadcrumb.
 *
 * @author Sylvain Deloux <sylvain.deloux@ekino.com>
 */
class NewsPostBreadcrumbBlockService extends BaseNewsBreadcrumbBlockService
{
    /**
     * @var BlogInterface
     */
    protected $blog;

    public function __construct($context, $name, EngineInterface $templating, MenuProviderInterface $menuProvider, FactoryInterface $factory, BlogInterface $blog)
    {
        $this->blog = $blog;

        parent::__construct($context, $name, $templating, $menuProvider, $factory);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'sonata.news.block.breadcrumb_post';
    }

    /**
     * {@inheritdoc}
     */
    protected function getMenu(BlockContextInterface $blockContext)
    {
        $menu = $this->getRootMenu($blockContext);

        if ($post = $blockContext->getBlock()->getSetting('post')) {
            $menu->addChild($post->getTitle(), array(
                'route'           => 'sonata_news_view',
                'routeParameters' => array(
                    'permalink' => $this->blog->getPermalinkGenerator()->generate($post),
                ),
            ));
        }

        return $menu;
    }
}
