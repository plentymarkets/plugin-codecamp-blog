<?php

namespace Blog\Controllers;


use Blog\Contracts\BlogRepositoryContract;
use Plenty\Plugin\Controller;
use Plenty\Plugin\Http\Request;
use Plenty\Plugin\Templates\Twig;

class BlogController extends Controller
{
    /**
     * @param Twig $twig
     * @param BlogRepositoryContract $blogRepo
     * @return string
     */
    public function getBlogList(Twig $twig, BlogRepositoryContract $blogRepo):string
    {
        $blogList = $blogRepo->getBlogList();
        $templateData = array('blogList' => $blogList);
        return $twig->render('Blog::content.BlogList', $templateData);
    }

    /**
     * @param Twig $twig
     * @param BlogRepositoryContract $blogRepo
     * @return string
     */
    public function getAdminBlogList(Twig $twig, BlogRepositoryContract $blogRepo):string
    {
        $blogList = $blogRepo->getAdminBlogList();
        $templateData = array('blogList' => $blogList);
        return $twig->render('Blog::content.BlogAdminList', $templateData);
    }

    /**
     * @param Request $request
     * @param BlogRepositoryContract $blogRepo
     * @return string
     */
    public function createBlogEntry(Request $request, BlogRepositoryContract $blogRepo) : string
    {
        $newBlogEntry = $blogRepo->createBlog($request->all());
        return json_encode($newBlogEntry);
    }

    /**
     * @param Twig $twig
     * @param string $title
     * @param BlogRepositoryContract $blogRepo
     * @return string
     */
    public function getBlogEntry(Twig $twig, string $title, BlogRepositoryContract $blogRepo): string
    {
        $blogEntry = $blogRepo->getBlogEntry($title);
        $templateData = array('blogEntry' => $blogEntry);
        return $twig->render('Blog::content.BlogEntry', $templateData);
    }

    /**
     * @param Request $request
     * @param string $title
     * @param BlogRepositoryContract $blogRepo
     * @return string
     */
    public function setBlogEntryStatus(Request $request, string $title, BlogRepositoryContract $blogRepo): string
    {
        $isActive = $request->get('isActive', false);
        $blogEntry = $blogRepo->setBlogEntryStatus($title, $isActive);
        return json_encode($blogEntry);
    }

    /**
     * @param string $title
     * @param BlogRepositoryContract $blogRepo
     */
    public function deleteBlogEntry(string $title, BlogRepositoryContract $blogRepo)
    {
        $blogRepo->deleteBlogEntry($title);
    }
}