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
        <h2>Laporan Data Unit</h1>
            <br>
            <br>
            <hr>
            <br>
    </div>
    <div>
        <table border="1"  cellpadding="4" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode Unit</th>
                    <th scope="col">Nama Unit</th>
                    <th scope="col">Tanggal Dibuat</th>
                    <th scope="col">Tanggal Diupdate</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($unit as $u) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $u['code_unit'] ?></td>
                        <td><?= $u['nama_unit'] ?></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($u['created_at'])) ?></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($u['update_at'])) ?></td>
                        <!-- <td><?= $u['keterangan'] ?></td> -->
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>