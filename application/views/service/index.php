<!-- Begin Page Content -->
<div class="container-fluid mb-5" style="min-height: 75vh;">
    <form action="<?= base_url('service/cetak') ?>" target="_blank" method="post">
    <div class="d-flex align-items-center justify-content-between">
        <a class="btn shadow btn-primary text-truncate mx-2" href="<?= base_url('service/tambah') ?>">
            <i class="fas fa-plus-square mr-1"></i>
            Tambah Service
        </a>
        <button type="submit" class="btn shadow btn-warning text-truncate text-light mx-2" id="cetak">
            <i class="fas fa-print mr-1"></i>
            Cetak Service
        </button>
    </div>

    <!-- Filter -->
    <div class="row mt-4">
        <div class="col">
            <div class="card shadow">
                <div class="row p-3">
                    <div class="col-md-3">
                        <div class="form-group text-truncate">
                            <label for="bulan">Filter Bulan :</label>
                            <select class="form-control" name="bulan" id="bulan">
                                <option value="">Pilih bulan</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group text-truncate">
                            <label for="tahun">Filter Tahun :</label>
                            <select class="form-control" name="tahun" id="tahun">
                                <option value="">Pilih tahun</option>
                                <?php $tahun = date('Y');
                                for ($i = 2022; $i < $tahun + 3; $i++) : ?>
                                    <option   option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
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

                    <div class="col-md-3">
                        <div class="form-group text-truncate">
                            <label for="filter_status">Filter Status :</label>
                            <select class="form-control" id="filter_status" name="status">
                                <option value="">Pilih Status</option>
                                <option value="0">Proses</option>
                                <option value="1">Selesai</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
    </form>
                <div class="card shadow mt-2 table-responsive p-3">
                    <table class="table table-hover" id="tableService">
                        <thead class="thead-light">
                            <tr class="text-truncate">
                                <th scope="col">#</th>
                                <th scope="col">Tanggal Service</th>
                                <th scope="col">Unit</th>
                                <th scope="col">Barang Service</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Status</th>
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