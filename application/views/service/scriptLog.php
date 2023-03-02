<script>
    $(function(){

        var table = $('#main-list').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('Log/getLog') ?>",
                "type": "POST",
                "data": function(data) {
                    data.awal = $('input[id="tgl-awal"]').val()
                    data.akhir = $('input[id="tgl-akhir"]').val()
                }
            },
            "columnDefs": [{
                "targets": [0, 1, 2],
                "orderable": false,
            }, ],
        });

        // filter tanggal awal
        $('#tgl-awal').on('change', function() {
            table.ajax.reload()
        })

        // filter tanggal akhir
        $('#tgl-akhir').on('change', function() {
            table.ajax.reload()
        })

    })
</script>