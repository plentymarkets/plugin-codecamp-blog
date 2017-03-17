<?php

namespace Blog\Providers;

use Blog\Contracts\BlogRepositoryContract;
use Blog\Repositories\BlogRepository;
use Plenty\Plugin\ServiceProvider;

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
}
