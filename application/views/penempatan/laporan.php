<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        div {
            display: flex;
        }

        h2 {
            text-align: center;
        }

        thead {

            background-color: darkgray;
        }

        .text-truncate {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        table {
            text-align: justify;
            width: 100%;
            margin-bottom: 1rem;
            border-collapse: collapse;
        }

        tr {
            vertical-align: top;
        }
    </style>
</head>

<body>
    <div>
        <h2>Laporan Data Penempatan</h1>
            <br>
            <br>
            <hr>
            <br>
    </div>
    <div>
        <table border="1" cellpadding="4" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-truncate">#</th>
                    <th scope="col" class="text-truncate">Tanggal</th>
                    <th scope="col" class="text-truncate">Unit</th>
                    <th scope="col" class="text-truncate">Barang</th>
                    <th scope="col" class="text-truncate">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($penempatan as $s) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td  class="text-truncate"><?= date('d-m-Y', strtotime($s['tanggal'])) ?></td>
                        <td><?= $s['nama_unit'] ?></td>
                        <td><?= $s['barang'] ?></td>
                        <td><?= $s['keterangan'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>