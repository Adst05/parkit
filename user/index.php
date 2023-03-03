<?php
include_once("../class/User.php");
include_once("../class/Peminjaman.php");
include_once("../class/Buku.php");
session_start();

$user = new User;
$data_user = $user->find($_SESSION["id"]);

$buku = new Buku;
$data_buku = $buku->all();

if (isset($_SESSION['id'])) {
    $data_user = $user->find($_SESSION['id']);
    if ($data_user['role'] == 'admin') {
        header("Location: https://localhost/usk/admin/index.php");
    }
}

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
<?php include("../sidebar.php"); ?>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Id Penerbit</th>
            <th>Pengarang</th>
            <th>Tahun Terbit</th>
            <th>ISBN</th>
            <th>Stok</th>
            <th>Aksi</th>

        </tr>
        <?php foreach ($data_buku as $key => $d){ ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $d["judul"]; ?></td>
                <td><?= $d["kategori"]; ?></td>
                <td><?= $d["penerbit"]; ?></td>
                <td><?= $d["pengarang"]; ?></td>
                <td><?= $d["thn_terbit"]; ?></td>
                <td><?= $d["isbn"]; ?></td>
                <td><?= $d["stok"]; ?></td>
                <td><a href="form_peminjaman.php?id_buku=<?= $d["id"]?>">pinjam</a></td>


            </tr>
        <?php } ?>
    </table>
</body>

</html>