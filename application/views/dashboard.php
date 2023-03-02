<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Riwayat Service</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah['service'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-wrench fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Jumlah Penempatan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah['penempatan'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-wrench fa-2x text-gray-300"><sup class="ml-1">2</sup></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Unit</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah['unit'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Notes</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah['notes'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4" style="max-height: 410px;">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Last activity</h6>
                </div>
                <div class="card-body  overflow-auto">
                    <ul class="list-group list-group-flush">
                        <?php foreach ($log as $l) : ?>
                            <li class="list-group-item"><?= $l['keterangan'] . ", pada <span class='text-truncate'>" . $l['created_at'] . "</span>" ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Jumlah Semua Data</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="Chart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2 text-truncate">
                            <i class="fas fa-circle text-primary"></i> Service
                        </span>
                        <span class="mr-2 text-truncate">
                            <i class="fas fa-circle text-danger"></i> Penempatan
                        </span>
                        <span class="mr-2 text-truncate">
                            <i class="fas fa-circle text-success"></i> Unit
                        </span>
                        <span class="mr-2 text-truncate">
                            <i class="fas fa-circle text-warning"></i> Notes
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<div id="dataChart" data-service="<?= $jumlah['service'] ?>" data-penempatan="<?= $jumlah['penempatan'] ?>" data-unit="<?= $jumlah['unit'] ?>" data-notes="<?= $jumlah['notes'] ?>"></div>