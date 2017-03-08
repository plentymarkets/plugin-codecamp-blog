<?php

namespace Blog\Controllers;


use Plenty\Plugin\Controller;
use Plenty\Plugin\Templates\Twig;

class BlogController extends Controller
{
    public function showBlog(Twig $twig):string
    {
        return $twig->render('Blog::content.PageDesign');
    }
}