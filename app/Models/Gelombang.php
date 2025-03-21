<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Gelombang extends Model
{
    protected $table = 'gelombang';
    protected $primaryKey = 'id_gelombang';
    protected $guarded = ['id_gelombang'];
    public $timestamps = false;

    public function getDataTables(Request $request)
    {
        $this->dt = DB::table($this->table);

        return $this->dt;
    }
}
