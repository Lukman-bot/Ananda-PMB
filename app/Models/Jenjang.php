<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Jenjang extends Model
{
    protected $table = 'jenjang';
    protected $primaryKey = 'id_jenjang';
    protected $guarded = ['id_jenjang'];
    public $timestamps = false;

    public function getDataTables(Request $request)
    {
        $this->dt = DB::table($this->table);

        return $this->dt;
    }
}
