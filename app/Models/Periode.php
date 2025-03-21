<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Periode extends Model
{
    protected $table = 'periode';
    protected $primaryKey = 'id_periode';
    protected $guarded = ['id_periode'];
    public $timestamps = false;

    public function getDataTables(Request $request)
    {
        $this->dt = DB::table($this->table);

        return $this->dt;
    }
}
