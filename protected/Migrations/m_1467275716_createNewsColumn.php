<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1467275716_createNewsColumn
    extends Migration
{

    public function up()
    {
        $this->addColumn('news', [
            'time' => ['type' => 'datetime']
        ]);
    }

    public function down()
    {
        $this->dropColumn('news', 'time');
    }
    
}