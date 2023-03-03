<?php 
include_once("Database.php");

class User extends Database{
    public function all(){
        $sql = "SELECT * FROM user";

        return  $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }
    public function find($id){
        $sql = "SELECT * FROM user WHERE id='$id'";

        return $this->db->query($sql)->fetch_assoc();
    }

    public function getUser(){
        $sql = "SELECT * FROM user WHERE role='user'";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }
    public function getAdmin(){
        $sql = "SELECT * FROM user WHERE role='admin'";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function create($id, $data){
        $kode = $data ["kode"];
        $nis = $data["nis"];
        $fullname = $data ["fullname"];
        $username = $data ["username"];
        $password = $data ["password"];
        $kelas = $data ["kelas"];
        $alamat = $data ["alamat"];
        $role = $data ["user"];
        $join_date = date("Y-m-d");

        $sql = "INSERT INTO user(kode, nis, fullname, username, password, kelas, alamat, role, join_date), VALUES ('$kode','$nis','$fullname','$username','$password','$kelas','$alamat','$role','$join_date')";

        if($this->db->query($sql) === TRUE){
            echo "Berhasil tambah data";
        }
        else{
            echo "Gagal tambah data";
        }
    }

    public function createAdmin($data){
        $kode = $data ["kode"];
        $fullname = $data ["fullname"];
        $username = $data ["username"];
        $password = $data ["password"];
        $role = $data ["user"];
        $join_date = date("Y-m-d");

        $sql= "INSERT INTO user(kode, fullname, username, password, role, join_date) VALUES ('$kode','$fullname','$username','$password','$role','$join_date',)";

        if($this->db->query($sql) === TRUE){
            echo "data berhasil di simpan";
        } else{
            echo "data gagal";
        }
    }

    public function update($id, $data){
        $nis = $data ["nis"];
        $fullname = $data ["fullname"];
        $username = $data ["username"];
        $kelas = $data ["kelas"];
        $alamat = $data ["alamat"];

        $sql = "UPDATE user SET nis='$nis', fullname='$fullname', username='$username', kelas='$kelas', alamat='$alamat'";

        if($this->db->query($sql) === TRUE){
            echo "berhasil update";
        }else{
            echo "gagal update";
        }
    }

    public function delete($id){
        $sql = "DELETE FROM user WHERE id='$id'";

        if($this->db->query($sql) === TRUE){
            echo "Dihapus";
        }else{
            echo "gagal";
        }
    }

    public function updateFoto($id, $data){
        $nis = $data ["nis"];
        $fullname = $data ["fullname"];
        $username = $data ["username"];
        $password = $data ["password"];
        $kelas = $data ["kelas"];
        $alamat = $data ["alamat"];
        $foto = $data ["foto"];

        if ($foto["error"] !== 4){
        $targetFile = "../assets/img" . date("YmdHis") . basename($foto["nama"]);
        move_uploaded_file($foto["tmp_name"], $targetFile);

        $sql = "UPDATE user SET nis='$nis', fullname='$fullname', username='$username',  password='$password', kelas='$kelas', alamat='$alamat', foto='$targetFile' WHERE id='$id'";
        } else {
        $sql = "UPDATE user SET nis='$nis', fullname='$fullname', username='$username',  password='$password', kelas='$kelas', alamat='$alamat' WHERE id='$id'";
        }

        if($this->db->query($sql) === TRUE){
            echo "Dihapus";
        }else{
            echo "gagal";
        }
    }

    public function updateUser($id, $data){
        $nis = $data ["nis"];
        $fullname = $data ["fullname"];
        $username = $data ["username"];
        $password = $data ["password"];
        $kelas = $data ["kelas"];
        $alamat = $data ["alamat"];
        $foto = $data ["foto"];

        if ($foto["error"] !== 4){
        $targetFile = "../assets/img" . date("YmdHis") . basename($foto["nama"]);
        move_uploaded_file($foto["tmp_name"], $targetFile);

        $sql = "UPDATE user SET nis='$nis', fullname='$fullname', username='$username',  password='$password', kelas='$kelas', alamat='$alamat', foto='$targetFile' WHERE id='$id'";
        } else {
        $sql = "UPDATE user SET nis='$nis', fullname='$fullname', username='$username',  password='$password', kelas='$kelas', alamat='$alamat' WHERE id='$id'";
        }

        if($this->db->query($sql) === TRUE){
            echo "Dihapus";
        }else{
            echo "gagal";
        }
    }


}
?>