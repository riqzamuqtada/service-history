<script>
    $(function() {

        var table;
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

        table = $('#tableNotes').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('notes/getdata') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                "targets": [0, 5],
                "orderable": false,
            }, ],
        });

        // confirm hapus
        $('#tableNotes').on('click', '.btn-delete', function() {

            const url = $(this).data('url');
            const id = $(this).data('id');
            const judul = $(this).data('judul');

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Catatan " + judul + " akan dihapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        method: 'POST',
                        url: url + 'notes/delete',
                        data: {
                            id: id,
                            judul: judul
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

        })

        // tombol detail
        $('#tableNotes').on('click', '.btn-detail', function() {

            document.location.href = $(this).data('url')

        })

        // tombol detail
        $('#tableNotes').on('click', '.btn-update', function() {

            document.location.href = $(this).data('url')

        })

    })
</script>