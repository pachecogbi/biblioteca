<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $fillable = [
        'title',
        'description',
        'writer_id'
    ];
    public $timestamps = false;

    public function writer()
    {
        return $this->hasOne(Writer::class, 'id');
    }

}
