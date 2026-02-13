<?php

declare(strict_types=1);

namespace app\model;

use think\Model;

class Book extends Model
{
    protected $name = 'books';
    protected $autoWriteTimestamp = 'datetime';

    protected $type = [
        'id' => 'integer',
        'total_stock' => 'integer',
        'available_stock' => 'integer',
    ];
}
