<?php
include_once 'core/koneksi.php';
class Admin extends Koneksi
{
    public function __construct() {
        parent::__construct();
    }

    public function getTabelPelMhs()
    {
        $sql = "SELECT * FROM pelanggaran_mahasiswa";
        $result = $this->db->query($sql);
        return $result;
    }
    
    public function getTabelPelDosen() {
        $sql = "SELECT *
        FROM pelanggaran_tendik p
        JOIN dosen d
        ON d.nip = p.nip";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getTabelPelKaryawan() {
        $sql = "SELECT *
        FROM pelanggaran_tendik p
        JOIN karyawan k
        ON k.nip = p.nip";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getTabelUserMahasiswa() {
        $sql = "SELECT * FROM mahasiswa";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            // Menggunakan fetch_all untuk mendapatkan semua data
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return []; // Jika tidak ada data, kembalikan array kosong
        }
    }
    public function getTabelUserDosen() {
        $sql = "SELECT * FROM dosen";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            // Menggunakan fetch_all untuk mendapatkan semua data
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return []; // Jika tidak ada data, kembalikan array kosong
        }
    }

    public function getTabelUserKaryawan() {
        $sql = "SELECT * FROM karyawan";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            // Menggunakan fetch_all untuk mendapatkan semua data
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return []; // Jika tidak ada data, kembalikan array kosong
        }
    }

    public function addTabelUserMahasiswa($nama, $password, $status, $nim, $kelas, $notelp, $alamat, $email, $namaAyah, $noTelpAyah, $namaIbu, $noTelpIbu){
        $sql = "INSERT INTO mahasiswa (nim, password, id_kelas, status, nama, no_telp, email, alamat, nama_ayah, no_telp_ayah, nama_ibu, no_telp_ibu)
        VALUES ($nim, $password, $kelas, $status, $nama, $notelp, $email, $alamat, $namaAyah, $noTelpAyah, $namaIbu, $noTelpIbu)";
        $result = $this->db->query($sql);
        if($result){
            echo "data berhasil ditambah";
        } else {
            echo "gagal";
        }
    }
}