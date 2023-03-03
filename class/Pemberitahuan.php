<?php 

class Pemberitahuan extends Database{
    public function all(){
        $sql  = "SELECT * FROM pemberitahuan";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);    
    }

    public function find($id){
        $sql = "SELECT * FROM pemberitahuan WHERE id='$id'";

        return $this->db->query($sql)->fetch_assoc();
    }

    public function create($data){
        $isi = $data["isi"];
        $level_user = $data["level_user"];
        $status = $data["status"];

        $sql = "INSERT INTO pemberitahuan(isi, level_user, status) VALUES ('$isi', '$level_user', '$status')";

        if ($this->db->query($sql) == TRUE){
            echo "berhasil";
        } else{
            echo "gagal";
        }
    }

    public function update($id, $data){
        $isi = $data["isi"];
        $status = $data["status"];

        $sql = "UPDATE pemberitahuan SET isi='$isi', status='$status' WHERE id='$id'";

        if ($this->db->query($sql) == TRUE){
            echo "berhasil";
        } else{
            echo "gagal";
        }
    }

    public function delete($id){
        $sql = "DELETE FROM pemberitahuan WHERE id='$id'";
    
        if ($this->db->query($sql) == TRUE){
            echo "berhasil";
        } else{
            echo "gagal";
        }
    }

    public function notifAktif(){
        $sql = "SELECT FROM pemberitahuan WHERE status='aktif'";
     
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);    
    }
}

?>