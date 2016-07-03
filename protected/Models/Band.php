<?php

namespace App\Models;

use T4\Orm\Model;

class Band
    extends Model
{
    public static $schema = [
        'table' => 'band',
        'columns' => [
            'name' => ['type' => 'string'],
            'biography' => ['type' => 'text'],
            'pathToImg' => ['type' => 'string'],
        ],
    ];
}