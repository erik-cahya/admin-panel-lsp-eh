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
}
