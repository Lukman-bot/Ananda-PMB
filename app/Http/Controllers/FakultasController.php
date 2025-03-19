<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;
use App\Models\Fakultas;

class FakultasController extends Controller
{
    private Fakultas $model;

    public function __construct()
    {
        $this->model = new Fakultas();
    }

    public function listData(Request $request)
    {
        if ($request->ajax()) {
            $db = $this->model->getDataTables($request);
            return Datatables::of($db)
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex justify-content-center btn-group">';
                    $btn .= '
                        <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit" href="javascript:void(0)" onclick="editFakultas('. $row->id_fakultas .')">
                            <i class="fa fa-edit"></i>
                        </a>
                    ';
                    $btn .= '
                        <a class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"  href="javascript:void(0)" onclick="hapusFakultas('. $row->id_fakultas .')">
                            <i class="fa fa-trash"></i>
                        </a>
                    ';
                    $btn .= '
                        <a class="btn btn-sm btn-icon btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat Program Studi"  href="javascript:void(0)" onclick="showDetail('. $row->id_fakultas .')">
                            <i class="fa fa-play"></i>
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
        $id = $request->get('id_fakultas');

        // Add Validasi Data
        $request->validate([
            'kode_fakultas' => [
                'required',
                Rule::unique('fakultas')->ignore($id, 'id_fakultas'),
            ],
            'nama_fakultas' => [
                'required',
                Rule::unique('fakultas')->ignore($id, 'id_fakultas'),
            ],
        ]);

        $validate['kode_fakultas'] = $request->get('kode_fakultas');
        $validate['nama_fakultas'] = $request->get('nama_fakultas');

        if ($id == null) {
            $validate['created_at'] = now();

            $this->model->create($validate);
            return json_encode(['status' => 'Data Berhasil Ditambahkan']);
        } else {
            $validate['updated_at'] = now();

            $this->model->where('id_fakultas', $id)->update($validate);
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
        $this->model->where('id_fakultas', $request->get('id'))->delete();

        return response()->json(['status' => 'oke']);
    }
}
