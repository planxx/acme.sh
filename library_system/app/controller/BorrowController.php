<?php

declare(strict_types=1);

namespace app\controller;

use app\model\Book;
use app\model\Borrow;
use app\validate\BorrowValidate;
use think\facade\Db;
use think\facade\View;
use think\Request;

class BorrowController
{
    public function index()
    {
        $borrows = Borrow::with(['book'])->order('id', 'desc')->select();
        View::assign('borrows', $borrows);

        return View::fetch('borrow/index');
    }

    public function create()
    {
        $books = Book::where('available_stock', '>', 0)->order('title', 'asc')->select();
        View::assign('books', $books);

        return View::fetch('borrow/create');
    }

    public function store(Request $request)
    {
        $data = $request->post();
        validate(BorrowValidate::class)->check($data);

        Db::transaction(function () use ($data): void {
            $book = Book::lock(true)->findOrFail((int) $data['book_id']);
            if ($book->available_stock <= 0) {
                throw new \RuntimeException('库存不足，无法借阅');
            }

            Borrow::create([
                'book_id' => $book->id,
                'borrower_name' => $data['borrower_name'],
                'borrower_phone' => $data['borrower_phone'] ?? '',
                'status' => 'borrowed',
                'borrowed_at' => date('Y-m-d H:i:s'),
            ]);

            $book->available_stock -= 1;
            $book->save();
        });

        return redirect('/borrows');
    }

    public function returnBook(int $id)
    {
        Db::transaction(function () use ($id): void {
            $borrow = Borrow::lock(true)->findOrFail($id);
            if ($borrow->status === 'returned') {
                return;
            }

            $book = Book::lock(true)->findOrFail($borrow->book_id);
            $book->available_stock += 1;
            $book->save();

            $borrow->status = 'returned';
            $borrow->returned_at = date('Y-m-d H:i:s');
            $borrow->save();
        });

        return redirect('/borrows');
    }
}
