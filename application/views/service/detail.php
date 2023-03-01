<!-- Begin Page Content -->
<div class="container-fluid mb-5">

    <div class="mb-3 d-flex justify-content-between" style="font-size: 22px;">
        <a href="<?= base_url('service') ?>">
            <i class="fas fa-md fa-arrow-left"></i>
        </a>
        <a class="btn btn-warning text-truncate text-light mx-2" href="<?= base_url('service/tambah') ?>">
            <i class="fas fa-print mr-1"></i>
            Cetak Detail
        </a>
    </div>

    <div class="row mb-4">
        <div class="col-lg-10 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h4 class="card-title mb-3">Detail Service :</h4>
                            <table class="text-justify">
                                <tr>
                                    <td>Tanggal</td>
                                    <td width="10px" class="text-center">:</td>
                                    <td><?= date('d-m-Y', strtotime($detail['tanggal'])) ?></td>
                                </tr>
                                <tr>
                                    <td>Lokasi</td>
                                    <td class="text-center">:</td>
                                    <td><?= $detail['nama_unit'] ?></td>
                                </tr>
                                <tr>
                                    <td>Barang</td>
                                    <td class="text-center">:</td>
                                    <td><?= $detail['nama_barang_service'] ?></td>
                                </tr>
                                <tr class="align-top">
                                    <td class="text-truncate">Tempat Perbaikan</td>
                                    <td class="text-center">:</td>
                                    <td><?= $tempat_perbaikan ?></td>
                                </tr>
                                <tr class="align-top">
                                    <td class="text-truncate">Status Perbaikan</td>
                                    <td class="text-center">:</td>
                                    <td><?= $status_perbaikan ?></td>
                                </tr>
                                <tr class="align-top">
                                    <td>Keterangan</td>
                                    <td class="text-center">:</td>
                                    <td>
                                        <?= $detail['keterangan'] ?>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <h4 class="card-title">Detail Lanjutan :</h4>
                            <table class="mb-2">
                                <tr class="align-top">
                                    <td>Ada yang diganti?</td>
                                    <td width="10px" class="text-center">:</td>
                                    <td><?= $status_barang ?></td>
                                </tr>
                                <tr class="align-top text-justify">
                                    <td>Keterangan</td>
                                    <td class="text-center">:</td>
                                    <td><?= $ketStatus ?></td>
                                </tr>
                                <tr>
                                    <td>Foto&ensp;:</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <img src="<?= base_url('assets/img/') . $detail['foto'] ?>" class="card-img">
                            <hr>
                            <p class="card-text"><small class="text-muted">Terakhir diupdate pada <?= date('d-m-Y H:i:s', strtotime($detail['update_at'])) ?></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <h3 class="text-center mt-5 mb-2">Log Activity</h3>

    <div class="row">
        <div class="col-lg-10 mx-auto card">
            <ul class="list-group list-group-flush">
                <?php foreach($logService as $l) : ?>
                    <li class="list-group-item"><?= $l['keterangan'] . ', pada ' . date('d-m-Y H:i:s', strtotime($l['created_at'])) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>

</div>