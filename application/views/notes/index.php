<!-- Begin Page Content -->
<div class="container-fluid mb-5" style="min-height: 75vh;">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between">
        <a class="btn shadow btn-primary text-truncate mr-1" href="<?= base_url('notes/tambah') ?>">
            <i class="fas fa-plus-square mr-1"></i>
            Tambah Catatan
        </a>
        <a class="btn shadow btn-warning text-truncate ml-1"  href="<?= base_url('notes/cetak') ?>" target="_blank">
            <i class="fas fa-print mr-1"></i>
            Cetak Catatan
        </a>
    </div>

    <div class="row mt-4">
        <div class="col">
            <div class="card shadow table-responsive p-3">
                <table class="table table-hover" id="tableNotes">
                    <thead class="thead-light">
                        <tr class="text-truncate">
                            <th scope="col">#</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Catatan</th>
                            <th scope="col">Tanggal Dibuat</th>
                            <th scope="col">Terakhir Diupdate</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-truncate">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>