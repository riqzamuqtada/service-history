<script>
    $(function() {

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

        var table = $('#tablePenempatan').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('penempatan/getdata') ?>",
                "type": "POST",
                "data": function(data) {
                    data.id_unit = $('#filter_unit').val()
                    data.awal = $('#tgl-awal').val()
                    data.akhir = $('#tgl-akhir').val()
                }
            },
            "columnDefs": [{
                "targets": [0, 5],
                "orderable": false,
            }, ],
        });

        // confirm hapus
        $('#tablePenempatan').on('click', '.btn-delete', function() {

            const url = $(this).data('url');
            const id = $(this).data('id');

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data riwayat akan dihapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        method: 'POST',
                        url: url + 'penempatan/delete',
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
        $('#tablePenempatan').on('click', '.btn-update', function() {
            document.location.href = $(this).data('url')
        })

        // tombol detail
        $('#tablePenempatan').on('click', '.btn-detail', function() {
            document.location.href = $(this).data('url')
        })

        // filter unit
        $('select[name="id_unit"]').on('change', function() {
            table.ajax.reload()
        })

        // filter tgl awal
        $('#tgl-awal').on('change', function() {
            table.ajax.reload()
        })
        // filter tgl akhir
        $('#tgl-akhir').on('change', function() {
            table.ajax.reload()
        })

    })
</script>