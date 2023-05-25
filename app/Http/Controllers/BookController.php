<?php

namespace App\Http\Controllers;

use App\Repositories\BookRepository;
use App\Service\BookService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    private $bookRepository;
    private $bookService;

    public function __construct()
    {
        $this->bookRepository = new BookRepository();
        $this->bookService = new BookService();
    }

    public function index()
    {
        try {
            $books = $this->bookRepository->getAllBooks()->get();

            $response = $this->bookService->formatIndex($books);

            return $response;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function store(Request $request)
    {
        try {
            $response = DB::transaction(function () use ($request) {
                return $this->bookRepository->create($request->all());
            });

            return $response;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
