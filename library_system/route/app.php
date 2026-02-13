<?php

declare(strict_types=1);

use think\facade\Route;

Route::get('/', function () {
    return redirect('/books');
});

Route::get('books', 'BookController/index');
Route::get('books/create', 'BookController/create');
Route::post('books', 'BookController/store');

Route::get('borrows', 'BorrowController/index');
Route::get('borrows/create', 'BorrowController/create');
Route::post('borrows', 'BorrowController/store');
Route::post('borrows/:id/return', 'BorrowController/returnBook');
