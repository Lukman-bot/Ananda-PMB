<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlamatMahasiswa extends Model
{
    protected $table = 'alamat_mahasiswa';
    protected $primaryKey = 'id_alamat_mahasiswa';
    protected $guarded = ['id_alamat_mahasiswa'];
    public $timestamps = false;
}
