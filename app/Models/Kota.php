<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Kota extends Model
{
    protected $table = 'kota_kabupaten';
    protected $primaryKey = 'id_kota_kabupaten';
    protected $guarded = ['id_kota_kabupaten'];
    public $timestamps = false;

    public function getDataTables(Request $request)
    {
        $this->dt = DB::table($this->table);

        $this->dt->where('id_provinsi', $request->get('id_provinsi'));

        return $this->dt;
    }
}
