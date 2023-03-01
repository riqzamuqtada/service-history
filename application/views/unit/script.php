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

        table = $('#tableUnit').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?= base_url('unit/getdata') ?>",
                "type": "POST"
            },
            "columnDefs": [{
                "targets": [0, 5],
                "orderable": false,
            }, ],
        });



        // confirm hapus
        $('#tableUnit').on('click', '.btn-delete', function() {

            const url = $(this).data('url');
            const id = $(this).data('id');
            const nama = $(this).data('nama');

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Unit " + nama + " akan dihapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        method: 'POST',
                        url: url + 'unit/delete',
                        data: {
                            id: id,
                            nama: nama
                        },
                        dataType: 'json',
                        success: function(data) {

                            if (data.type == "success") {

                                Toast.fire({
                                    icon: data.type,
                                    title: data.text
                                })
                                table.ajax.reload();
                            } else {

                                Swal.fire({
                                    icon: data.type,
                                    title: 'Oops...',
                                    text: data.text,
                                    footer: '<a href="' + url + 'service">hapus atau ubah data riwayat service</a>'
                                })
                                table.ajax.reload();

                            }

                        }
                    })

                }
            })

        });

        $('#tableUnit').on('click', '.btn-update', function() {

            document.location.href = $(this).data('url');

        })
    });
</script>