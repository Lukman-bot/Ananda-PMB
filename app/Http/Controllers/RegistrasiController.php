<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;
use App\Models\Kota;
use App\Models\Agama;
use App\Models\Provinsi;
use App\Models\Kecamatan;
use App\Models\CalonMahasiswa;
use App\Models\AlamatMahasiswa;
use App\Models\PendidikanMahasiswa;
use App\Models\OrangTuaMahasiswa;

class RegistrasiController extends Controller
{
    private Users $model;

    public function __construct()
    {
        $this->model = new Users();
    }

    public function index()
    {
        $data = [
            'title' => 'Form Mahasiswa',
            'kota' => Kota::all(),
            'agama' => Agama::all(),
            'provinsi' => Provinsi::all(),
            'kecamatan' => Kecamatan::all(),
        ];

        return view('auth.registrasi.index', $data);
    }

    public function save(Request $request)
    {
        $id = $request->get('id');

        // Data yang divalidasi untuk user
        $validate['full_name'] = $request->get('full_name');
        $validate['alamat_email'] = $request->get('alamat_email');
        $validate['id_role'] = '20';

        // Tambah user baru
        $validate['password'] = Hash::make('123456');
        $validate['created_at'] = now();
        $newUser = $this->model->create($validate);

        // Simpan data calon mahasiswa
        $this->storeOrUpdateCalonMahasiswa($request, $newUser->id_users);

        // Redirect ke halaman 'mahasiswa' dengan flash message
        return redirect()->route('login.index')->with('success', 'Berhasil melakukan registrasii. Sekarang Anda bisa melakukan login menggunakan email yang didaftarkan dan menggunakan password "123456"');
    }

    private function storeOrUpdateCalonMahasiswa(Request $request, $id_users)
    {
        $calonMahasiswa = CalonMahasiswa::where('id_users', $id_users)->first();

        // Tambah data baru
        $calonMahasiswa = CalonMahasiswa::create([
            'id_users' => $id_users,
            'nama_lengkap' => $request->get('full_name'),
            'nik' => $request->get('nik'),
            'nisn' => $request->get('nisn'),
            'id_kota_kabupaten' => $request->get('tempat_lahir'),
            'tanggal_lahir' => $request->get('tanggal_lahir'),
            'jenis_kelamin' => $request->get('jenis_kelamin'),
            'id_agama' => $request->get('id_agama'),
            'no_hp' => $request->get('no_hp'),
            'email' => $request->get('alamat_email'),
            'created_at' => now()
        ]);

        // Simpan atau update data alamat_mahasiswa
        AlamatMahasiswa::updateOrCreate(
            ['id_calon_mahasiswa' => $calonMahasiswa->id_calon_mahasiswa],
            [
                'alamat' => $request->get('alamat'),
                'id_provinsi' => $request->get('id_provinsi'),
                'id_kota_kabupaten' => $request->get('id_kota_kabupaten'),
                'id_kecamatan' => $request->get('id_kecamatan'),
                'kelurahan' => $request->get('kelurahan'),
                'kode_pos' => $request->get('kode_pos'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        // Simpan atau update data pendidikan_mahasiswa
        PendidikanMahasiswa::updateOrCreate(
            ['id_calon_mahasiswa' => $calonMahasiswa->id_calon_mahasiswa],
            [
                'asal_sekolah' => $request->get('asal_sekolah'),
                'jurusan_sekolah' => $request->get('jurusan_sekolah'),
                'tahun_lulus' => $request->get('tahun_lulus'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        // Simpan atau update data orang_tua_mahasiswa
        OrangTuaMahasiswa::updateOrCreate(
            ['id_calon_mahasiswa' => $calonMahasiswa->id_calon_mahasiswa],
            [
                'nama_ayah' => $request->get('nama_ayah'),
                'nama_ibu' => $request->get('nama_ibu'),
                'pekerjaan_ayah' => $request->get('pekerjaan_ayah'),
                'pekerjaan_ibu' => $request->get('pekerjaan_ibu'),
                'penghasilan_orang_tua' => $request->get('penghasilan_orang_tua'),
                'jumlah_saudara' => $request->get('jumlah_saudara'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
    }
}
