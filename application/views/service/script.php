<script>
    $(document).ready(function() {

        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        var table = $('#tableService').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('service/getdata') ?>",
                "type": "POST",
                "data": function(data) {
                    data.id_unit = $('#filter_unit').val()
                    data.status = $('#filter_status').val()
                    data.bulan = $('#bulan').val()
                    data.tahun = $('#tahun').val()
                }
            },
            "columnDefs": [{
                "targets": [0, 5, 6],
                "orderable": false,
            }, ],
        });


        // confirm hapus
        $('#tableService').on('click', '.btn-delete', function() {

            const url = $(this).data('url');
            const id = $(this).data('id');

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data riwayat akan dihapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        method: 'POST',
                        url: url + 'service/delete',
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(data) {

                            Toast.fire({
                                icon: data.type,
                                title: data.text
                            })
                            table.ajax.reload();

                        }
                    })

                }
            })

        });

        // tombol update
        $('#tableService').on('click', '.btn-update', function() {
            document.location.href = $(this).data('url')
        })

        // tombol detail
        $('#tableService').on('click', '.btn-detail', function() {
            document.location.href = $(this).data('url')
        })

        // filter unit
        $('select[name="id_unit"]').on('change', function() {
            table.ajax.reload()
        })

        // filter tanggal awal
        $('#bulan').on('change', function() {
            table.ajax.reload()
        })

        // filter tanggal akhir
        $('#tahun').on('change', function() {
            table.ajax.reload()
        })

        // filter status
        $('#filter_status').on('change', function() {
            console.log($('#filter_status').val());
            table.ajax.reload()
        })

        $('#status_barang').change(function() {

            if ($(this).is(':checked') === true) {
                const value = $('#keterangan2').data('value')
                $('#keterangan2').attr('hidden', false);
                $('#keterangan2').val(value);
            } else {
                $('#keterangan2').attr('hidden', true);
                $('#keterangan2').val(null);
            }

        });

    });
</script>