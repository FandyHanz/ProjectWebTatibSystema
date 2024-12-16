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

    public function searchByIdMhs($id) {
        $sql = "SELECT 1 FROM mahasiswa WHERE nim = ? LIMIT 1"; // SELECT 1 untuk mengecek keberadaan data
        $stmt = $this->db->prepare($sql); // Gunakan prepared statement
        $stmt->bind_param("s", $id); // Bind parameter (nim kemungkinan string)
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0; // Kembalikan true jika data ditemukan
    }

    public function getSimpleDataMhs($nim){
        $sql = "SELECT nama, nim, foto_profile FROM mahasiswa WHERE nim = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function addPelanggaranMhs($pelanggaran, $deskripsi, $lampiran, $nim)
    {
        $statusPelanggaran = 4;
        $sql = "INSERT INTO pelanggaran_mahasiswa 
                (id_pelanggaran, deskripsi, lampiran, status_pelanggaran, bukti_selesai, tanggal_lapor, nim) 
                VALUES (?, ?, ?, ?, null, current_timestamp(), ?)";
    
        // Persiapkan query
        $stmt = $this->db->prepare($sql);
    
        // Bind parameter: "isssi" (i = integer, s = string)
        $stmt->bind_param("isssi", $pelanggaran, $deskripsi, $lampiran, $statusPelanggaran, $nim);

        // Eksekusi query
        $result = $stmt->execute();
    
        // Periksa hasil
        if ($result) {
            echo "Data berhasil ditambah";
        } else {
            echo "Gagal menambah data";
        }
    
        // Tutup statement
        $stmt->close();
    }
    
}