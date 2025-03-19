<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramStudi extends Model
{
    protected $table = 'program_studi';
    protected $primaryKey = 'id_program_studi';
    protected $guarded = ['id_program_studi'];
    public $timestamps = false;

    public function getDataTables(Request $request)
    {
        $this->dt = DB::table($this->table);

        $this->dt->where('id_fakultas', $request->get('id_fakultas'));

        return $this->dt;
    }
}
