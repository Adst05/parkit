<?php
include_once('../class/User.php');
include_once('../class/Buku.php');
include_once('../class/Peminjaman.php');
include_once('../class/Stok.php');
session_start();

$user = new User;
$data_user = $user->find($_SESSION["id"]);


// $pemberitahuan = new Pemberitahuan;

$buku = new Buku;
$data_buku = $buku->find($_GET["id_buku"]);

$stok = new Stok;

$peminjaman = new Peminjaman;

if (isset($_POST["submit"])) {
    $data = [
        "tgl_kembali" => $_POST["tgl_kembali"],
        "kd_kembali" => $_POST["kd_kembali"],
    ];

    if ($_POST["kd_kembali"] == "rusak") {
        $stok->addBad();
        $denda = $peminjaman->dendaRusak();
    } elseif ($_POST["kd_kembali"] == "hilang") {
        $denda = $peminjaman->dendaHilang();
    } elseif ($_POST["kd_kembali"] == "baik") {
        $stok->addGood();
    }

    $peminjaman->Kembalikan($data);
    header("Location: peminjaman.php");
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
    <div class="form">
        <form action="" method="post">
            <div>
                <label for="">Nama Anggota</label>
                <input type="text" disabled value="<?= $data_user['fullname'] ?>">
                <input type="hidden" name="id_user" value="<?= $data_user["id"] ?>">
            </div>
            <div>
                <label for="">Judul buku</label>
                <input type="text" name="" value="<?= $data_buku["judul"] ?>">
            </div>

            <div>
                <label>Tanggal Pengembalian</label>
                <input type="date" name="tgl_kembali" value="<?= date("Y-m-d") ?>">
            </div>

            <div>
                <label>Kondisi buku saat dipinjam</label>
                <select name="kd_kembali">
                    <option disabled selected>Pilih Opsi</option>
                    <option value="baik">Baik</option>
                    <option value="rusak">Rusak</option>
                    <option value="hilang">Hilang</option>
                </select>
            </div>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>

