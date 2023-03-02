<div class="container-fluid mb-5">

    <div class="row">
        <div class="col-lg-10 mx-auto">
            <h3 class="my-3">Log Activity :</h3>

            <div class="card shadow mb-3 p-3">
                <h5 class="mb-3">Filter :</h5>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group text-truncate">
                            <label for="tgl-awal">Tanggal Awal :</label>
                            <input type="date" class="form-control" id="tgl-awal" name="awal">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group text-truncate">
                            <label for="tgl-akhir">Tanggal akhir :</label>
                            <input type="date" class="form-control" id="tgl-akhir" name="akhir">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow table-responsive py-3 px-4">
                <table class="table table-hover" id="main-list">
                    <thead style="max-height: 10px;" class="table-borderless">
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

</div>