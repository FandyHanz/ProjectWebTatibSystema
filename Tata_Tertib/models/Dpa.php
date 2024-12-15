<?php
include_once '../../core/Koneksi.php';

class Dpa extends Koneksi
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getTabelPelMhs($nip)
    {
        $sql = "SELECT 
        mahasiswa.nim,
        mahasiswa.nama AS nama_mahasiswa,
        mahasiswa.status AS status_mahasiswa,
        pelanggaran_mahasiswa.tanggal_lapor,
        pelanggaran_mahasiswa.id_pelanggaran_mhs,
        pelanggaran_mahasiswa.deskripsi AS deskripsi_pelanggaran,
        pelanggaran_mahasiswa.status_pelanggaran,
        pelanggaran_mahasiswa.bukti_selesai,
        pelanggaran.id_pelanggaran,
        pelanggaran.nama_pelanggaran,
        pelanggaran.kategori,
        kelas.id_kelas,
        kelas.nama AS nama_kelas
    FROM 
        mahasiswa
    JOIN
        pelanggaran_mahasiswa ON mahasiswa.nim = pelanggaran_mahasiswa.nim
    JOIN 
        pelanggaran ON pelanggaran_mahasiswa.id_pelanggaran = pelanggaran.id_pelanggaran
    JOIN
        kelas ON mahasiswa.id_kelas = kelas.id_kelas
    JOIN
        dosen on kelas.id_kelas = dosen.id_kelas
    WHERE
        pelanggaran_mahasiswa.status_pelanggaran IN ('2', '3', '4') AND dosen.nip = $nip
        ;
    ";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPelPribadi($nip)
    {
        // Pastikan nama tabel (misalnya 'pelanggaran_tendik') disebutkan di SQL
        $sql = "SELECT * FROM pelanggaran_dosen WHERE nip = ? AND pelanggaran_dosen.status IN ('2', '3', '4')";

        // Menggunakan prepared statement untuk keamanan
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $nip);
        $stmt->execute();

        // Mendapatkan hasil query
        $result = $stmt->get_result();

        // Memastikan hasil dikembalikan dalam bentuk array asosiatif
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getLampiranById($id_pel) {
        $sql = "SELECT * FROM pelanggaran_dosen WHERE id_pelanggaran_dosen = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $id_pel);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}