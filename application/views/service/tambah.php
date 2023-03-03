<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row justify-content-center my-4">
        <div class="col-lg-8 card shadow px-4 px-lg-5 py-4">
            <!-- Page Heading -->
            <div class="text-center mb-4">
                <h1 class="h3 text-gray-800">Tambah Riwayat</h1>
            </div>
            <form action="<?= base_url('service/tambahAksi') ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="unit" class="text-truncate">Pilih Unit :</label>
                            <select class="custom-select" id="unit" name="unit">
                                <option value="" selected>Pilih...</option>
                                <?php foreach ($unit as $u) : ?>
                                    <?php if (set_value('unit') == $u['id_unit']) : ?>
                                        <option value="<?= $u['id_unit'] ?>" selected><?= $u['nama_unit'] ?></option>
                                    <?php else : ?>
                                        <option value="<?= $u['id_unit'] ?>"><?= $u['nama_unit'] ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('unit', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="status" class="text-truncate">Status :</label>
                            <select class="custom-select" id="status" name="status">
                                <option value="2">Proses</option>
                                <option value="1">Selesai</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tanggal" class="text-truncate">Tanggal Service :</label>
                    <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= set_value('tanggal') ?>" autocomplete="off">
                    <?= form_error('tanggal', '<small class="text-danger">', '</small>') ?>
                    <small class="text-danger">
                        <?= $this->session->flashdata('validasi_tgl') ?>
                    </small>
                </div>
                <div class="form-group">
                    <label for="barang_service">Barang yang di service :</label>
                    <input type="text" class="form-control" name="barang_service" id="barang_service" value="<?= set_value('barang_service') ?>" autocomplete="off">
                    <?= form_error('barang_service', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan :</label>
                    <textarea class="form-control" id="keterangan" rows="3" name="keterangan"><?= set_value('keterangan') ?></textarea>
                    <?= form_error('keterangan', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="">Foto :</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto">
                                <label class="custom-file-label" for="foto">Pilih foto</label>
                            </div>
                            <?= form_error('foto', '<small class="text-danger">', '</small>') ?>
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
                <div class="form-gruop">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="tempat_perbaikan" name="tempat_perbaikan" value="Y">
                        <label class="custom-control-label" for="tempat_perbaikan">Perbaiki ditempat</label>
                    </div>
                </div>
                <div class="form-gruop">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="status_barang" name="status_barang" value="Y">
                        <label class="custom-control-label" for="status_barang">Apakah ada yang diganti?</label>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <textarea class="form-control" id="keterangan2" rows="3" name="keterangan2" data-value="<?= set_value('keterangan2') ?>" hidden><?= set_value('keterangan2') ?></textarea>
                </div>
                <div class="form-group mt-4 d-flex">
                    <a href="<?= base_url('service') ?>" class="btn btn-danger mr-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>

</div>