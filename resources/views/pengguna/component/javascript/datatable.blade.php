<!-- Script For Datatable Users -->
<script>
    var table;

    $(function() {
        table = $('#tb').DataTable({
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
                "sZeroRecords": "Data Pengguna Tidak Ditemukan",
            },
            ajax: {
                url: '{!! route("pengguna.listData") !!}',
                method: 'post',
                data: (data) => {
                    data._token = '{{csrf_token()}}'
                    data.cari = $("#form-search").val()
                    data.tipe = 'pengguna'
                    data.role = $("#form-role").val()
                }
            },
            "columnDefs": [{
                "orderable": false,
                "targets": [0, 1, 2, 3, 4],
            }],
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'full_name',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'alamat_email',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'role',
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

        reload();
    });

    const reload = () => {
        table.ajax.reload()
    }
</script>
<!-- End Script For Datatable Users -->
