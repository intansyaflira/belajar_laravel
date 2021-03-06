<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    public $timestamps = false;

    protected $fillable = ['nama_kelas'];
    use HasFactory;
}
