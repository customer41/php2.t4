<?php

namespace App\Models;

use T4\Orm\Model;

class News
    extends Model
{
    public static $schema = [
        'table' => 'news',
        'columns' => [
            'title' => ['type' => 'string'],
            'text' => ['type' => 'text'],
            'time' => ['type' => 'datetime'],
        ],
    ];
}