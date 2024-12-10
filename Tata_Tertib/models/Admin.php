<?php
include_once 'core/koneksi.php';
class Admin extends Koneksi
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getTabelPelMhs()
    {
        $sql = "SELECT * FROM pelanggaran_mahasiswa";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getTabelPelDosen()
    {
        $sql = "SELECT *
        FROM pelanggaran_tendik p
        JOIN dosen d
        ON d.nip = p.nip";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getTabelPelKaryawan()
    {
        $sql = "SELECT *
        FROM pelanggaran_tendik p
        JOIN karyawan k
        ON k.nip = p.nip";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getRekomPelanggaranMhs()
    {
        $sql = "
    SELECT mahasiswa.nama, kelas.nama_kelas, kelas.id_prodi
    FROM mahasiswa
    JOIN kelas ON mahasiswa.id_kelas = kelas.id
    WHERE mahasiswa.nama LIKE ?
    AND (kelas.id = ? OR ? = '')
    AND (kelas.id_prodi = ? OR ? = '')
    LIMIT 10
";

        $stmt = $this->db->prepare($sql);

        // $searchTerm = '%' . $query . '%';  
        $idKelas = $_GET['id_kelas'] ?? ''; // Bisa null jika tidak ada input
        $idProdi = $_GET['id_prodi'] ?? ''; // Bisa null jika tidak ada input

        $stmt->bind_param('sssss', $searchTerm, $idKelas, $idKelas, $idProdi, $idProdi);
        $stmt->execute();
        $result = $stmt->get_result();
    }

    public function getTabelUserMahasiswa()
    {
        $sql = "SELECT * FROM mahasiswa";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            // Menggunakan fetch_all untuk mendapatkan semua data
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return []; // Jika tidak ada data, kembalikan array kosong
        }
    }

    public function getTabelUserDosen()
    {
        $sql = "SELECT * FROM dosen";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            // Menggunakan fetch_all untuk mendapatkan semua data
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return []; // Jika tidak ada data, kembalikan array kosong
        }
    }

    public function getTabelUserKaryawan()
    {
        $sql = "SELECT * FROM karyawan";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            // Menggunakan fetch_all untuk mendapatkan semua data
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return []; // Jika tidak ada data, kembalikan array kosong
        }
    }

    public function addTabelUserMahasiswa($nama, $password, $status, $nim, $kelas, $notelp, $alamat, $email, $namaAyah, $noTelpAyah, $namaIbu, $noTelpIbu)
    {
        $sql = "INSERT INTO mahasiswa (nim, password, id_kelas, status, nama, no_telp, email, alamat, nama_ayah, no_telp_ayah, nama_ibu, no_telp_ibu)
        VALUES ($nim, $password, $kelas, $status, $nama, $notelp, $email, $alamat, $namaAyah, $noTelpAyah, $namaIbu, $noTelpIbu)";
        $result = $this->db->query($sql);
        if ($result) {
            echo "data berhasil ditambah";
        } else {
            echo "gagal";
        }
    }
}
