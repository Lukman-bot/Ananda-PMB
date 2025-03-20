<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;
use App\Models\Kecamatan;

class KecamatanController extends Controller
{
    private Kecamatan $model;

    public function __construct()
    {
        $this->model = new Kecamatan();
    }

    public function listData(Request $request)
    {
        if ($request->ajax()) {
            $db = $this->model->getDataTables($request);
            return Datatables::of($db)
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex justify-content-center btn-group">';
                    $btn .= '
                        <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit" href="javascript:void(0)" onclick="edit('. $row->id_kecamatan .')">
                            <i class="fa fa-edit"></i>
                        </a>
                    ';
                    $btn .= '
                        <a class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"  href="javascript:void(0)" onclick="hapus('. $row->id_kecamatan .')">
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
        $id = $request->get('id');

        // Add Validasi Data
        $request->validate([
            'nama_kecamatan' => [
                'required',
                Rule::unique('kecamatan')->ignore($id, 'id_kecamatan'),
            ],
        ]);

        $validate['nama_kecamatan'] = $request->get('nama_kecamatan');
        $validate['id_kota_kabupaten'] = $request->get('id_kota');

        if ($id == null) {
            $validate['created_at'] = now();

            $this->model->create($validate);
            return json_encode(['status' => 'Data Berhasil Ditambahkan']);
        } else {
            $validate['updated_at'] = now();

            $this->model->where('id_kecamatan', $id)->update($validate);
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
        $this->model->where('id_kecamatan', $request->get('id'))->delete();

        return response()->json(['status' => 'oke']);
    }

    public function getKecamatan($id_kota_kabupaten)
    {
        $kecamatan = $this->model->where('id_kota_kabupaten', $id_kota_kabupaten)->get();
        return response()->json($kecamatan);
    }
}
