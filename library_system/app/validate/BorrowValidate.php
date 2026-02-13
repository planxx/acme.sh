<?php

declare(strict_types=1);

namespace app\validate;

use think\Validate;

class BorrowValidate extends Validate
{
    protected $rule = [
        'book_id' => 'require|integer|gt:0',
        'borrower_name' => 'require|max:60',
        'borrower_phone' => 'max:20',
    ];

    protected $message = [
        'book_id.require' => '请选择图书',
        'borrower_name.require' => '借阅人不能为空',
    ];
}
