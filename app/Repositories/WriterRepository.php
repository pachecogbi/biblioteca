<?php

namespace App\Repositories;

use App\Models\Writer;

class WriterRepository
{
    public function getAllWriters()
    {
        return Writer::select('*');
    }

    public function create($data)
    {
        return Writer::create($data);
    }
}

