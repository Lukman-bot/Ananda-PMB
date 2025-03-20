@extends('layout.template')
@section('content')
<form action="{{url("mahasiswa")}}" method="post">
    @csrf
    <input type="hidden" name="id" id="id" value="{{@$users->id_users}}">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{url("mahasiswa")}}" class="btn btn-warning" style="color: white;">
                        Kembali
                    </a>
                    <div class="float-right">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Masukkan Nama Lengkap" value="{{@$users->full_name}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat Email</label>
                                <input type="text" class="form-control" name="alamat_email" id="alamat_email" placeholder="Masukkan Alamat Email" value="{{@$users->alamat_email}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">No. HP</label>
                                <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan No. HP" value="{{@$calon_mahasiswa->no_hp}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">NIK</label>
                                <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK" value="{{@$calon_mahasiswa->nik}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">NISN</label>
                                <input type="text" class="form-control" name="nisn" id="nisn" placeholder="Masukkan NISN" value="{{@$calon_mahasiswa->nisn}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                    <option value="">--Pilih Jenis Kelamin--</option>
                                    <option value="L" {{ (isset($calon_mahasiswa) && $calon_mahasiswa->jenis_kelamin == 'L') ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ (isset($calon_mahasiswa) && $calon_mahasiswa->jenis_kelamin == 'P') ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <select name="tempat_lahir" id="tempat_lahir" class="form-control" required>
                                    <option value="">--Pilih Tempat Lahir--</option>
                                    @foreach ($kota as $showK)
                                        <option value="{{ $showK->id_kota_kabupaten }}" 
                                            {{ (isset($calon_mahasiswa) && $calon_mahasiswa->id_kota_kabupaten == $showK->id_kota_kabupaten) ? 'selected' : '' }}>
                                            {{ $showK->nama_kota_kabupaten }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Tgl. Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{@$calon_mahasiswa->tanggal_lahir}}" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Agama</label>
                                <select name="id_agama" id="id_agama" class="form-control" required>
                                    <option value="">--Pilih Agama--</option>
                                    @foreach ($agama as $showA)
                                        <option value="{{$showA->id_agama}}"
                                        {{ (isset($calon_mahasiswa) && $calon_mahasiswa->id_agama == $showA->id_agama) ? 'selected' : '' }}>
                                            {{$showA->nama_agama}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_provinsi">Provinsi</label>
                                <select name="id_provinsi" id="id_provinsi" class="form-control" required>
                                    <option value="">--Pilih Provinsi--</option>
                                    @foreach ($provinsi as $showPrv)
                                        <option value="{{ $showPrv->id_provinsi }}"
                                        {{ (isset($alamat_mahasiswa) && $alamat_mahasiswa->id_provinsi == $showPrv->id_provinsi) ? 'selected' : '' }}>
                                            {{ $showPrv->nama_provinsi }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_kota_kabupaten">Kota/Kabupaten</label>
                                <select name="id_kota_kabupaten" id="id_kota_kabupaten" class="form-control" required>
                                    <option value="">--Pilih Kota/Kabupaten--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_kecamatan">Kecamatan</label>
                                <select name="id_kecamatan" id="id_kecamatan" class="form-control" required>
                                    <option value="">--Pilih Kecamatan--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kelurahan</label>
                                <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Masukkan Kelurahan" value="{{@$alamat_mahasiswa->kelurahan}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Kode Pos</label>
                                <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Masukkan Kode Pos" value="{{@$alamat_mahasiswa->kode_pos}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat" value="{{@$alamat_mahasiswa->alamat}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Asal Sekolah</label>
                                <input type="text" class="form-control" name="asal_sekolah" id="asal_sekolah" placeholder="Masukkan Asal Sekolah" value="{{@$pendidikan_mahasiswa->asal_sekolah}}" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="">Jurusan</label>
                                <input type="text" class="form-control" name="jurusan_sekolah" id="jurusan_sekolah" placeholder="Masukkan Jurusan" value="{{@$pendidikan_mahasiswa->jurusan_sekolah}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Tahun Lulus</label>
                                <input type="text" class="form-control" name="tahun_lulus" id="tahun_lulus" placeholder="Masukkan Tahun Lulus" value="{{@$pendidikan_mahasiswa->tahun_lulus}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Ayah</label>
                                <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Masukkan Nama Ayah" value="{{@$orang_tua_mahasiswa->nama_ayah}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Ibu</label>
                                <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Masukkan Nama Ibu" value="{{@$orang_tua_mahasiswa->nama_ibu}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Pekerjaan Ayah</label>
                                <input type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" placeholder="Masukkan Pekerjaan Ayah" value="{{@$orang_tua_mahasiswa->pekerjaan_ayah}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Pekerjaan Ibu</label>
                                <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Masukkan Pekerjaan Ibu" value="{{@$orang_tua_mahasiswa->pekerjaan_ibu}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Penghasilan Orang Tua</label>
                                <input type="text" class="form-control" name="penghasilan_orang_tua" id="penghasilan_orang_tua" placeholder="Masukkan Penghasilan Orang Tua" value="{{@$orang_tua_mahasiswa->penghasilan_orang_tua}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Saudara</label>
                                <input type="text" class="form-control" name="jumlah_saudara" id="jumlah_saudara" placeholder="Masukkan Jumlah Saudara" value="{{@$orang_tua_mahasiswa->jumlah_saudara}}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function () {
        var selectedKota = "{{ isset($alamat_mahasiswa) ? $alamat_mahasiswa->id_kota_kabupaten : '' }}";
        var selectedKecamatan = "{{ isset($alamat_mahasiswa) ? $alamat_mahasiswa->id_kecamatan : '' }}";

        function loadKota(id_provinsi, callback) {
            $('#id_kota_kabupaten').html('<option value="">--Pilih Kota/Kabupaten--</option>');
            $('#id_kecamatan').html('<option value="">--Pilih Kecamatan--</option>');
            if (id_provinsi) {
                $.ajax({
                    url: '{{ url("alamat/kota/get-kota") }}/' + id_provinsi,
                    type: 'GET',
                    success: function (data) {
                        $.each(data, function (key, value) {
                            $('#id_kota_kabupaten').append('<option value="' + value.id_kota_kabupaten + '" ' + (selectedKota == value.id_kota_kabupaten ? 'selected' : '') + '>' + value.nama_kota_kabupaten + '</option>');
                        });
                        if (typeof callback === 'function') callback();
                    }
                });
            }
        }

        function loadKecamatan(id_kota_kabupaten) {
            $('#id_kecamatan').html('<option value="">--Pilih Kecamatan--</option>');
            if (id_kota_kabupaten) {
                $.ajax({
                    url: '{{ url("alamat/kecamatan/get-kecamatan") }}/' + id_kota_kabupaten,
                    type: 'GET',
                    success: function (data) {
                        $.each(data, function (key, value) {
                            $('#id_kecamatan').append('<option value="' + value.id_kecamatan + '" ' + (selectedKecamatan == value.id_kecamatan ? 'selected' : '') + '>' + value.nama_kecamatan + '</option>');
                        });
                    }
                });
            }
        }

        $('#id_provinsi').change(function () {
            var id_provinsi = $(this).val();
            loadKota(id_provinsi);
        });

        $('#id_kota_kabupaten').change(function () {
            var id_kota_kabupaten = $(this).val();
            loadKecamatan(id_kota_kabupaten);
        });

        var id_provinsi = $('#id_provinsi').val();
        if (id_provinsi) {
            loadKota(id_provinsi, function () {
                if (selectedKota) {
                    loadKecamatan(selectedKota);
                }
            });
        }
    });
</script>
@endsection
