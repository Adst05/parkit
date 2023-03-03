<?php
include_once("../class/Peminjaman.php");
include_once("../class/User.php");
session_start();

$user = new User;
$data_user = $user->find($_SESSION["id"]);


$peminjaman = new Peminjaman;
$data_peminjaman = $peminjaman->findPinjam($_SESSION["id"]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include_once("../sidebar.php"); ?>
    <table border="1">
        <tr>
            <th>No. </th>
            <th>Judul </th>
            <th>Tanggal Peminjaman </th>
            <th>Kondisi saat di Pinjam</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($data_peminjaman as $key => $d) { ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $d["judul"] ?></td>
                <td><?= $d["tgl_dipinjam"] ?></td>
                <td><?= $d["kd_dipinjam"] ?></td>
                <td><a href="form_pengembalian.php?id_buku=<?= $d["id_buku"] ?>&id_peminjaman=<?= $d["id"] ?>">Kembalikan</a></td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>