<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManajemenModel extends Model
{

    protected $table = 'tuk';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    use HasFactory;

    // casts : berfungsi agar ketika data di ambil, id dibaca sebagai string
    protected $casts = [
        'id' => 'string',
    ];
}
