<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsesiModel extends Model
{
    protected $table = 'asesi';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    use HasFactory;
}
