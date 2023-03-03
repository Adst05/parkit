<?php 
include_once("Database.php");

class Pesan extends Database{
    public function all(){
        $sql = "SELECT pesan.id_penerima, user.fullname , pesan.judul_pesan, pesan.isi_pesan, pesan.stutus, pesan.tgl_terkirim from user, pesan where pesan.id_penerima = user.id";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT * FROM pesan WHERE id = '$id'";

        return $this->db->query($sql)->fetch_assoc();
    }

    public function findByUserId($id){
        $sql = "SELECT * FROM pesan WHERE id_penerima = '$id'";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function create($data){
        $now = date("Y-m-d H:i:s");
        $stutus = "terkirim";
        $id_penerima = $data["id_penerima"];
        $id_pengirim = $data["id_pengirim"];
        $judul_pesan= $data["judul_pesan"];
        $isi_pesan = $data["isi_pesan"];
        
        $sql = "INSERT INTO pesan (id_penerima, id_pengirim, judul_pesan, isi_pesan, stutus) VALUES ('$id_penerima', '$id_pengirim', '$stutus', '$now', '$judul_pesan', '$isi_pesan') ";

        if ($this->db->query($sql) == TRUE){
            echo "berhasil";
        } else {
            echo "Gagal";
        }
    }

    public function update($id, $data){
        $kode = $data["kode"];
        $nama = $data["nama"];

        $sql = "UPDATE pesan SET kode='$kode', nama='$nama' WHERE id='$id'";

        
        if ($this->db->query($sql) == TRUE){
            echo "berhasil";
        } else {
            echo "Gagal";
        }
    }

    public function delete($id){
        $sql= "DELETE FROM pesan WHERE id='$id'";

        if ($this->db->query($sql) == TRUE){
            echo "berhasil";
        } else {
            echo "Gagal";
        }
    }

    public function read($id){
        $sql = "UPDATE pesan SET stutus='dibaca' WHERE id='$id'";

        if ($this->db->query($sql) == TRUE){
            echo "berhasil";
        } else {
            echo "Gagal";
        }
    }
}
?>

