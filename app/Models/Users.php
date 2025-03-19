<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id_users';
    protected $guarded = ['id_users'];
    protected $column_search = [];
    public $timestamps = false;

    public function getDatatables(Request $request)
    {
        $this->dt = DB::table($this->table);
        $this->dt->orderBy('users.id_users', 'desc');

        if ($request->get('cari') != '') {
            $this->dt->where('full_name', 'like', '%' . $request->get('cari') . '%');
            $this->dt->orWhere('alamat_email', 'like', '%' . $request->get('cari') . '%');
        }

        // Kondisi untuk menampilkan data pada halaman Pengguna
        if ($request->get('tipe') == 'pengguna') $this->dt->where('id_role', '<>', 20);
        elseif ($request->get('tipe') == 'mahasiswa') $this->dt->where('id_role', '20');

        // Filter data berdasarkan role
        if ($request->get('role')) $this->dt->where('id_role', $request->get('role'));

        return $this->dt;
    }
}
