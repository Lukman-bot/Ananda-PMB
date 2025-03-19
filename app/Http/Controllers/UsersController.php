<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use App\Models\Role;

class UsersController extends Controller
{
    private Users $model;

    public function __construct()
    {
        $this->model = new Users();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Pengguna',
            'role' => Role::where('id_role', '<>', '20')->get()
        ];
    
        return view('pengguna.index', $data);
    }

    public function listData(Request $request)
    {
        if ($request->ajax()) {
            $db = $this->model->getDatatables($request);
            return Datatables::of($db)
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex justify-content-center btn-group">';
                    $btn .= '
                        <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit" href="javascript:void(0)" onclick="edit('. $row->id_users .')">
                            <i class="fa fa-edit"></i>
                        </a>
                    ';
                    $btn .= '
                        <a class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"  href="javascript:void(0)" onclick="hapus('. $row->id_users .')">
                            <i class="fa fa-trash"></i>
                        </a>
                    ';
                    $btn .= '</div>';

                    return $btn;
                })
                ->addColumn('role', function ($row) {
                    $role = Role::where('id_role', $row->id_role)->first('role')->role;

                    return $role;
                })
                ->rawColumns(['action', 'role'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function save(Request $request)
    {
        $id = $request->get('id');

        // Validasi Email
        $emailExists = $this->model->where('alamat_email', $request->get('alamat_email'));
        if ($id) $emailExists->where('id_users', '!=', $id);
        if ($emailExists->exists()) return response()->json(['status' => 'Alamat email sudah digunakan, silakan gunakan email lain'], 400);

        $validate['full_name'] = $request->get('full_name');
        $validate['alamat_email'] = $request->get('alamat_email');
        $validate['id_role'] = (string)$request->get('id_role');

        if ($request->get('password')) {
            $validate['password'] = Hash::make($request->get('password'));
        }

        if ($id == null) {
            $validate['created_at'] = now();

            $this->model->create($validate);
            return response()->json(['status' => 'Data Berhasil Ditambahkan']);
        } else {
            $validate['updated_at'] = now();

            $this->model->where('id_users', $id)->update($validate);
            return response()->json(['status' => 'Data Berhasil Diperbarui']);
        }
    }

    public function reqData($id)
    {
        $data = $this->model->find($id);
        echo json_encode($data);
    }

    public function delete(Request $request)
    {
        $this->model->where('id_users', $request->get('id'))->delete();

        return response()->json(['status' => 'oke']);
    }
}
