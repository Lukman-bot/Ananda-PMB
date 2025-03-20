<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Agama extends Model
{
    protected $table = 'agama';
    protected $primaryKey = 'id_agama';
    protected $guarded = ['id_agama'];
    public $timestamps = false;

    public function getDataTables(Request $request)
    {
        $this->dt = DB::table($this->table);

        return $this->dt;
    }
}
