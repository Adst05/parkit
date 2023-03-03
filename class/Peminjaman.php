<?php
include_once("Database.php");

class Peminjaman extends Database
{

    public function allPinjam()
    {
        $sql = "SELECT user.fullname as nama, buku.judul as judul, peminjaman.tgl_dipinjam, peminjaman.tgl_kembali, peminjaman.kd_dipinjam, peminjaman.kd_kembali, peminjaman.denda FROM peminjaman, user, buku WHERE peminjaman.id_buku = buku.id, AND peminjaman.id_user = user.id";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function all()
    {
        $sql = "SELECT user.fullname as nama, buku.judul as judul, peminjaman.tgl_pinjam, peminjaman.tgl_kembali, peminjaman.kd_dipinjam, peminjaman.kd_kembali, peminjaman.denda FROM peminjaman, user, buku WHERE peminjaman.id_buku = buku.id AND peminjaman.id_user = user.id AND tgl_kembali IS NULL";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id)
    {
        $sql = "SELECT peminjam.id as id_peminjaman, buku.id as id_buku, buku.judul as judul, peminjaman.tgl_pinjam, peminjaman.tgl_kembali, peminjaman.kd_dipinjam, peminjaman.kd_kembali, peminjaman.denda FROM peminjaman, buku WHERE peminjaman.id_buku = buku.id AND peminjaman.id_user=$id AND tgl_kembali IS NULL";

        return $this->db->query($sql)->fetch_assoc();
    }

    public function findKembali($id)
    {
        $sql = "SELECT buku.judul as judul, peminjaman.tgl_dipinjam, peminjaman.tgl_kembali, peminjaman.kd_kembali,  peminjaman.kd_dipinjam, peminjaman.denda FROM buku, peminjaman WHERE peminjaman.id_buku = buku.id and peminjaman.id_user = $id and tgl_kembali is not null";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }
    public function findPinjam($id)
    {
        $sql = "SELECT peminjaman.id as id, buku.id as id_buku , buku.judul as judul, peminjaman.tgl_dipinjam, peminjaman.kd_dipinjam FROM buku, peminjaman WHERE peminjaman.id_buku = buku.id and peminjaman.id_user = $id and tgl_kembali is null";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getPeminjaman()
    {
        $sql = "SELECT * FROM peminjaman WHERE tgl_kembali IS NULL";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getPengembalian()
    {
        $sql = "SELECT * FROM peminjaman WHERE tgl_kembali is not null";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function create($data)
    {
        $id_user = $data["id_user"];
        $id_buku = $data["id_buku"];
        $tgl_dipinjam = $data["tgl_dipinjam"];
        $kd_dipinjam = $data["kd_dipinjam"];

        $sql = "INSERT INTO peminjaman(id_user, id_buku, tgl_dipinjam, kd_dipinjam) VALUES ('$id_user','$id_buku','$tgl_dipinjam','$kd_dipinjam')";

        if ($this->db->query($sql) === TRUE) {
            echo "berhasil";
        } else {
            echo "Gagal";
        }
    }

    public function Kembalikan($data)
    {
        $tgl_kembali = date("Y-m-d");
        $kd_kembali = $data["kd_kembali"];

        $sql = "UPDATE peminjaman SET tgl_kembali = '$tgl_kembali', kd_kembali = '$kd_kembali' WHERE id='$_GET[id_peminjaman]'";

        if ($this->db->query($sql) === TRUE) {
            echo "berhasil";
        } else {
            echo "Gagal";
        }
    }

    public function update($id, $data)
    {
        $id_user = $data["id_user"];
        $id_buku = $data["id_buku"];
        $tgl_pinjam = $data["tgl_pinjam"];
        $kd_dipinjam = $data["kd_dipinjam"];

        $sql = "UPDATE peminjaman SET id_user = '$id_user', id_buku = '$id_buku'. tgl_pinjam = '$tgl_pinjam', kd_dipinjam = '$kd_dipinjam' WHERE id= '$id'";

        if ($this->db->query($sql) === TRUE) {
            echo "berhasil";
        } else {
            echo "Gagal";
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM peminjaman WHERE id = '$id'";

        if ($this->db->query($sql) === TRUE) {
            echo "berhasil";
        } else {
            echo "Gagal";
        }
    }

    public function dendaRusak()
    {
        $nominal = "20000";

        $sql = "UPDATE peminjaman SET denda = '$nominal' WHERE id = '$_GET[id_peminjaman]'";

        if ($this->db->query($sql) === TRUE) {
            return "berhasil";
        }
        return "Gagal";
    }

    public function dendaHilang(){
        $nominal = "50000";

        $sql = "UPDATE peminjaman SET denda = '$nominal' WHERE id = '$_GET[id_peminjaman]'";

        if ($this->db->query($sql) === TRUE) {
            return "berhasil";
        }
        return "Gagal";
    }
}


