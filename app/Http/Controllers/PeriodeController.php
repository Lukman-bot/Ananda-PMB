<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Periode;

class PeriodeController extends Controller
{
    private Periode $model;

    public function __construct()
    {
        $this->model = new Periode();
    }

    public function index()
    {
        $data = [
            'title' => 'Periode'
        ];

        return view('periode.index', $data);
    }

    public function listData(Request $request)
    {
        if ($request->ajax()) {
            $db = $this->model->getDataTables($request);
            return Datatables::of($db)
                ->addColumn('action', function ($row) {
                    $btn = '<div class="d-flex justify-content-center btn-group">';
                    $btn .= '
                        <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit" href="javascript:void(0)" onclick="edit('. $row->id_periode .')">
                            <i class="fa fa-edit"></i>
                        </a>
                    ';
                    $btn .= '
                        <a class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"  href="javascript:void(0)" onclick="hapus('. $row->id_periode .')">
                            <i class="fa fa-trash"></i>
                        </a>
                    ';
                    $btn .= '</div>';

                    return $btn;
                })
                ->addColumn('semester', function ($row) {
                    $semester = '';
                    switch ($row->semester) {
                        case '1':
                            $semester = 'Ganjil';
                            break;
                        case '2':
                            $semester = 'Genap';
                            break;
                        default:
                            $semester = 'Status tidak valid';
                            break;
                    }

                    return $semester;
                })
                ->rawColumns(['action', 'semester'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function save(Request $request)
    {
        $id = $request->get('id');

        $validate['tahun_akademik'] = $request->get('tahun_akademik');
        $validate['semester'] = $request->get('semester');

        if ($id == null) {
            $validate['created_at'] = now();

            $this->model->create($validate);
            return response()->json(['status' => 'Data Berhasil Ditambahkan']);
        } else {
            $validate['updated_at'] = now();

            $this->model->where('id_periode', $id)->update($validate);
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
        $this->model->where('id_periode', $request->get('id'))->delete();

        return response()->json(['status' => 'oke']);
    }
}
