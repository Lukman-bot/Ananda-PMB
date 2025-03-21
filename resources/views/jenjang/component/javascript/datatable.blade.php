<!-- Script For Datatable Jenjang -->
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
                "sZeroRecords": "Data Jenjang Tidak Ditemukan",
            },
            ajax: {
                url: '{!! route("jenjang.listData") !!}',
                method: 'post',
                data: (data) => {
                    data._token = '{{csrf_token()}}'
                    data.cari = $("#form-search").val()
                }
            },
            "columnDefs": [{
                "orderable": false,
                "targets": [0, 1, 2],
            }],
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'nama_jenjang',
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
<!-- End Script For Datatable Jenjang -->
