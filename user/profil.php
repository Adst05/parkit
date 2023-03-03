<?php 
include_once("../class/User.php");

$user = new User;
$data_user = $user->find(1);

if(isset($_POST["submit"])){
    $data = [
        "id" => $_POST["id"],
        "nis" => $_POST["nis"],
        "fullname" => $_POST["fullname"],
        "username" => $_POST["username"],
        "password" => $_POST["password"],
        "kelas" => $_POST["kelas"],
        "alamat" => $_POST["alamat"],
        "foto" => $_FILES["foto"],
    ];

    $user->updateFoto($_POST["id"], $data);

    header("Location:profil.php");
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
      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id"  value="<?=$data_user["id"]?>">
    </div>
    <div>
        <label>Foto</label>
        <input type="file" name="foto">
        <img style="width:200px;"src="<?=$data_user["foto"]?>">
    </div>

    <div>
        <label for="">Kode Anggota</label>
        <input type="text" name="kode" value="<?=$data_user["kode"]?>">
    </div>

    <div>
        <label for="">Nis</label>
        <input type="text" name="nis" value="<?=$data_user["nis"]?>">
    </div>
    <div>
        <label for="">Nama Lengkap</label>
        <input type="text" name="fullname" value="<?=$data_user["fullname"]?>">
    </div>
    <div>
        <label for="">Panggilan</label>
        <input type="text" name="username" value="<?=$data_user["username"]?>">
    </div>
    <div>
        <label for="">Password</label>
        <input type="text" name="password" value="<?=$data_user["password"]?>">
    </div>
    <div>
        <label for="">Kelas</label>
        <input type="text" name="kelas" value="<?=$data_user["kelas"]?>">
    </div>
    <div>
        <label for="">Alamat</label>
        <input type="text" name="alamat" value="<?=$data_user["alamat"]?>">
    </div>

    <button type="submit" name="submit">Submit</button>
</body>
</html>