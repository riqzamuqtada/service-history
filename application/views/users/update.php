<!-- Begin Page Content -->
<div class="container-fluid" style="min-height: 75vh;">

    <div class="row justify-content-center my-4">
        <div class="col-lg-8 card shadow p-4 p-lg-5">
            <!-- Page Heading -->
            <div class="text-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Update User</h1>
            </div>
            <form action="<?= base_url('users/update/' . $user['id_user']) ?>" method="post">
                <div class="form-group">
                    <label for="username">Username :</label>
                    <input type="text" class="form-control" name="username" id="username" value="<?= $value['username'] ?>" autocomplete="off">
                    <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group mb-3">
                    <label for="nama_lengkap">Nama Lengkap :</label>
                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="<?= $value['nama_lengkap'] ?>" autocomplete="off">
                    <?= form_error('nama_lengkap', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group mt-4 d-flex">
                    <a href="<?= base_url('users') ?>" class="btn btn-danger mr-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

</div>