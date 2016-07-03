<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1467282994_createBandTable
    extends Migration
{

    public function up()
    {
        $this->createTable('band', [
            'name' => ['type' => 'string'],
            'biography' => ['type' => 'text'],
            'pathToImg' => ['type' => 'string'],
        ]);
    }

    public function down()
    {
        $this->dropTable('band');
    }
    
}