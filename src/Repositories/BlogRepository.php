<?php

namespace Blog\Repositories;

use Blog\Contracts\BlogRepositoryContract;
use Blog\Models\BlogData;
use Blog\Validators\BlogValidator;
use Plenty\Exceptions\ValidationException;
use Plenty\Modules\Plugin\DataBase\Contracts\DataBase;

class BlogRepository implements BlogRepositoryContract
{
    /**
     * @var DataBase
     */
    private $dataBase;

    /**
     * BlogRepository constructor.
     * @param DataBase $dataBase
     */
    public function __construct(DataBase $dataBase)
    {
        $this->dataBase = $dataBase;
    }

    /**
     * @param array $data
     * @return BlogData
     * @throws ValidationException
     */
    public function createBlog(array $data): BlogData
    {
        try {
            BlogValidator::validateOrFail($data);
        } catch (ValidationException $e) {
            throw $e;
        }

        $blogData = pluginApp(BlogData::class);

        $blogData->plentyId = $data['plentyId'];
        $blogData->authorName = $data['authorName'];
        $blogData->title = $data['title'];
        $blogData->titleUrl = $data['titleUrl'];
        $blogData->previewText = $data['previewText'];
        $blogData->text = $data['text'];
        $blogData->imageUrl = $data['imageUrl'];
        $blogData->isActive = $data['isActive'];
        $blogData->createdAt = time();

        $this->dataBase->save($blogData);

        return $blogData;
    }

    /**
     * @return array
     */
    public function getBlogList(): array
    {
        $blogList = $this->dataBase->query(BlogData::class)
            ->get();

        return $blogList;
    }

    /**
     * @param $title
     * @return BlogData
     */
    public function getBlogEntry($title): BlogData
    {
        $blogEntry = $this->dataBase->query(BlogData::class)
            ->where('titleUrl', '=', $title)
            ->get();

        return $blogEntry[0];
    }

    /**
     * @param $title
     * @param $isActive
     * @return BlogData
     */
    public function setBlogEntryStatus($title, $isActive): BlogData
    {
        $blogEntry = $this->getBlogEntry($title);
        $blogEntry->isActive = $isActive;
        $blogEntry->updatedAt = time();

        $this->dataBase->save($blogEntry);

        return $blogEntry;
    }

    /**
     * @param $title
     */
    public function deleteBlogEntry($title)
    {
        $blogEntry = $this->getBlogEntry($title);
        $this->dataBase->delete($blogEntry);
    }
}