<?php
include_once '../../core/Koneksi.php';

class Karyawan extends Koneksi
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getImgProfile($id)
    {
        $stmt = $this->db->prepare("SELECT foto_profile FROM karyawan WHERE nip = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            return $row['foto_profile'];
        }
    }

    public function getLampiranById($id_pel)
    {
        $sql = "SELECT * FROM pelanggaran_tendik WHERE id_pelanggaran_tendik = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $id_pel);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getPelPribadi($nip)
    {
        // Pastikan nama tabel (misalnya 'pelanggaran_tendik') disebutkan di SQL
        $sql = "SELECT * FROM pelanggaran_tendik WHERE nip = ? AND pelanggaran_tendik.status IN ('2', '3')";

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
        $sql = "SELECT * FROM pelanggaran_tendik WHERE nip = ? AND pelanggaran_tendik.status IN ('1', '2', '3')";

        // Menggunakan prepared statement untuk keamanan
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $nip);
        $stmt->execute();

        // Mendapatkan hasil query
        $result = $stmt->get_result();

        // Memastikan hasil dikembalikan dalam bentuk array asosiatif
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function setBuktiSelesaiById($id_pel, $bukti_selesai)
    {
        $sql = "UPDATE pelanggaran_tendik SET bukti_selesai = ?, status = '2' WHERE id_pelanggaran_tendik = ?";
        $stmt = $this->db->prepare($sql);

        // Bind parameter: "si" (s = string, i = integer)
        $stmt->bind_param("si", $bukti_selesai, $id_pel);

        // Eksekusi query
        $stmt->execute();

        // Tutup statement
        $stmt->close();
    }
}
