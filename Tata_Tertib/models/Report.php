<?php
include_once 'core/koneksi.php';

class Report extends Koneksi
{
    public function __construct()
    {
        parent::__construct();
    }

    // public function searchingName($nama, $kelas, $prodi, $option){
    //     if ($option == 'Mahasiswa'){
    //         $sql = "SELECT * FROM Mahasiswa WHERE nama = $nama, kelas = $kelas, prodi = $prodi";
    //         $result = $this -> db -> query($sql);
    //         return $result;
    //     } else if ($nama == 'nim'){
    //         $sql = "SELECT * FROM Mahasiswa WHERE nim = $nama, kelas = $kelas, prodi = $prodi";
    //         $result = $this -> db -> query($sql);
    //         return $result;
    //     }if($option == 'Dosen'){
    //         $sql = "SELECT * FROM Dosen WHERE nama = $nama";
    //         $result = $this -> db -> query($sql);
    //         return $result;
    //     }else if ($nama == 'nip'){
    //         $sql = "SELECT * FROM Dosen WHERE nip = $nama";
    //         $result = $this -> db -> query($sql);
    //         return $result;
    //     } if ($option == 'karyawan'){
    //         $sql = "SELECT * FROM Karaywan WHERE nama = $nama";
    //         $result = $this -> db -> query($sql);
    //         return $result;
    //     } else if ($nama == 'nip'){
    //         $sql = "SELECT * FROM Karyawan WHERE nip = $nama";
    //         $result = $this -> db -> query($sql);
    //         return  $result;
    //     }
    // }

    public function searchingName($query)
    {
        $sql = "SELECT nama FROM mahasiswa WHERE nama LIKE :query LIMIT 10"; // Ambil 10 nama untuk efisiensi
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['query' => '%' . $query . '%']);

        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
        return $result;
    }

    public function searchNim($query) {
        $sql = "SELECT mahasiswa.*, kelas.nama AS nama_kelas
        FROM mahasiswa
        JOIN kelas ON mahasiswa.id_kelas = kelas.id_kelas
        WHERE mahasiswa.nim = ?
        ";
        $stmt = $this->db->prepare($sql);
    
        if ($stmt === false) {
            throw new Exception("Statement prepare failed: " . $this->db->error);
        }
    
        $stmt->bind_param("s", $query); // "s" adalah tipe data string, sesuaikan jika tipe datanya berbeda
        $stmt->execute();
    
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}