<?php
include_once '../../core/Koneksi.php';

class Report extends Koneksi
{
    public function __construct()
    {
        parent::__construct();
    }

    // public function searchRekomendasiMahasiswa($searchQuery)
    // {
    //     $sql = "SELECT
    //                 mahasiswa.nama,
    //                 mahasiswa.nim,
    //                 kelas.nama AS nama_kelas
    //             FROM
    //                 mahasiswa
    //             JOIN
    //                 kelas ON kelas.id_kelas = mahasiswa.id_kelas
    //             WHERE
    //                 mahasiswa.nama LIKE CONCAT('%', ?, '%')
    //                 OR mahasiswa.nim LIKE CONCAT('%', ?, '%')";
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->bind_param("ss", $searchQuery, $searchQuery);
    //     $stmt->execute();
    //     $result = $stmt->get_result();
    //     return $result->fetch_all(MYSQLI_ASSOC);
    // }

    public function getPelanggaran()
    {
        $sql = "SELECT * FROM pelanggaran";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function searchByIdMhs($id){
        $sql = "SELECT * FROM mahasiswa WHERE nim = $id";
        $result = $this -> db -> query($sql);
        return $result;
    }


}