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
    WHERE
        pelanggaran_mahasiswa.status_pelanggaran IN ('2', '3', '4');
    ";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getDetailMhs($nim)
    {
        $sql = "SELECT 
            mahasiswa.nim,
            mahasiswa.nama AS nama_mahasiswa,
            mahasiswa.status AS status_mahasiswa,
            mahasiswa.no_telp,
            mahasiswa.email AS email_mahasiswa,
            mahasiswa.alamat,
            mahasiswa.nama_ayah,
            mahasiswa.no_telp_ayah,
            mahasiswa.nama_ibu,
            mahasiswa.no_telp_ibu,
            kelas.nama AS nama_kelas,
            dosen.nip,
            dosen.nama AS nama_dpa,
            dosen.nip AS nip_dpa,
            dosen.no_telp AS no_telp_dpa,
            dosen.email AS email_dpa
        FROM 
        mahasiswa
        JOIN
            kelas ON mahasiswa.id_kelas = kelas.id_kelas
        JOIN
            dosen ON kelas.id_kelas = dosen.id_kelas
        WHERE 
            mahasiswa.nim = ?
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
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
    ";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // jaga jaga tapi sepertinya tidak dipakai
    // public function getTabelPelDosen()
    // {
    //     $sql = "SELECT 
    // mahasiswa.nim,
    // mahasiswa.nama AS nama_mahasiswa,
    // mahasiswa.status AS status_mahasiswa,
    // mahasiswa.no_telp,
    // mahasiswa.email AS email_mahasiswa,
    // mahasiswa.alamat,
    // mahasiswa.nama_ayah,
    // mahasiswa.no_telp_ayah,
    // mahasiswa.nama_ibu,
    // mahasiswa.no_telp_ibu,
    //     pelanggaran_mahasiswa.id_pelanggaran_mhs,
    //     pelanggaran_mahasiswa.deskripsi AS deskripsi_pelanggaran,
    //     pelanggaran_mahasiswa.status_pelanggaran,
    //     pelanggaran_mahasiswa.bukti_selesai,
    //     pelanggaran.id_pelanggaran,
    //     pelanggaran.nama_pelanggaran,
    //     pelanggaran.kategori,
    // dosen.nip,
    // dosen.nama AS nama_dosen,
    // dosen.no_telp AS no_telp_dpa,
    // dosen.email AS email_dpa
    // FROM 
    //     mahasiswa
    // JOIN
    //     pelanggaran_mahasiswa ON mahasiswa.nim = pelanggaran_mahasiswa.nim
    // JOIN 
    //     pelanggaran ON pelanggaran_mahasiswa.id_pelanggaran = pelanggaran.id_pelanggaran
    // JOIN
    //     dosen ON dosen.id_kelas = mahasiswa.id_kelas
    // ";
    // $result = $this->db->query($sql);
    // return $result->fetch_all(MYSQLI_ASSOC);
    // }


    public function getTabelPelKaryawan()
    {
        $sql = "SELECT *
        FROM pelanggaran_tendik p
        JOIN karyawan k
        ON k.nip = p.nip";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // ---------------------------------REPORT------------------------------------

    public function searchRekomendasiMahasiswa($searchQuery)
    {
        $sql = "SELECT
                    mahasiswa.nama,
                    mahasiswa.nim,
                    kelas.nama AS nama_kelas
                FROM
                    mahasiswa
                JOIN
                    kelas ON kelas.id_kelas = mahasiswa.id_kelas
                WHERE
                    mahasiswa.nama LIKE CONCAT('%', ?, '%')
                    OR mahasiswa.nim LIKE CONCAT('%', ?, '%')";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $searchQuery, $searchQuery);
        $stmt->execute();
        $result = $stmt->get_result();
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
        $role = 3;
        $sql = "INSERT INTO mahasiswa (nim, password, id_kelas, status, nama, no_telp, email, alamat, nama_ayah, no_telp_ayah, nama_ibu, no_telp_ibu, role, foto_profile)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $this->db->prepare($sql);

if ($stmt) {
    $stmt->bind_param(
        "ississssssssis", 
        $nim, 
        $password, 
        $kelas, 
        $status, 
        $nama, 
        $notelp, 
        $email, 
        $alamat, 
        $namaAyah, 
        $noTelpAyah, 
        $namaIbu, 
        $noTelpIbu,
        $role, 
        $fotoProfile
    );
    
    if ($stmt->execute()) {
        header("Location: ../../views/manajemen-user/manajemen-user.php");
    } else {
        echo "Gagal: " . $stmt->error;
    }
    
    $stmt->close();
} else {
    echo "Gagal: " . $this->db->error;
}

    }


    public function addTabelUserDosen($nama, $password, $status, $nip, $notelp, $email, $fotoprofile, $id_kelas)
    {
        $sql = "INSERT INTO tendik (nim, password, id_kelas, status, nama, no_telp, email,  id_kelas, foto_profile, role)
        VALUES ($nama, $password, $status, $nip, $notelp, $email,  $id_kelas, $fotoprofile, 3)";
        $result = $this->db->query($sql);
        if ($result) {
            header("Location: ../../views/manajemen-user/manajemen-user.php");
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

    public function filterClassmhs($kelas)
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
    WHERE
        mahasiswa.kelas = $kelas";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function dataDpaMhs()
    {
        $sql = "SELECT
        dosen.nama, 
        dosen.nip, dosen.no_telp,
        dosen.email, mahasiswa.kelas, 
        mahsiswa.no_telp, mahasiswa.email 
        FROM 
        dosen
        JOIN
        mahasiswa
        ON
        dosen.id_kelas = mahasiswa.id_kelas";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function getKelasMhs()
    {
        $sql = "SELECT * FROM kelas";
        $result = $this->db->query($sql);
        return $result;
    }
}
