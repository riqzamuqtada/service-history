<!-- Begin Page Content -->
<div class="container-fluid mb-5" style="min-height: 75vh;">

    <div class="mb-3 d-flex justify-content-between" style="font-size: 22px;">
        <a href="<?= base_url('notes') ?>">
            <i class="fas fa-lg fa-arrow-left"></i>
        </a>
        <a class="btn shadow btn-warning text-truncate text-light mx-2"  href="<?= base_url('notes/cetak/' . $detail['id_notes']) ?>">
            <i class="fas fa-print mr-1"></i>
            Cetak Catatan
        </a>
    </div>

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title text-center"><?= $detail['judul'] ?></h3>
                    <hr>
                    <p class="text-justify mb-4"><?= $detail['catatan'] ?></p>
                    <?php if (!empty($detail['foto_pendukung'])) : ?>
                        <img src="<?= base_url('assets/img/' . $detail['foto_pendukung']) ?>" alt="no photo" class="card-img">
                    <?php endif ?>
                    <hr>
                    <p class="card-text"><small class="text-muted">Terakhir diupdate pada <?= date('d-m-Y H:i:s', strtotime($detail['update_at'])) ?></small></p>
                </div>
            </div>
        </div>
    </div>

</div>