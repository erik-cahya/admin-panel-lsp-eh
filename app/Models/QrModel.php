<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrModel extends Model
{
    protected $table = 'qr_code';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        // Event listener untuk saat objek sedang dibuat
        static::creating(function ($model) {
            if (!$model->id) {
                // berikan nilai id : nilai acak 18 digit
                $model->id = rand(111111111111111111, 999999999999999999);;
            }
        });
    }
}
