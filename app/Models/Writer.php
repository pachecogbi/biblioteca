<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    use HasFactory;

    protected $table = 'writers';
    protected $fillable = [
        'name',
        'email'
    ];
    public $timestamps = false;

    public function books()
    {
        $this->hasMany(Book::class, 'writer_id');
    }
}
