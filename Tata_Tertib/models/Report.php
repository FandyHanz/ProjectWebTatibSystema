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

    public function getImgProfileMhs($nim)
    {
        $query = "SELECT foto_profile FROM mahasiswa WHERE nim = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        $stmt->bind_result($fotoProfile);
        $stmt->fetch();
        return $fotoProfile;
    }

    public function getImgProfileKaryawan($nip)
    {
        $query = "SELECT foto_profile FROM karyawan WHERE nip = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $nip);
        $stmt->execute();
        $stmt->bind_result($fotoProfile);
        $stmt->fetch();
        return $fotoProfile;  // Mengembalikan data foto dalam format biner
    }

    public function getImgProfileDosen($nip)
    {
        $query = "SELECT foto_profile FROM dosen WHERE nip = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $nip);
        $stmt->execute();
        $stmt->bind_result($fotoProfile);
        $stmt->fetch();
        return $fotoProfile;
    }

    public function searchByIdMhs($id)
    {
        $sql = "SELECT 1 FROM mahasiswa WHERE nim = ? LIMIT 1"; // SELECT 1 untuk mengecek keberadaan data
        $stmt = $this->db->prepare($sql); // Gunakan prepared statement
        $stmt->bind_param("s", $id); // Bind parameter (nim kemungkinan string)
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0; // Kembalikan true jika data ditemukan
    }

    public function getSimpleDataMhs($nim)
    {
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
        $stmt->bind_param("issss", $pelanggaran, $deskripsi, $lampiran, $statusPelanggaran, $nim);

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


    public function searchDosenById($id)
    {
        $sql = "SELECT 1 FROM dosen WHERE nip = ? LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function searchDosenByName($name)
    {
        $sql = "SELECT dosen.nama,
        dosen.nip, 
        kelas.nama AS nama_kelas 
        FROM 
        dosen 
        LEFT JOIN 
        kelas ON dosen.id_kelas = kelas.id_kelas 
        WHERE dosen.nama LIKE ?";
        $stmt = $this->db->prepare($sql);

        // Tambahkan wildcard '%' ke parameter
        $name = "%$name%";

        $stmt->bind_param("s", $name);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function searchKaryawanByName($name)
    {
        $sql = "SELECT nama, nip
        FROM karyawan 
        WHERE nama LIKE ?";
        $stmt = $this->db->prepare($sql);

        // Tambahkan wildcard '%' ke parameter
        $name = "%$name%";

        $stmt->bind_param("s", $name);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function searchMhsByName($name)
    {
        $sql = "SELECT mahasiswa.nama,
        mahasiswa.nim, 
        kelas.nama AS nama_kelas 
        FROM 
        mahasiswa 
        LEFT JOIN 
        kelas ON mahasiswa.id_kelas = kelas.id_kelas 
        WHERE mahasiswa.nama LIKE ?";
        $stmt = $this->db->prepare($sql);

        // Tambahkan wildcard '%' ke parameter
        $name = "%$name%";

        $stmt->bind_param("s", $name);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    public function getSimpleDataDosen($nip)
    {
        $sql = "SELECT nama, nip, foto_profile FROM dosen WHERE nip = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $nip);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function addPelanggaranDosen($nama, $deskripsi, $sanksi, $lampiran, $nip)
    {
        $status = 4;
        $sql = "INSERT INTO pelanggaran_dosen 
        (nama, deskripsi, status, bukti_selesai, sanksi, lampiran, tanggal_lapor, nip)
        VALUES (?, ?, ?, null, ?, ?, current_timestamp(), ?)";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssisss", $nama, $deskripsi, $status, $sanksi, $lampiran, $nip);
        $result = $stmt->execute();

        if ($result) {
            echo "Data berhasil ditambah";
        } else {
            echo "gagal menambah data";
        }

        $stmt->close();
    }

    public function searchByIdKaryawan($id)
    {
        $sql = "SELECT 1 FROM karyawan WHERE nip = ? LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getSimpleDataKaryawan($nip)
    {
        $sql = "SELECT nama, nip, foto_profile FROM karyawan WHERE nip = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $nip);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function addPelanggaranKaryawan($nama, $deskripsi, $sanksi, $lampiran, $nip)
    {
        $status = 4;
        $sql = "INSERT INTO pelanggaran_tendik
        (nama, deskripsi, status, bukti_selesai, sanksi, lampiran, tanggal_lapor, nip)
        VALUES (?, ?, ?, null, ?, ?, current_timestamp(), ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssisss", $nama, $deskripsi, $status, $sanksi, $lampiran, $nip);
        $result = $stmt->execute();

        if ($result) {
            echo "Data berhasil ditambah";
        } else {
            echo "gagal menambah data";
        }

        $stmt->close();
    }
}
