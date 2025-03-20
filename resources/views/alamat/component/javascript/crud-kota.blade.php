<!-- Custom JavaScript For CRUD Kota -->
<script>
    function showDetail(idProvinsi) {
        $('#fk-id-provinsi').val(idProvinsi);

        $('#show-kota').removeClass('d-none');
        $('#content-table-kota').removeClass('d-none');

        reloadTableKota();
    }

    $(document).ready(() => {
        const tambahKota = $(".tambah-kota");
        tambahKota.on('click', () => {
            $('[name="id_kota_kabupaten"]').val("")
            $('[name="nama_kota_kabupaten"]').val("")
            
            $("#btn-save-kota").removeAttr("disabled", "").html("Simpan")
        })

        $("#btn-save-kota").on('click', function () {
            const nama_kota_kabupaten = $('[name="nama_kota_kabupaten"]').val()

            if (nama_kota_kabupaten) {
                const formData = new FormData($('#form-kota')[0]);
                const idProvinsi = $("#fk-id-provinsi").val();
                formData.append('fk_id_provinsi', idProvinsi);

                $.ajax({
                    url: '{{url("alamat/kota")}}',
                    data: formData,
                    method: 'post',
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: (res) => {
                        reloadTableKota();
                        $(".batal-kota").trigger('click');
                        $('#flashdata').html('');
                        $(window).scrollTop(0);
                        
                        $('<div class="alert alert-success" id="alert-data">' + res.status + '</div>')
                            .show()
                            .appendTo('#flashdata');
                            
                        $('#alert-data').delay(2750).slideUp('slow', function() {
                            $(this).remove();
                        });
                        
                        $('[name="id_kota_kabupaten"]').val("")
                        $('[name="nama_kota_kabupaten"]').val("")
                        
                        $("#btn-save-kota").removeAttr("disabled", "").html("Simpan")
                    },
                    error: (xhr) => {
                        $("#btn-save-kota").removeAttr("disabled").html("Simpan");
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

    const editKota = async (id) => {
        $.ajax({
            url: `{{url("alamat/kota/reqdata/")}}/${id}`,
            type: 'GET',
            success: (data) => {
                const res = JSON.parse(data)
                $("#form-modal-kota").modal('show')
                $("[name='id_kota_kabupaten']").val(id)
                $('[name="nama_kota_kabupaten"]').val(res.nama_kota_kabupaten)
                
                $("#btn-save-kota").removeAttr("disabled", "").html("Simpan")
            }
        })
    }

    const hapusKota = (id) => {
        if (confirm('Apakah Anda yakin?')) {
            $.ajax({
                type: "POST",
                url: "{{url('alamat/kota/delete')}}",
                data: {
                    id,
                    _token: '{{csrf_token()}}'
                },
                dataType: "JSON",
                success: function(response) {
                    reloadTableKota()
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
<!-- End Custom JavaScript For CRUD Kota -->
