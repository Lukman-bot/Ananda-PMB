<!-- Custom JavaScript For CRUD Provinsi -->
<script>
    $(document).ready(() => {
        const tambahProvinsi = $(".tambah-provinsi");
        tambahProvinsi.on('click', () => {
            $('[name="id_provinsi"]').val("")
            $('[name="nama_provinsi"]').val("")
            
            $("#btn-save-provinsi").removeAttr("disabled", "").html("Simpan")
        })

        $("#btn-save-provinsi").on('click', function () {
            const nama_provinsi = $('[name="nama_provinsi"]').val()

            if (nama_provinsi) {
                const formData = new FormData($('#form-provinsi')[0]);
                
                $.ajax({
                    url: '{{url("alamat/provinsi")}}',
                    data: formData,
                    method: 'post',
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: (res) => {
                        reloadTableProvinsi();
                        $(".batal-provinsi").trigger('click');
                        $('#flashdata').html('');
                        $(window).scrollTop(0);
                        
                        $('<div class="alert alert-success" id="alert-data">' + res.status + '</div>')
                            .show()
                            .appendTo('#flashdata');
                            
                        $('#alert-data').delay(2750).slideUp('slow', function() {
                            $(this).remove();
                        });
                        
                        $('[name="id_provinsi"]').val("")
                        $('[name="nama_provinsi"]').val("")
                        
                        $("#btn-save-provinsi").removeAttr("disabled", "").html("Simpan")
                    },
                    error: (xhr) => {
                        $("#btn-save-provinsi").removeAttr("disabled").html("Simpan");
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

    const editProvinsi = async (id) => {
        $.ajax({
            url: `{{url("alamat/provinsi/reqdata/")}}/${id}`,
            type: 'GET',
            success: (data) => {
                const res = JSON.parse(data)
                $("#form-modal-provinsi").modal('show')
                $("[name='id_provinsi']").val(id)
                $('[name="nama_provinsi"]').val(res.nama_provinsi)
                
                $("#btn-save-provinsi").removeAttr("disabled", "").html("Simpan")
            }
        })
    }

    const hapusProvinsi = (id) => {
        if (confirm('Apakah Anda yakin?')) {
            $.ajax({
                type: "POST",
                url: "{{url('alamat/provinsi/delete')}}",
                data: {
                    id,
                    _token: '{{csrf_token()}}'
                },
                dataType: "JSON",
                success: function(response) {
                    reloadTableProvinsi()
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
<!-- End Custom JavaScript For CRUD Provinsi -->
