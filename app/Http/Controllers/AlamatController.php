<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;

class AlamatController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Alamat',
            'provinsi' => Provinsi::get()
        ];

        return view('alamat.index', $data);
    }

    public function kecamatan($id)
    {
        $data = [
            'title' => 'Data Alamat',
            'id_kota' => $id
        ];

        return view('alamat.index-kecamatan', $data);
    }
}
