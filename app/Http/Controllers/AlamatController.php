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
}
