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
$data_buku = $buku->all();

$stok = new Stok;

if (isset($_POST["submit"])) {
    $data = [
        "id_user" => $_POST["id_user"],
        "id_buku" => $_POST["id_buku"],
        "tgl_dipinjam" => $_POST["tgl_dipinjam"],
        "kd_dipinjam" => $_POST["kd_dipinjam"],
    ];

    if($_POST["kd_dipinjam"] == "baik"){
        $reduce =$stok->reduceGood();
    } elseif($_POST["kd_dipinjam"] == "rusak"){
        $reduce =$stok->reduceBad();
    }

    // $notif = $pemberitahuan->notifBuku([
    //     "id_buku" => $_POST["id_buku"],
    //     "id_user" => $_POST["id_user"]
    // ]);

    $peminjaman = new Peminjaman;
    $peminjaman->create($data);
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
                <label for="">Judul Buku</label>
                <select name="id_buku">
                    <option disabled selected>Pilih Opsi</option>
                    <?php foreach ($data_buku as $d) { ?>
                        <option value="<?= $d["id"] ?>" <?php
                                                        if (isset($_GET["id_buku"])) {
                                                            if ($_GET["id_buku"] == $d["id"]) {
                                                                echo "selected";
                                                            } else {
                                                                echo "";
                                                            }
                                                        } else {
                                                            echo "";
                                                        } ?>> <?= $d["judul"] ?> | <?= $d["pengarang"] ?></option>

                    <?php } ?>
                </select>
            </div>

            <div>
                <label>Tanggal Peminjaman</label>
                <input type="date" name="tgl_dipinjam" value="<?= date("Y-m-d") ?>">
            </div>

            <div>
                <label>Kondisi buku saat dipinjam</label>
                <select name="kd_dipinjam">
                    <option disabled selected>Pilih Opsi</option>
                    <option value="baik">Baik</option>
                    <option value="rusak">Rusak</option>
                </select>
            </div>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>