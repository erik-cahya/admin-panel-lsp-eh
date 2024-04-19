<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TUKModel extends Model
{
    protected $table = 'tuk';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    use HasFactory;
}
