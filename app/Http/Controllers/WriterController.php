<?php

namespace App\Http\Controllers;

use App\Repositories\WriterRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Service\WriterService;

class WriterController extends Controller
{
    private $writerRepository;
    private $writerService;

    public function __construct()
    {
        $this->writerRepository = new WriterRepository();
        $this->writerService = new WriterService();
    }

    public function index()
    {
        try {
            $writers = $this->writerRepository->getAllWriters()->get();

            $response = $this->writerService->formatIndex($writers);

            return $response;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function store(Request $request)
    {
        try {
            $response = DB::transaction(function () use ($request) {
                return $this->writerRepository->create($request->all());
            });

            return $response;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
