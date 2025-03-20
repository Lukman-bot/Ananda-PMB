<!-- Script For CRUD Data Agama -->
<script>
    $(document).ready(function() {
        $("#form-agama").on('submit', (e) => {
            e.preventDefault();
            $("#btn-save").attr("disabled", "").html("Sedang upload")
            
            const nama_agama = $('[name="nama_agama"]').val()

            if (nama_agama) {
                const formData = new FormData($('#form-agama')[0]);

                $.ajax({
                    url: '{{url("agama")}}',
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
                        $('[name="nama_agama"]').val("")
                        
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
        $("#tambahLabel").html("Edit Data Agama")
        $.ajax({
            url: `{{url("agama/reqdata/")}}/${id}`,
            type: 'GET',
            success: (data) => {
                const res = JSON.parse(data)
                $("#form-modal").modal('show')
                $("[name='id']").val(id)
                $('[name="nama_agama"]').val(res.nama_agama)
                
                $("#btn-save").removeAttr("disabled", "").html("Simpan")
            }
        })
    }

    const hapus = (id) => {
        if (confirm('Apakah Anda yakin?')) {
            $.ajax({
                type: "POST",
                url: "{{url('agama/delete')}}",
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
<!-- End Script For CRUD Data Agama -->
