<?php
include_once("Database.php");

class Buku extends Database
{
    public function all()
    {
        $sql = "SELECT buku.thn_terbit, buku.isbn, kategori.nama as kategori, buku.id, buku.judul, buku.pengarang, penerbit.penerbit AS penerbit, buku.jmlh_baik + buku.jmlh_rusak AS stok FROM buku, penerbit, kategori  WHERE buku.id_penerbit = penerbit.id and buku.id_kategori = kategori.id";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM buku WHERE id='$id'";

        return $this->db->query($sql)->fetch_assoc();
    }

    public function create($data)
    {
        $judul = $data["judul"];
        $id_kategori = $data["id_kategori"];
        $id_penerbit = $data["id_penerbit"];
        $pengarang = $data["pengarang"];
        $thn_terbit = $data["thn_terbit"];
        $isbn = $data["isbn"];
        $jmlh_baik = $data["jmlh_baik"];
        $jmlh_rusak = $data["jmlh_rusak"];

        $sql = "INSERT INTO buku(judul, id_kategori, id_penerbit, pengarang, id_penerbit, pengarang, thn_penerbit, isbn, jmlh_baik, jmlh_rusak) VALUES ('$judul', '$id_kategori', '$id_penerbit', '$pengarang', '$id_penerbit', '$thn_terbit', '$isbn', '$jmlh_baik', '$jmlh_rusak')";


        if ($this->db->query($sql) === TRUE) {
            echo "Berhasil";
        } else {
            echo "Gagal";
        }
    }

    public function update($id, $data)
    {
        $judul = $data["judul"];
        $id_kategori = $data["id_kategori"];
        $id_penerbit = $data["id_penerbit"];
        $pengarang = $data["pengarang"];
        $thn_terbit = $data["thn_terbit"];
        $isbn = $data["isbn"];
        $jmlh_baik = $data["jmlh_baik"];
        $jmlh_rusak = $data["jmlh_rusak"];

        $sql = "UPDATE buku set judul='$judul', pengarang='$pengarang', id_kategori='$id_kategori' id_penerbit='$id_penerbit', thn_terbit='$thn_terbit', isbn='$isbn', jmlh_baik='$jmlh_baik', jmlh_rusak='$jmlh_rusak' where id='$id'";

        if ($this->db->query($sql) === TRUE) {
            echo "berhasil";
        } else {
            echo "gagal";
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM buku where id='$id'";

        if ($this->db->query($sql) === TRUE) {
            echo "berhasil";
        } else {
            echo "gagal";
        }
    }
}
