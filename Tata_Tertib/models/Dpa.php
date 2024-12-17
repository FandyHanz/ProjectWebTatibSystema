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

    public function getTabelPelMhsHistory($nip)
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
        dosen.nip = $nip
        ;
    ";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
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

    public function getLampiranById($id_pel)
    {
        $sql = "SELECT * FROM pelanggaran_dosen WHERE id_pelanggaran_dosen = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $id_pel);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getBuktiSelesaiMhs($id_pel)
    {
        $sql = "SELECT * FROM pelanggaran_mahasiswa WHERE id_pelanggaran_mhs = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $id_pel);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function setBuktiSelesaiById($id_pel, $bukti_selesai)
    {
        $sql = "UPDATE pelanggaran_dosen SET bukti_selesai = ?, status = '2' WHERE id_pelanggaran_dosen = ?";
        $stmt = $this->db->prepare($sql);

        // Bind parameter: "si" (s = string, i = integer)
        $stmt->bind_param("si", $bukti_selesai, $id_pel);

        // Eksekusi query
        $stmt->execute();

        // Tutup statement
        $stmt->close();
    }

    public function setSanksiById($id_pel, $dataSanksi, $tambahan)
    {
        foreach ($dataSanksi as $sanksi) {
            # code...
            $sql = "INSERT INTO sanksi SET id_pelanggaran_mhs = ?, sanksi = ?";
            $stmt = $this->db->prepare($sql);

            // Bind parameter: "si" (s = string, i = integer)
            $stmt->bind_param("is", $id_pel, $sanksi);

            // Eksekusi query
            $stmt->execute();

            // Tutup statement
            $stmt->close();
        }
        $sql = "INSERT INTO sanksi SET id_pelanggaran_mhs = ?, sanksi = ?";
        $stmt = $this->db->prepare($sql);

        $stmt->bind_param("is", $id_pel, $tambahan);

        $stmt->execute();
        $stmt->close();
        
        // Update Status
        $sql = "UPDATE pelanggaran_mahasiswa SET status_pelanggaran = '3' WHERE id_pelanggaran_mhs = ?";
        $stmt = $this->db->prepare($sql);

        $stmt->bind_param("i", $id_pel);
        $stmt->execute();
        $stmt->close();
    }
}
