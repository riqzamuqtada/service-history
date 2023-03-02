<!-- Begin Page Content -->
<div class="container-fluid" style="min-height: 75vh;">

    <div class="row justify-content-center my-4">
        <div class="col-lg-8 card shadow p-4 p-lg-5">
            <!-- Page Heading -->
            <div class="text-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tambah User</h1>
            </div>
            <form action="<?= base_url('users/tambah') ?>" method="post">
                <div class="form-group">
                    <label for="username">Username :</label>
                    <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username') ?>" autocomplete="off">
                    <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap :</label>
                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="<?= set_value('nama_lengkap') ?>" autocomplete="off">
                    <?= form_error('nama_lengkap', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="password1" class="text-truncate">Password :</label>
                        <input type="password" class="form-control" name="password1" id="password1">
                    <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="col-6">
                        <label for="password2" class="text-truncate">Ulangi password :</label>
                        <input type="password" class="form-control" name="password2" id="password2">
                    <?= form_error('password2', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group mt-4 d-flex">
                    <a href="<?= base_url('users') ?>" class="btn btn-danger mr-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>

</div>