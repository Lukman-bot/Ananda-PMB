<!-- Script For CRUD Data Periode -->
<script>
    $(document).ready(function() {
        $("#form-periode").on('submit', (e) => {
            e.preventDefault();
            $("#btn-save").attr("disabled", "").html("Sedang upload")
            
            const tahun_akademik = $('[name="tahun_akademik"]').val()

            if (tahun_akademik) {
                const formData = new FormData($('#form-periode')[0]);

                $.ajax({
                    url: '{{url("periode")}}',
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
                        $('[name="tahun_akademik"]').val("")
                        $('[name="semester"]').val("")
                        
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
        $("#tambahLabel").html("Edit Data Periode")
        $.ajax({
            url: `{{url("periode/reqdata/")}}/${id}`,
            type: 'GET',
            success: (data) => {
                const res = JSON.parse(data)
                $("#form-modal").modal('show')
                $("[name='id']").val(id)
                $('[name="tahun_akademik"]').val(res.tahun_akademik)
                $('[name="semester"]').val(res.semester)
                
                $("#btn-save").removeAttr("disabled", "").html("Simpan")
            }
        })
    }

    const hapus = (id) => {
        if (confirm('Apakah Anda yakin?')) {
            $.ajax({
                type: "POST",
                url: "{{url('periode/delete')}}",
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
<!-- End Script For CRUD Data Periode -->
