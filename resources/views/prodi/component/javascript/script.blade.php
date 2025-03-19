<!-- Custom JavaScript For Program Studi -->
<script>
    var tableFakultas;
    var tableProdi;

    $(function() {
        tableFakultas = $('#tb-fakultas').DataTable({
            "processing": true,
            "serverSide": true,
            "retrieve": true,
            "destroy": true,
            "order": [],
            "searching": false,
            "entries": false,
            "bLengthChange": false,
            "ordering": false,
            "autoWidth": false,
            "language": {
                "infoFiltered": "",
                "sZeroRecords": "Fakultas Tidak Ditemukan",
            },
            ajax: {
                url: '{!! route("fakultas.listData") !!}',
                method: 'post',
                data: (data) => {
                    data._token = '{{csrf_token()}}'
                }
            },
            "columnDefs": [{
                "orderable": false,
                "targets": [0, 1, 2, 3],
            }],
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'kode_fakultas',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'nama_fakultas',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });

        tableProdi = $('#tb-prodi').DataTable({
            "processing": true,
            "serverSide": true,
            "retrieve": true,
            "destroy": true,
            "order": [],
            "searching": false,
            "entries": false,
            "bLengthChange": false,
            "ordering": false,
            "autoWidth": false,
            "language": {
                "infoFiltered": "",
                "sZeroRecords": "Program Studi Tidak Ditemukan",
            },
            ajax: {
                url: '{!! route("prodi.listData") !!}',
                method: 'post',
                data: (data) => {
                    data._token = '{{csrf_token()}}'
                    data.id_fakultas = $("#fk-id-fakultas").val()
                }
            },
            "columnDefs": [{
                "orderable": false,
                "targets": [0, 1, 2, 3],
            }],
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'kode_program_studi',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'nama_program_studi',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });

        reloadTableFakultas();
    });

    const reloadTableFakultas = () => {
        tableFakultas.ajax.reload()
    }

    const reloadTableProdi = () => {
        tableProdi.ajax.reload()
    }

    function showDetail(idFakultas) {
        $('#fk-id-fakultas').val(idFakultas);

        $('#show-prodi').removeClass('d-none');
        $('#content-table-prodi').removeClass('d-none');

        reloadTableProdi();
    }

    $(document).ready(() => {
        const tambahFakultas = $(".tambah-fakultas");
        tambahFakultas.on('click', () => {
            $('[name="id_fakultas"]').val("")
            $('[name="kode_fakultas"]').val("")
            $('[name="nama_fakultas"]').val("")
            
            $("#btn-save-fakultas").removeAttr("disabled", "").html("Simpan")
        })

        const tambahProdi = $(".tambah-prodi");
        tambahProdi.on('click', () => {
            $('[name="id_program_studi"]').val("")
            $('[name="kode_program_studi"]').val("")
            $('[name="nama_program_studi"]').val("")
            
            $("#btn-save-prodi").removeAttr("disabled", "").html("Simpan")
        })

        $("#btn-save-fakultas").on('click', function () {
            const kode_fakultas = $('[name="kode_fakultas"]').val()
            const nama_fakultas = $('[name="nama_fakultas"]').val()

            if (kode_fakultas && nama_fakultas) {
                const formData = new FormData($('#form-fakultas')[0]);
                
                $.ajax({
                    url: '{{url("fakultas")}}',
                    data: formData,
                    method: 'post',
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: (res) => {
                        reloadTableFakultas();
                        $(".batal-fakultas").trigger('click');
                        $('#flashdata').html('');
                        $(window).scrollTop(0);
                        
                        $('<div class="alert alert-success" id="alert-data">' + res.status + '</div>')
                            .show()
                            .appendTo('#flashdata');
                            
                        $('#alert-data').delay(2750).slideUp('slow', function() {
                            $(this).remove();
                        });
                        
                        $('[name="kode_fakultas"]').val("")
                        $('[name="nama_fakultas"]').val("")
                        
                        $("#btn-save-fakultas").removeAttr("disabled", "").html("Simpan")
                    },
                    error: (xhr) => {
                        $("#btn-save-fakultas").removeAttr("disabled").html("Simpan");
                        const res = JSON.parse(xhr.responseText);
                        let errorMessages = '';
                        Object.keys(res.errors).forEach((key) => {
                            errorMessages += res.errors[key].join(' ') + '\n';
                        });
                        alert(errorMessages);
                    }
                });
            }
        })

        $("#btn-save-prodi").on('click', function () {
            const kode_program_studi = $('[name="kode_program_studi"]').val()
            const nama_program_studi = $('[name="nama_program_studi"]').val()

            if (kode_program_studi && nama_program_studi) {
                const formData = new FormData($('#form-prodi')[0]);
                const idFakultas = $("#fk-id-fakultas").val();
                formData.append('fk_id_fakultas', idFakultas);

                $.ajax({
                    url: '{{url("prodi")}}',
                    data: formData,
                    method: 'post',
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: (res) => {
                        reloadTableProdi();
                        $(".batal-prodi").trigger('click');
                        $('#flashdata').html('');
                        $(window).scrollTop(0);
                        
                        $('<div class="alert alert-success" id="alert-data">' + res.status + '</div>')
                            .show()
                            .appendTo('#flashdata');
                            
                        $('#alert-data').delay(2750).slideUp('slow', function() {
                            $(this).remove();
                        });
                        
                        $('[name="kode_program_studi"]').val("")
                        $('[name="nama_program_studi"]').val("")
                        
                        $("#btn-save-prodi").removeAttr("disabled", "").html("Simpan")
                    },
                    error: (xhr) => {
                        $("#btn-save-prodi").removeAttr("disabled").html("Simpan");
                        const res = JSON.parse(xhr.responseText);
                        let errorMessages = '';
                        Object.keys(res.errors).forEach((key) => {
                            errorMessages += res.errors[key].join(' ') + '\n';
                        });
                        alert(errorMessages);
                    }
                });
            }
        })
    });

    const editFakultas = async (id) => {
        $.ajax({
            url: `{{url("fakultas/reqdata/")}}/${id}`,
            type: 'GET',
            success: (data) => {
                const res = JSON.parse(data)
                $("#form-modal-fakultas").modal('show')
                $("[name='id_fakultas']").val(id)
                $('[name="kode_fakultas"]').val(res.kode_fakultas)
                $('[name="nama_fakultas"]').val(res.nama_fakultas)
                
                $("#btn-save-fakultas").removeAttr("disabled", "").html("Simpan")
            }
        })
    }

    const editProdi = async (id) => {
        $.ajax({
            url: `{{url("prodi/reqdata/")}}/${id}`,
            type: 'GET',
            success: (data) => {
                const res = JSON.parse(data)
                $("#form-modal-prodi").modal('show')
                $("[name='id_program_studi']").val(id)
                $('[name="kode_program_studi"]').val(res.kode_program_studi)
                $('[name="nama_program_studi"]').val(res.nama_program_studi)
                
                $("#btn-save-prodi").removeAttr("disabled", "").html("Simpan")
            }
        })
    }

    const hapusFakultas = (id) => {
        if (confirm('Apakah Anda yakin?')) {
            $.ajax({
                type: "POST",
                url: "{{url('fakultas/delete')}}",
                data: {
                    id,
                    _token: '{{csrf_token()}}'
                },
                dataType: "JSON",
                success: function(response) {
                    reloadTableFakultas()
                    $('#flashdata').html('');
                    $('<div class="alert alert-success alert-dismissible" id="alert" style="font-weight: bold;">Berhasil Menghapus Data</div>').show().appendTo('#flashdata');
                    $('#alert').delay(2750).slideUp('slow', function() {
                        $(this).remove();
                    });
                }
            });
        }
    }

    const hapusProdi = (id) => {
        if (confirm('Apakah Anda yakin?')) {
            $.ajax({
                type: "POST",
                url: "{{url('prodi/delete')}}",
                data: {
                    id,
                    _token: '{{csrf_token()}}'
                },
                dataType: "JSON",
                success: function(response) {
                    reloadTableProdi()
                    $('#flashdata').html('');
                    $('<div class="alert alert-success alert-dismissible" id="alert" style="font-weight: bold;">Berhasil Menghapus Data</div>').show().appendTo('#flashdata');
                    $('#alert').delay(2750).slideUp('slow', function() {
                        $(this).remove();
                    });
                }
            });
        }
    }
</script>
<!-- End Custom JavaScript For Program Studi -->
