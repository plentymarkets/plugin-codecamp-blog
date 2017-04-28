<?php

namespace Blog\Models;

use Plenty\Modules\Plugin\DataBase\Contracts\Model;

/**
 * Class TagData
 *
 * @property int     $blogId
 * @property string  $tagId
 * @property int  $createdAt
 * @property int  $updatedAt
 */
class BlogTagData extends Model
{

    public $blogId          = 0;
    public $tagId           = 0;
    public $createdAt       = 0;
    public $updatedAt       = 0;

    public function getTableName(): string
    {
        return 'Blog::BlogTagData';
    }
}