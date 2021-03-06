<?php

namespace Blog\Models;

use Plenty\Modules\Plugin\DataBase\Contracts\Model;

/**
 * Class BlogData
 *
 * @property int     $id
 * @property int     $plentyId
 * @property string  $authorName
 * @property string  $title
 * @property string  $titleUrl
 * @property string  $previewText
 * @property string  $text
 * @property string  $imageUrl
 * @property boolean $isActive
 * @property int  $createdAt
 * @property int  $updatedAt
 */
class BlogData extends Model
{
    protected $textFields = ['text', 'previewText'];

    public $id              = 0;
    public $plentyId        = 0;
    public $authorName      = '';
    public $title           = '';
    public $titleUrl        = '';
    public $previewText     = '';
    public $text            = '';
    public $imageUrl        = '';
    public $isActive        = false;
    public $createdAt       = 0;
    public $updatedAt       = 0;


    public function getTableName(): string
    {
        return 'Blog::BlogData';
    }
}