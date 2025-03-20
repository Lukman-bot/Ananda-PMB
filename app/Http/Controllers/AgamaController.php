<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Agama;

class AgamaController extends Controller
{
    private Agama $model;

    public function __construct()
    {
        $this->model = new Agama();
    }

    public function index()
    {
        $data = [
            'title' => 'Agama'
        ];

        return view('agama.index', $data);
    }

    public function listData(Request $request)
    {
        if ($request->ajax()) {
            $db = $this->model->getDataTables($request);
            return Datatables::of($db)
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex justify-content-center btn-group">';
                    $btn .= '
                        <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit" href="javascript:void(0)" onclick="edit('. $row->id_agama .')">
                            <i class="fa fa-edit"></i>
                        </a>
                    ';
                    $btn .= '
                        <a class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"  href="javascript:void(0)" onclick="hapus('. $row->id_agama .')">
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

        // Validasi Email
        $agamaExists = $this->model->where('nama_agama', $request->get('nama_agama'));
        if ($id) $agamaExists->where('id_agama', '!=', $id);
        if ($agamaExists->exists()) return response()->json(['status' => 'Agama ini sudah ada, silakan tambahkan yang lain'], 400);

        $validate['nama_agama'] = $request->get('nama_agama');

        if ($id == null) {
            $validate['created_at'] = now();

            $this->model->create($validate);
            return response()->json(['status' => 'Data Berhasil Ditambahkan']);
        } else {
            $validate['updated_at'] = now();

            $this->model->where('id_agama', $id)->update($validate);
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
        $this->model->where('id_agama', $request->get('id'))->delete();

        return response()->json(['status' => 'oke']);
    }
}
