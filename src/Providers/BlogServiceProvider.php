<?php

namespace Blog\Providers;

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
      $this->getApplication()->register(BlogRouteServiceProvider::class);
    }
}
