<!-- Begin Page Content -->
<div class="container-fluid" style="min-height: 75vh;">

    <div class="row justify-content-center my-4">
        <div class="col-lg-8 card p-4 p-lg-5">
            <!-- Page Heading -->
            <div class="text-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Ganti Password</h1>
            </div>
            <form action="<?= base_url('users/gantipass/' . $user['id_user']) ?>" method="post">
                <p class="text-dark mb-1">Username : <?= $user['nama_user'] ?></p>
                <div class="row">
                    <div class="col-6">
                        <label for="password1">Password baru :</label>
                        <input type="password" class="form-control" name="password1" id="password1">
                        <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="col-6">
                        <label for="password2">Ulangi password :</label>
                        <input type="password" class="form-control" name="password2" id="password2">
                        <?= form_error('password2', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="passwordLama">Password lama :</label>
                    <input type="password" class="form-control" name="passwordLama" id="passwordLama">
                    <?= form_error('passwordLama', '<small class="text-danger">', '</small>') ?>
                    <small class="text-danger">
                        <?= $this->session->flashdata('validasi_gantiPass') ?>
                    </small>
                </div>
                <div class="form-group mt-4 d-flex">
                    <a href="<?= base_url('users') ?>" class="btn btn-danger mr-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Ganti</button>
                </div>
            </form>
        </div>
    </div>

</div>