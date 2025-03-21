<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Gelombang;

class GelombangController extends Controller
{
    private Gelombang $model;

    public function __construct()
    {
        $this->model = new Gelombang();
    }

    public function index()
    {
        $data = [
            'title' => 'Gelombang'
        ];

        return view('gelombang.index', $data);
    }

    public function listData(Request $request)
    {
        if ($request->ajax()) {
            $db = $this->model->getDataTables($request);
            return Datatables::of($db)
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex justify-content-center btn-group">';
                    $btn .= '
                        <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit" href="javascript:void(0)" onclick="edit('. $row->id_gelombang .')">
                            <i class="fa fa-edit"></i>
                        </a>
                    ';
                    $btn .= '
                        <a class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"  href="javascript:void(0)" onclick="hapus('. $row->id_gelombang .')">
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
        $gelombangExists = $this->model->where('nama_gelombang', $request->get('nama_gelombang'));
        if ($id) $gelombangExists->where('id_gelombang', '!=', $id);
        if ($gelombangExists->exists()) return response()->json(['status' => 'Nama Gelombang ini sudah ada, silakan tambahkan yang lain'], 400);

        $validate['nama_gelombang'] = $request->get('nama_gelombang');

        if ($id == null) {
            $validate['created_at'] = now();

            $this->model->create($validate);
            return response()->json(['status' => 'Data Berhasil Ditambahkan']);
        } else {
            $validate['updated_at'] = now();

            $this->model->where('id_gelombang', $id)->update($validate);
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
        $this->model->where('id_gelombang', $request->get('id'))->delete();

        return response()->json(['status' => 'oke']);
    }
}
