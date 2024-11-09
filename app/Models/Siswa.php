<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'nilai_siswa';
    protected $fillable = ['nama_siswa','nilai_siswa','nilai_tahun'];
}
