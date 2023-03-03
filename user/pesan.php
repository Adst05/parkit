<?php
include_once('../class/User.php');
include_once('../class/Pesan.php');
session_start();

$pesan = new Pesan;
$data_pesan = $pesan->findByUserId($_SESSION["id"]);    


$user = new User;
$data_user = $user->find($_SESSION["id"]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan</title>
</head>

<body>
    <?php include("../sidebar.php"); ?>

    <div class="table">
        <h3>Pesan Masuk</h3>

        <table border="1">
            <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Status</th>
                <th>Aksi</th>
                
            </tr>

            <?php
            foreach ($data_pesan as $key => $d) {
            ?>

                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $d["judul_pesan"] ?></td>
                    <td><?= $d["stutus"] ?></td>
                    
                    <td>
                        <a href="baca.php?id=<?= $d["id"] ?>">Lihat</a>
                    </td>

                </tr>

            <?php } ?>
        </table>
    </div>
</body>

</html>