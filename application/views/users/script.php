<script>
    $(document).ready(function() {

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

        table = $('#tableUser').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('users/getdata') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                "targets": [0, 5],
                "orderable": false,
            }, ],
        });

        // confirm hapus
        $('#tableUser').on('click', '.btn-hapus', function() {

            const url = $(this).data('url');
            const id = $(this).data('id');
            const nama = $(this).data('nama');

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "User " + nama + " akan dihapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        method: 'POST',
                        url: url + 'users/delete',
                        data: {
                            id: id,
                            nama: nama
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

        $('#tableUser').on('click', '.btn-update', function() {

            document.location.href = $(this).data('url')

        })

        $('#tableUser').on('click', '.btn-gantiPass', function() {

            document.location.href = $(this).data('url')

        })

    });
</script>