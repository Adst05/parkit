<?php
include_once("../class/Pesan.php");
include_once("../class/User.php");
session_start();

$pesan = new Pesan;
$data_pesan = $pesan->all();

$user = new User;
$data_user = $user->find($_SESSION["id"]);
$data_anggota = $user->getUser();

//Memanggil DAtabase Yang Diperlukan Untuk Di Submit
if (isset($_POST["submit"])) {
    $data = [
        "id_penerima" => $_POST["id_penerima"],
        "id_pengirim" => $_POST["id_pengirim"],
        "judul_pesan" => $_POST["judul_pesan"],
        "isi_pesan" => $_POST["isi_pesan"],
    ];

    $pesan->create($data);
    header("location: pesan.php");
}
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
    <?php include("sidebar.php") ?>

    <div class="form">
        <form action="" method="post">
            <div>
                <label>Penerima</label>
                <select name="id_penerima">
                    <?php foreach ($data_anggota as $u) : ?>
                        <option value="<?= $u["id"] ?>"> <?= $u["fullname"] ?> | <?= $u["role"] ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div>
                <label>Pengirim</label>
                <input type="text" hidden name="id_pengirim" value="<?= $data_user["id"] ?>">
                <input type="text" readonly="<?= $data_user["fullname"] ?>">
            </div>

            <div>
                <label>Judul Pesan</label>
                <input type="text" name="judul_pesan">
            </div>

            <div>
                <label>Isi Pesan</label>
                <textarea type="text" name="isi_pesan"> </textarea>
            </div>

            <button type="submit" name="submit">Kirim Pesan</button>
        </form>
    </div>


    <div class="table">
        <h4>Data Pesan</h4>
        <table border="1">
                <tr>
                    <th>No</th>
                    <th>Id Penerima</th>
                    <th>Judul Pesan</th>
                    <th>Isi Pesan</th>
                    <th>Status</th>
                    <th>Tanggal Kirim</th>
                </tr>

            <?php foreach ($data_pesan as $key => $p) {
                ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $p["fullname"] ?></td>
                        <td><?= $p["judul_pesan"] ?></td>
                        <td><?= $p["isi_pesan"] ?></td>
                        <td><?= $p["stutus"] ?></td>
                        <td><?= $p["tgl_terkirim"] ?></td>
                    </tr>
                <?php  } ?>
        </table>
    </div>
</body>

</html>