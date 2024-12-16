<?php
include_once '../../core/Koneksi.php';

class Mhs extends Koneksi
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPelPribadi($nim)
    {
        // Pastikan nama tabel (misalnya 'pelanggaran_tendik') disebutkan di SQL
        $sql = "SELECT 
        pelanggaran.nama_pelanggaran,
        pelanggaran.kategori,
        pelanggaran_mahasiswa.status_pelanggaran,
        pelanggaran_mahasiswa.tanggal_lapor,
        pelanggaran_mahasiswa.id_pelanggaran_mhs AS id
        FROM pelanggaran_mahasiswa
        JOIN pelanggaran ON pelanggaran_mahasiswa.id_pelanggaran = pelanggaran.id_pelanggaran
        WHERE nim = ? AND pelanggaran_mahasiswa.status_pelanggaran IN ('2', '3')";

        // Menggunakan prepared statement untuk keamanan
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $nim);
        $stmt->execute();

        // Mendapatkan hasil query
        $result = $stmt->get_result();

        // Memastikan hasil dikembalikan dalam bentuk array asosiatif
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getLampiranById($id_pel)
    {
        $sql = "SELECT
        pelanggaran_mahasiswa.*,
        pelanggaran.nama_pelanggaran
        FROM pelanggaran_mahasiswa
        JOIN pelanggaran ON pelanggaran_mahasiswa.id_pelanggaran = pelanggaran.id_pelanggaran
        WHERE id_pelanggaran_mhs = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $id_pel);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getSanksiById($id_pel) {
        $sql = "SELECT * FROM sanksi WHERE id_pelanggaran_mhs = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id_pel);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function setBuktiSelesaiById($id_pel, $bukti_selesai)
    {
        $sql = "UPDATE pelanggaran_mahasiswa SET bukti_selesai = ?, status_pelanggaran = '2' WHERE id_pelanggaran_mhs = ?";
        $stmt = $this->db->prepare($sql);

        // Bind parameter: "si" (s = string, i = integer)
        $stmt->bind_param("si", $bukti_selesai, $id_pel);

        // Eksekusi query
        $stmt->execute();

        // Tutup statement
        $stmt->close();
    }
}