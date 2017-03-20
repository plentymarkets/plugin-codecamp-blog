<?php

namespace Blog\Migrations;

use Blog\Models\BlogData;
use Plenty\Modules\Plugin\DataBase\Contracts\Migrate;
use Plenty\Plugin\Log\Loggable;

/**
 * Class CreateBlogTable
 */
class CreateBlogTable
{
    use Loggable;

    /**
     * @param Migrate $migrate
     */
    public function run(Migrate $migrate)
    {
        $migrate->createTable(BlogData::class);

        $this->getLogger("CreateBlogTable_run")->debug('Blog::Logging.successMessage', ['tableName' => 'BlogData']);
    }
}