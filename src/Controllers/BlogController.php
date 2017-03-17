<?php

namespace Blog\Controllers;


use Blog\Contracts\BlogRepositoryContract;
use Plenty\Plugin\Controller;
use Plenty\Plugin\Http\Request;
use Plenty\Plugin\Templates\Twig;

class BlogController extends Controller
{
    /**
     * @param BlogRepositoryContract $blogRepo
     * @return string
     */
    public function getBlogList(BlogRepositoryContract $blogRepo):string
    {
        $blogList = $blogRepo->getBlogList();
        return json_encode($blogList);
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
     * @param string $title
     * @param BlogRepositoryContract $blogRepo
     * @return string
     */
    public function getBlogEntry(string $title, BlogRepositoryContract $blogRepo): string
    {
        $blogEntry = $blogRepo->getBlogEntry($title);
        return json_encode($blogEntry);
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