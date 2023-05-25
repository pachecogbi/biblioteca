<?php

namespace App\Service;

class BookService
{
    public function formatIndex($books)
    {

        foreach ($books as $book) {
            $response[] = [
                'id' => $book->id,
                'titulo' => $book->title,
                'descricao' => $book->description,
                'escritor' => [
                    'id' => $book->writer->id,
                    'nome' => $book->writer->name
                ]
            ];
        }

        return $response;
    }
}
