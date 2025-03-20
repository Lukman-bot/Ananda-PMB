<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrangTuaMahasiswa extends Model
{
    protected $table = 'orang_tua_mahasiswa';
    protected $primaryKey = 'id_orang_tua_mahasiswa';
    protected $guarded = ['id_orang_tua_mahasiswa'];
    public $timestamps = false;
}
