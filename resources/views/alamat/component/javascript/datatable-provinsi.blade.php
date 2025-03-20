<!-- Custom JavaScript For Datatable Provinsi -->
<script>
    var tableProvinsi;

    $(function() {
        tableProvinsi = $('#tb-provinsi').DataTable({
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
                "sZeroRecords": "Provinsi Tidak Ditemukan",
            },
            ajax: {
                url: '{!! route("provinsi.listData") !!}',
                method: 'post',
                data: (data) => {
                    data._token = '{{csrf_token()}}'
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
                    data: 'nama_provinsi',
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

        reloadTableProvinsi();
    });

    const reloadTableProvinsi = () => {
        tableProvinsi.ajax.reload()
    }
</script>
<!-- End Custom JavaScript For Datatable Provinsi -->
