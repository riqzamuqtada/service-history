<!-- Begin Page Content -->
<div class="container-fluid mb-5" style="min-height: 75vh;">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between">
        <a class="btn btn-primary text-truncate mr-1" href="<?= base_url('users/tambah') ?>">
            <i class="fas fa-plus-square mr-1"></i>
            Tambah User
        </a>
        <a class="btn btn-warning text-truncate ml-1"  href="<?= base_url('users/cetak') ?>" target="_blank">
            <i class="fas fa-print mr-1"></i>
            Cetak User
        </a>
    </div>

    <div class="row mt-4">
        <div class="col">
            <div class="table-responsive card p-3">
                <table class="table table-hover" id="tableUser">
                    <thead class="thead-light">
                        <tr class="text-truncate">
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Nama Lengkap</th>
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