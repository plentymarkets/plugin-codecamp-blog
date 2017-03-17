<?php

namespace Blog\Migrations;

use Blog\Models\BlogData;
use Plenty\Modules\Plugin\DataBase\Contracts\Migrate;

class CreateBlogTable
{
    public function run(Migrate $migrate)
    {
        $migrate->createTable(BlogData::class);
    }
}