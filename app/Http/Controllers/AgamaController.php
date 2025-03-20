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
}
