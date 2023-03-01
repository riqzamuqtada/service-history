<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
</head>

<body>
    <table border="1">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Tanggal Dibuat</th>
                <th scope="col">Tanggal Diupdate</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($notes as $n) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $n['judul'] ?></td>
                    <td><?= date('d-m-Y H:i:s', strtotime($n['created_at'])) ?></td>
                    <td><?= date('d-m-Y H:i:s', strtotime($n['update_at'])) ?></td>
                    <!-- <td><?= $u['keterangan'] ?></td> -->
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>