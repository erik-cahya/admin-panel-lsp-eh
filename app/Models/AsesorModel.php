<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsesorModel extends Model
{
    protected $table = 'asesor';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    use HasFactory;
}
