<?php
include_once '../../core/Koneksi.php';

class Dosen extends Koneksi
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPelPribadi($nip)
    {
        // Pastikan nama tabel (misalnya 'pelanggaran_tendik') disebutkan di SQL
        $sql = "SELECT * FROM pelanggaran_dosen WHERE nip = ? AND pelanggaran_dosen.status IN ('2', '3')";

        // Menggunakan prepared statement untuk keamanan
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $nip);
        $stmt->execute();

        // Mendapatkan hasil query
        $result = $stmt->get_result();

        // Memastikan hasil dikembalikan dalam bentuk array asosiatif
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPelPribadiHistory($nip)
    {
        // Pastikan nama tabel (misalnya 'pelanggaran_tendik') disebutkan di SQL
        $sql = "SELECT * FROM pelanggaran_dosen WHERE nip = ? AND pelanggaran_dosen.status IN ('1', '2', '3')";

        // Menggunakan prepared statement untuk keamanan
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $nip);
        $stmt->execute();

        // Mendapatkan hasil query
        $result = $stmt->get_result();

        // Memastikan hasil dikembalikan dalam bentuk array asosiatif
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}