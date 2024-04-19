<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratTugasModel extends Model
{
    protected $table = 'surat_tugas';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    use HasFactory;
}
