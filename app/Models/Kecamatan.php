<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';
    protected $primaryKey = 'id_kecamatan';
    protected $guarded = ['id_kecamatan'];
    public $timestamps = false;

    public function getDataTables(Request $request)
    {
        $this->dt = DB::table($this->table);

        $this->dt->where('id_kota_kabupaten', $request->get('id_kota_kabupaten'));

        return $this->dt;
    }
}
