<?php
include_once("../class/Peminjaman.php");
include_once("../class/User.php");
session_start();

$user = new User;
$data_user = $user->find($_SESSION["id"]);


$peminjaman = new Peminjaman;
$data_peminjaman = $peminjaman->findKembali($_SESSION["id"]);


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
            <th>Tanggal dipinjam </th>
            <th>Tanggal pengembalian </th>
            <th>Kondisi saat di pinjam</th>
            <th>Kondisi saat di kembalikan</th>
            <th>Denda </th>
        </tr>
        <?php foreach ($data_peminjaman as $key => $d) { ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $d["judul"] ?></td>
                <td><?= $d["tgl_dipinjam"] ?></td>
                <td><?= $d["tgl_kembali"] ?></td>
                <td><?= $d["kd_dipinjam"] ?></td>
                <td><?= $d["kd_kembali"] ?></td>
                <td><?= $d["denda"] ?></td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>