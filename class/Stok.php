<?php 
include_once("Database.php");
include_once("Buku.php");

class Stok extends Database{
    public function reduceGood(){
        $buku = new Buku;
        $data_buku = $buku->find($_GET["id_buku"]);
        $id = $data_buku["id"];

        $currenctStock = $data_buku["jmlh_baik"];
        $tambah = $currenctStock - 1;

        $sql = "UPDATE buku SET jmlh_baik='$tambah' WHERE id='$id'";

        if($this->db->query($sql) === TRUE){
            echo "berhasil";
        } else {
            echo "gagal";
        }
    }

    public function addGood(){
        $buku = new Buku;
        $data_buku = $buku->find($_GET["id_buku"]);
        $id = $_GET["id_buku"];

        $currenctStock = $data_buku["jmlh_baik"];
        $tambah = $currenctStock + 1;

        $sql = "UPDATE buku SET jmlh_baik='$tambah' WHERE id='$id'";

        if($this->db->query($sql) === TRUE){
            echo "berhasil";
        } else {
            echo "gagal";
        }
    }

    public function reduceBad(){
        $buku = new Buku;
        $data_buku = $buku->find($_GET["id_buku"]);
        $id = $data_buku["id"];
        $currenctStock = $data_buku["jmlh_rusak"];
        $tambah = $currenctStock - 1;
        
        $sql = "UPDATE buku SET jmlh_rusak='$tambah' WHERE id='$id'";

        if($this->db->query($sql) === TRUE){
            echo "berhasil";
        } else {
            echo "gagal";
        }
    }

    public function addBad(){
        $buku = new Buku;
        $data_buku = $buku->find($_GET["id_buku"]);
        $id = $_GET["id_buku"];

        $currenctStock = $data_buku["jmlh_rusak"];
        $tambah = $currenctStock + 1;

        $sql = "UPDATE buku SET jmlh_rusak='$tambah' WHERE id='$_GET[id_buku]'";

        if($this->db->query($sql) === TRUE){
            echo "berhasil";
        } else {
            echo "gagal";
        }
    }
}
