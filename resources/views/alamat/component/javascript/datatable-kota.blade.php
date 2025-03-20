<!-- Custom JavaScript For Datatable Kota / Kabupaten -->
<script>
    var tableKota;

    $(function() {
        tableKota = $('#tb-kota').DataTable({
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
                "sZeroRecords": "Kota / Kabupaten Tidak Ditemukan",
            },
            ajax: {
                url: '{!! route("kota.listData") !!}',
                method: 'post',
                data: (data) => {
                    data._token = '{{csrf_token()}}'
                    data.id_provinsi = $("#fk-id-provinsi").val()
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
                    data: 'nama_kota_kabupaten',
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
    });

    const reloadTableKota = () => {
        tableKota.ajax.reload()
    }
</script>
<!-- End Custom JavaScript For Datatable Kota / Kabupaten -->
