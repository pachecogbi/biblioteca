<?php

namespace App\Service;

class WriterService
{
    public function formatIndex($writers)
    {
        foreach ($writers as $writer) {
            $response[] = [
                'id' => $writer->id,
                'nome' => $writer->name,
                'contato' => $writer->email
            ];
        }

        return $response;
    }
}
