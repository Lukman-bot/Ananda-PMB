<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalonMahasiswa extends Model
{
    protected $table = 'calon_mahasiswa';
    protected $primaryKey = 'id_calon_mahasiswa';
    protected $guarded = ['id_calon_mahasiswa'];
    public $timestamps = false;
}
