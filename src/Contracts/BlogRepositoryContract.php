<?php

namespace Blog\Contracts;

use Blog\Models\BlogData;

interface BlogRepositoryContract
{
    /**
     * @param array $data
     * @return BlogData
     */
    public function createBlog(array $data): BlogData;


    /**
     * @return array
     */
    public function getBlogList(): array;

     /**
     * @return array
     */
    public function getAdminBlogList(): array;

    /**
     * @param $title
     * @return BlogData
     */
    public function getBlogEntry($title): BlogData;

    /**
     * @param $title
     * @param $isActive
     * @return BlogData
     */
    public function setBlogEntryStatus($title, $isActive): BlogData;

    /**
     * @param $title
     */
    public function deleteBlogEntry($title);
}