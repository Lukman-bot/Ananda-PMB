<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendidikanMahasiswa extends Model
{
    protected $table = 'pendidikan_mahasiswa';
    protected $primaryKey = 'id_pendidikan_mahasiswa';
    protected $guarded = ['id_pendidikan_mahasiswa'];
    public $timestamps = false;
}
