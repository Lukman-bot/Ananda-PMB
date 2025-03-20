<!-- Script For CRUD Data Kecamatan -->
<script>
    $(document).ready(function() {
        $("#form-kecamatan").on('submit', (e) => {
            e.preventDefault();
            $("#btn-save").attr("disabled", "").html("Sedang upload")
            
            const nama_kecamatan = $('[name="nama_kecamatan"]').val()

            if (nama_kecamatan) {
                const formData = new FormData($('#form-kecamatan')[0]);
                const idKota = $("#id_kota").val();
                formData.append('id_kota', idKota);

                $.ajax({
                    url: '{{url("alamat/kecamatan")}}',
                    data: formData,
                    method: 'post',
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: (res) => {
                        reload()
                        $(".batal").trigger('click');
                        $('#flashdata').html('');
                        $(window).scrollTop(0);
                        
                        $('<div class="alert alert-success" id="alert-data">' + res.status + '</div>')
                            .show()
                            .appendTo('#flashdata');
                            
                        $('#alert-data').delay(2750).slideUp('slow', function() {
                            $(this).remove();
                        });
                        
                        $('[name="id"]').val("")
                        $('[name="nama_kecamatan"]').val("")
                        
                        $("#btn-save").removeAttr("disabled", "").html("Simpan")
                    },
                    error: (xhr) => {
                        $("#btn-save").removeAttr("disabled").html("Simpan");
                        const res = JSON.parse(xhr.responseText);
                        alert(res.status);
                    }
                });
            }
        })
    })

    const edit = async (id) => {
        $("#tambahLabel").html("Edit Data Kecamatan")
        $.ajax({
            url: `{{url("alamat/kecamatan/reqdata/")}}/${id}`,
            type: 'GET',
            success: (data) => {
                const res = JSON.parse(data)
                $("#form-modal").modal('show')
                $("[name='id']").val(id)
                $('[name="nama_kecamatan"]').val(res.nama_kecamatan)
                
                $("#btn-save").removeAttr("disabled", "").html("Simpan")
            }
        })
    }

    const hapus = (id) => {
        if (confirm('Apakah Anda yakin?')) {
            $.ajax({
                type: "POST",
                url: "{{url('alamat/kecamatan/delete')}}",
                data: {
                    id,
                    _token: '{{csrf_token()}}'
                },
                dataType: "JSON",
                success: function(response) {
                    reload()
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
<!-- End Script For CRUD Data Kecamatan -->
