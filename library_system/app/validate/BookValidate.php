<?php

declare(strict_types=1);

namespace app\validate;

use think\Validate;

class BookValidate extends Validate
{
    protected $rule = [
        'title' => 'require|max:120',
        'author' => 'require|max:80',
        'isbn' => 'require|max:32',
        'total_stock' => 'require|integer|egt:1',
    ];

    protected $message = [
        'title.require' => '书名不能为空',
        'author.require' => '作者不能为空',
        'isbn.require' => 'ISBN不能为空',
        'total_stock.egt' => '库存必须大于等于1',
    ];
}
