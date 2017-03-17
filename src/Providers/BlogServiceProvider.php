<?php

namespace Blog\Providers;

use Blog\Contracts\BlogRepositoryContract;
use Blog\Extensions\BlogTwigExtension;
use Blog\Repositories\BlogRepository;
use Plenty\Log\Exceptions\ReferenceTypeException;
use Plenty\Log\Services\ReferenceContainer;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Templates\Twig;

/**
 * Class BlogServiceProvider
 * @package Blog\Providers
 */
class BlogServiceProvider extends ServiceProvider
{

    /**
    * Register the route service provider
    */
    public function register()
    {
        $this->getApplication()->bind(BlogRepositoryContract::class, BlogRepository::class);
        $this->getApplication()->register(BlogRouteServiceProvider::class);
    }

    public function boot(Twig $twig, ReferenceContainer $container)
    {
        $twig->addExtension(BlogTwigExtension::class);

        try
        {
            $container->add(['blogId' => 'blogId']);
        }
        catch(ReferenceTypeException $e){}
    }
}
