<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Menentukan atribut yang diizinkan untuk diisi secara massal
    protected $fillable = [
        'title',
        'description',
    ];
}
