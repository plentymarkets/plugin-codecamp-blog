<?php

namespace Blog\Extensions;

use Plenty\Modules\System\Contracts\WebstoreRepositoryContract;
use Plenty\Plugin\Templates\Extensions\Twig_Extension;
use Plenty\Plugin\Templates\Factories\TwigFactory;
use Plenty\Plugin\Templates\Markdown;

class BlogTwigExtension extends Twig_Extension
{
    /**
     * @var TwigFactory
     */
    private $factory;

    /**
     * BlogTwigExtension constructor.
     * @param TwigFactory $factory
     */
    public function __construct(TwigFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return "blog_extension";
    }

    /**
     * @return array
     */
    public function getFilters(): array
    {
        return [
            $this->factory->createSimpleFilter('markdown', [$this, 'renderToHTML']),
        ];
    }

    public function getFunctions():array
    {
        return [
            $this->factory->createSimpleFunction('getClientList', [$this, 'getClientList']),
        ];
    }

    /**
     * @param $markdownContent
     * @return string
     */
    public function renderToHTML($markdownContent):string
    {
        return pluginApp(Markdown::class)->renderToHtml($markdownContent);
    }

    /**
     * @return array
     */
    public function getClientList():array
    {
        $clientList = pluginApp(WebstoreRepositoryContract::class)->loadAll();
        return $clientList->toArray() ?? [];
    }
}