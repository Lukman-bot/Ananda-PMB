<!-- Script For CRUD Data Pengguna -->
<script>
    $(document).ready(function() {
        $("#form-pengguna").on('submit', (e) => {
            e.preventDefault();
            $("#btn-save").attr("disabled", "").html("Sedang upload")
            
            const full_name = $('[name="full_name"]').val()
            const alamat_email = $('[name="alamat_email"]').val()
            const id_role = $('[name="id_role"]').val()

            if (full_name && alamat_email && id_role) {
                const formData = new FormData($('#form-pengguna')[0]);
                formData.set('id_role', id_role);

                $.ajax({
                    url: '{{url("pengguna")}}',
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
                        
                        $('[name="full_name"]').val("")
                        $('[name="alamat_email"]').val("")
                        $('[name="id_role"]').val("")
                        $('[name="password"]').val("")
                        
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
        $("#tambahLabel").html("Edit Data Pengguna")
        $.ajax({
            url: `{{url("pengguna/reqdata/")}}/${id}`,
            type: 'GET',
            success: (data) => {
                const res = JSON.parse(data)
                $("#form-modal").modal('show')
                $("[name='id']").val(id)
                $('[name="full_name"]').val(res.full_name)
                $('[name="alamat_email"]').val(res.alamat_email)
                $('[name="id_role"]').val(res.id_role)
                
                $("#btn-save").removeAttr("disabled", "").html("Simpan")
            }
        })
    }

    const hapus = (id) => {
        if (confirm('Apakah Anda yakin?')) {
            $.ajax({
                type: "POST",
                url: "{{url('pengguna/delete')}}",
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

    $(document).on('click', '.toggle-password', function () {
        const passwordInput = $('#password');
        const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
        passwordInput.attr('type', type);
        $(this).find('i').toggleClass('fa-eye fa-eye-slash');
    });
</script>
<!-- End Script For CRUD Data Pengguna -->
