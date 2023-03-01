<!-- Begin Page Content -->
<div class="container-fluid" style="min-height: 75vh;">

    <div class="row justify-content-center mt-5">
        <div class="col-lg-8 card p-5">
            <!-- Page Heading -->
            <div class="text-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tambah Unit</h1>
            </div>
            <form action="<?= base_url('unit/tambah') ?>" method="post">
                <div class="form-group">
                    <label for="code_unit">Kode Unit :</label>
                    <input type="text" class="form-control" name="code_unit" id="code_unit" value="<?= set_value('code_unit') ?>" autocomplete="off">
                    <?= form_error('code_unit', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="nama_unit">Nama Unit :</label>
                    <input type="text" class="form-control" name="nama_unit" id="nama_unit" value="<?= set_value('nama_unit') ?>" autocomplete="off">
                    <?= form_error('nama_unit', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group mt-4 d-flex">
                    <a href="<?= base_url('unit') ?>" class="btn btn-danger mr-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>

</div>