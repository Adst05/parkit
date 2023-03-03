<?php
include_once("../../../class/User.php");
include_once("../../../class/Buku.php");

$user = new User;
$data_user = $user->find(1);

$buku = new Buku;
$data_buku = $buku->all();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Data Buku</title>
</head>
<body>
<?php include("../../sidebar.php"); ?>

    <div class="tambah">
        <a href="tambah.php">Tambah Buku</a>
    </div>
    <div >
            <table border="1">
                <th>No</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Buku Baik</th>
                <th>Buku Rusak</th>
                <th>Jumlah Buku</th>
                <th>Aksi</th>
            </tr>

            <?php foreach($data_buku as $key => $b) {?> 
              <tr>
                <td><?= $key +1 ?></td>
                <td><?= $b["judul"] ?></td>
                <td><?= $b["pengarang"] ?></td>
                <td><?= $b["penerbit"] ?></td>
                <td><?= $b["jmlh_baik"] ?></td>
                <td><?= $b["jmlh_rusak"] ?></td>
                <td><?= $b["jumlah"] ?></td>
                <td>
                    <a href="edit.php?id=<?= $b["id"] ?>">Edit</a> |
                    <a href="hapus.php?id=<?= $b["id"] ?>">Hapus</a>
                </td>
            </tr>  
            <?php } ?>
        </table>
    </div>
</body>
</html>