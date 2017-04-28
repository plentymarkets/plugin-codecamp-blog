<?php

namespace Blog\Migrations;

use Blog\Models\BlogData;
use Plenty\Modules\Plugin\DataBase\Contracts\Migrate;
use Plenty\Plugin\Log\Loggable;

/**
 * Class CreateBlogTable
 */
class CreateBlogTables
{
    use Loggable;

    /**
     * @param Migrate $migrate
     */
    public function run(Migrate $migrate)
    {
        $migrate->createTable(BlogData::class);
        $this->getLogger("CreateBlogTables_run")->debug('Blog::Logging.successMessage', ['tableName' => 'BlogData']);

        $migrate->createTable(TagData::class);
        $this->getLogger("CreateBlogTables_run")->debug('Blog::Logging.successMessage', ['tableName' => 'TagData']);
        
        $migrate->createTable(BlogTagData::class);
        $this->getLogger("CreateBlogTables_run")->debug('Blog::Logging.successMessage', ['tableName' => 'BlogTagData']);

    }
}