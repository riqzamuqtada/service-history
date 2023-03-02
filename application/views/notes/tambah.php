<!-- Begin Page Content -->
<div class="container-fluid" style="min-height: 75vh;">

    <div class="row justify-content-center my-4">
        <div class="col-lg-8 card shadow p-4 p-lg-5">
            <!-- Page Heading -->
            <div class="text-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tambah Catatan</h1>
            </div>
            <form action="<?= base_url('notes/tambah') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="judul">Judul :</label>
                    <input type="text" class="form-control" name="judul" id="judul" value="<?= $value['judul'] ?>" autocomplete="off">
                    <?= form_error('judul', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="catatan">Isi :</label>
                    <textarea class="form-control" id="catatan" rows="4" name="catatan"><?= $value['catatan'] ?></textarea>
                    <?= form_error('catatan', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="">Foto :</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto">
                                <label class="custom-file-label" for="foto">Pilih foto</label>
                            </div>
                            <small class="text-danger">
                                <?= $this->session->flashdata('validasi_foto') ?>
                            </small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="preview" class="position-absolute">Preview :</label>
                            <img src="" width="150px" id="preview" class="mt-4 rounded">
                        </div>
                    </div>
                </div>
                <div class="form-group mt-4">
                    <a href="<?= base_url('notes') ?>" class="btn btn-danger mr-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>

</div>