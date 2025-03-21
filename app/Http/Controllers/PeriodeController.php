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
}
