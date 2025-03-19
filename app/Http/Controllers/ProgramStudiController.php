<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;
use App\Models\Fakultas;
use App\Models\ProgramStudi;

class ProgramStudiController extends Controller
{
    private ProgramStudi $model;

    public function __construct()
    {
        $this->model = new ProgramStudi();
    }

    public function index()
    {
        $data = [
            'title' => 'Program Studi',
            'fakultas' => Fakultas::get()
        ];

        return view('prodi.index', $data);
    }

    public function listData(Request $request)
    {
        if ($request->ajax()) {
            $db = $this->model->getDataTables($request);
            return Datatables::of($db)
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex justify-content-center btn-group">';
                    $btn .= '
                        <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit" href="javascript:void(0)" onclick="editProdi('. $row->id_program_studi .')">
                            <i class="fa fa-edit"></i>
                        </a>
                    ';
                    $btn .= '
                        <a class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"  href="javascript:void(0)" onclick="hapusProdi('. $row->id_program_studi .')">
                            <i class="fa fa-trash"></i>
                        </a>
                    ';
                    $btn .= '</div>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function save(Request $request)
    {
        $id = $request->get('id_program_studi');

        // Add Validasi Data
        $request->validate([
            'kode_program_studi' => [
                'required',
                Rule::unique('program_studi')->ignore($id, 'id_program_studi'),
            ],
            'nama_program_studi' => [
                'required',
                Rule::unique('program_studi')->ignore($id, 'id_program_studi'),
            ],
        ]);

        $validate['kode_program_studi'] = $request->get('kode_program_studi');
        $validate['nama_program_studi'] = $request->get('nama_program_studi');
        $validate['id_fakultas'] = $request->get('fk_id_fakultas');

        if ($id == null) {
            $validate['created_at'] = now();

            $this->model->create($validate);
            return json_encode(['status' => 'Data Berhasil Ditambahkan']);
        } else {
            $validate['updated_at'] = now();

            $this->model->where('id_program_studi', $id)->update($validate);
            return json_encode(['status' => 'Data Berhasil Diperbarui']);
        }
    }

    public function reqData($id)
    {
        $data = $this->model->find($id);
        echo json_encode($data);
    }

    public function delete(Request $request)
    {
        $this->model->where('id_program_studi', $request->get('id'))->delete();

        return response()->json(['status' => 'oke']);
    }
}
