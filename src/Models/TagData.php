<?php

namespace Blog\Models;

use Plenty\Modules\Plugin\DataBase\Contracts\Model;

/**
 * Class TagData
 *
 * @property int     $id
 * @property string  $name
 * @property int  $createdAt
 * @property int  $updatedAt
 */
class TagData extends Model
{
    protected $textFields = ['name'];

    public $id              = 0;
    public $name            = '';
    public $createdAt       = 0;
    public $updatedAt       = 0;

    public function getTableName(): string
    {
        return 'Blog::TagData';
    }
}