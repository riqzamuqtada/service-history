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
                <th scope="col">Username</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Tanggal Dibuat</th>
                <th scope="col">Tanggal Diupdate</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($users as $u) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $u['nama_user'] ?></td>
                    <td><?= $u['nama_lengkap'] ?></td>
                    <td><?= date('d-m-Y H:i:s', strtotime($u['created_at'])) ?></td>
                    <td><?= date('d-m-Y H:i:s', strtotime($u['update_at'])) ?></td>
                    <!-- <td><?= $u['keterangan'] ?></td> -->
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>