<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class ManajemenModel extends Model
{

    protected $table = 'manajemen';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    use HasFactory;

     protected static function boot()
    {
        parent::boot();

        // Event listener untuk saat objek sedang dibuat
        static::creating(function ($model) {
            if (!$model->id) {
                // berikan nilai id dengan format uuid
                $model->id = Str::uuid();
                // $model->id = rand(111111111111111111, 999999999999999999);
            }
        });
    }

    // casts : berfungsi agar ketika data di ambil, id dibaca sebagai string
    protected $casts = [
        'id' => 'string',
    ];
}
