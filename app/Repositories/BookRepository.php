<?php

namespace App\Repositories;

use App\Models\Book;

class BookRepository
{
    public function getAllBooks()
    {
        return Book::with(['writer' => function ($query) {
            $query->select('id', 'name');
        }]);
    }

    public function create($data)
    {
        return Book::create($data);
    }
}
