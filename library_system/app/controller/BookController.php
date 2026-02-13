<?php

declare(strict_types=1);

namespace app\controller;

use app\model\Book;
use app\validate\BookValidate;
use think\Request;
use think\facade\View;

class BookController
{
    public function index()
    {
        $books = Book::order('id', 'desc')->select();
        View::assign('books', $books);
        return View::fetch('book/index');
    }

    public function create()
    {
        return View::fetch('book/create');
    }

    public function store(Request $request)
    {
        $data = $request->post();
        validate(BookValidate::class)->check($data);

        Book::create([
            'title' => $data['title'],
            'author' => $data['author'],
            'isbn' => $data['isbn'],
            'total_stock' => (int) $data['total_stock'],
            'available_stock' => (int) $data['total_stock'],
        ]);

        return redirect('/books');
    }
}
