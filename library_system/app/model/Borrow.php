<?php

declare(strict_types=1);

namespace app\model;

use think\Model;

class Borrow extends Model
{
    protected $name = 'borrows';
    protected $autoWriteTimestamp = false;

    protected $type = [
        'id' => 'integer',
        'book_id' => 'integer',
        'status' => 'string',
        'borrowed_at' => 'datetime',
        'returned_at' => 'datetime',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
