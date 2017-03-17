<?php

namespace Blog\Providers;

use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\Router;

/**
 * Class BlogRouteServiceProvider
 * @package Blog\Providers
 */
class BlogRouteServiceProvider extends RouteServiceProvider
{
    /**
     * @param Router $router
     */
    public function map(Router $router)
    {
        $router->get('blog','Blog\Controllers\BlogController@getBlogList');
        $router->get('blog-admin','Blog\Controllers\BlogController@getAdminBlogList');
        $router->get('blog/{title}','Blog\Controllers\BlogController@getBlogEntry')->where('title', '[a-zA-Z_-]+');
        $router->put('blog-admin/{title}','Blog\Controllers\BlogController@setBlogEntryStatus')->where('title', '[a-zA-Z_-]+');
        $router->delete('blog-admin/{title}','Blog\Controllers\BlogController@deleteBlogEntry')->where('title', '[a-zA-Z_-]+');
        $router->post('blog-admin','Blog\Controllers\BlogController@createBlogEntry');
    }

}
