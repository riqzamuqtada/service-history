<!-- Begin Page Content -->
<div class="container-fluid" style="min-height: 75vh;">

    <div class="row justify-content-center mt-5">
        <div class="col-lg-8 card p-5">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center text-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Update Unit</h1>
            </div>
            <form action="<?= base_url('unit/update/'.$unit['id_unit']) ?>" method="post">
                <div class="form-group">
                    <label for="code_unit">Kode Unit :</label>
                    <input type="text" class="form-control" name="code_unit" id="code_unit" value="<?= $value['code'] ?>" autocomplete="off">
                    <?= form_error('code_unit', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="nama_unit">Nama Unit :</label>
                    <input type="text" class="form-control" name="nama_unit" id="nama_unit" value="<?= $value['nama'] ?>" autocomplete="off">
                    <?= form_error('nama_unit', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group mt-4 d-flex">
                    <a href="<?= base_url('unit') ?>" class="btn btn-danger mr-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

</div>