<!-- Begin Page Content -->
<div class="container-fluid mb-5" style="min-height: 75vh;">
    <form action="<?= base_url('penempatan/cetak') ?>" target="_blank" method="post">
    <div class="d-flex align-items-center justify-content-between">
        <a class="btn shadow btn-primary text-truncate mx-2" href="<?= base_url('penempatan/tambah') ?>">
            <i class="fas fa-plus-square mr-1"></i>
            Tambah Penempatan
        </a>
        <button type="submit" class="btn shadow btn-warning text-truncate text-light mx-2" id="cetak">
            <i class="fas fa-print mr-1"></i>
            Cetak Penempatan
        </button>
    </div>

    <!-- Filter -->
    <div class="row mt-4">
        <div class="col">
            <div class="card shadow">
                <div class="row p-3">
                    <div class="col-lg-4">
                        <div class="form-group text-truncate">
                            <label for="tgl-awal">Tanggal Awal :</label>
                            <input type="date" class="form-control" id="tgl-awal" name="awal">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group text-truncate">
                            <label for="tgl-akhir">Tanggal Akhir :</label>
                            <input type="date" class="form-control" id="tgl-akhir" name="akhir">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group text-truncate">
                            <label for="filter_unit">Filter Unit :</label>
                            <select class="form-control" id="filter_unit" name="id_unit">
                                <option value="">Pilih Unit</option>
                                <?php foreach ($unit as $u) : ?>
                                    <option value="<?= $u['id_unit'] ?>"><?= $u['nama_unit'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
    </form> 
                <div class="card shadow mt-2 table-responsive p-3">
                    <table class="table table-hover" id="tablePenempatan">
                        <thead class="thead-light">
                            <tr class="text-truncate">
                                <th scope="col">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Unit</th>
                                <th scope="col">Barang</th>
                                <th scope="col">Keterangan</th>
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