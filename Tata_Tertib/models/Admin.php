<?php
// Pathnya ikut parrentnya
// Objek ini dipanggil di : 
// 1. dashboard/admin-table-mahasiswa.php
// 2. ...

include_once '../../core/Koneksi.php';
class Admin extends Koneksi
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getTabelPelMhs()
    {
        $sql = "SELECT 
        mahasiswa.nim,
        mahasiswa.nama AS nama_mahasiswa,
        mahasiswa.status AS status_mahasiswa,
        pelanggaran_mahasiswa.id_pelanggaran_mhs,
        pelanggaran_mahasiswa.deskripsi AS deskripsi_pelanggaran,
        pelanggaran_mahasiswa.status_pelanggaran,
        pelanggaran_mahasiswa.bukti_selesai,
        pelanggaran.id_pelanggaran,
        pelanggaran.nama_pelanggaran,
        pelanggaran.kategori
    FROM 
        mahasiswa
    JOIN
        pelanggaran_mahasiswa ON mahasiswa.nim = pelanggaran_mahasiswa.nim
    JOIN 
        pelanggaran ON pelanggaran_mahasiswa.id_pelanggaran = pelanggaran.id_pelanggaran
    ";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTabelPelDosen()
    {
        $sql = "SELECT 
        mahasiswa.nim,
        mahasiswa.nama AS nama_mahasiswa,
        mahasiswa.status AS status_mahasiswa,
        pelanggaran_mahasiswa.id_pelanggaran_mhs,
        pelanggaran_mahasiswa.deskripsi AS deskripsi_pelanggaran,
        pelanggaran_mahasiswa.status_pelanggaran,
        pelanggaran_mahasiswa.bukti_selesai,
        pelanggaran.id_pelanggaran,
        pelanggaran.nama_pelanggaran,
        pelanggaran.kategori
    FROM 
        mahasiswa
    JOIN
        pelanggaran_mahasiswa ON mahasiswa.nim = pelanggaran_mahasiswa.nim
    JOIN 
        pelanggaran ON pelanggaran_mahasiswa.id_pelanggaran = pelanggaran.id_pelanggaran
    ";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTabelPelKaryawan()
    {
        $sql = "SELECT *
        FROM pelanggaran_tendik p
        JOIN karyawan k
        ON k.nip = p.nip";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // <-------------------------------MANAJEMEN USER------------------------------------>

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

    public function addTabelUserMahasiswa($nama, $password, $status, $nim, $kelas, $notelp, $alamat, $email, $namaAyah, $noTelpAyah, $namaIbu, $noTelpIbu, $fotoProfile)
    {
        $sql = "INSERT INTO mahasiswa (nim, password, id_kelas, status, nama, no_telp, email, alamat, nama_ayah, no_telp_ayah, nama_ibu, no_telp_ibu, foto_profile)
        VALUES ($nim, $password, $kelas, $status, $nama, $notelp, $email, $alamat, $namaAyah, $noTelpAyah, $namaIbu, $noTelpIbu, $fotoProfile)";
        $result = $this->db->query($sql);
        if ($result) {
            echo "data berhasil ditambah";
        } else {
            echo "gagal";
        }
    }


    public function addTabelUserDosen($nama, $password, $status, $nip, $notelp, $email, $fotoprofile, $id_kelas)
    {
        $sql = "INSERT INTO tendik (nim, password, id_kelas, status, nama, no_telp, email,  id_kelas, foto_profile, role)
        VALUES ($nama, $password, $status, $nip, $notelp, $email,  $id_kelas, $fotoprofile, 3)";
        $result = $this->db->query($sql);
        if ($result) {
            echo "data berhasil ditambah";
        } else {
            echo "gagal";
        }
    }

    public function addTabelUserKaryawan($nama, $password, $status, $nip, $notelp, $email, $fotoprofile)
    {
        $sql = "INSERT INTO tendik (nim, password, id_kelas, status, nama, no_telp, email, foto_profile, role)
        VALUES ($nama, $password, $status, $nip, $notelp, $email, $fotoprofile, 3)";
        $result = $this->db->query($sql);
        if ($result) {
            echo "data berhasil ditambah";
        } else {
            echo "gagal";
        }
    }
}
