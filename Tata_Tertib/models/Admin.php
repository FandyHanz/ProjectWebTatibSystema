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

    public function getImgProfile($nip)
    {
        $query = "SELECT foto_profile FROM admin WHERE nip = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("s", $nip);
        $stmt->execute();
        $stmt->bind_result($fotoProfile);
        $stmt->fetch();
        return $fotoProfile;
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

    public function getTabelPelMhs()
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
    WHERE
        pelanggaran_mahasiswa.status_pelanggaran IN ('2', '3', '4');
    ";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getHistoryPelMhs()
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

    public function getDetailPelMhs($id_pelanggaran_mhs)
    {
        $sql = "SELECT
        pelanggaran_mahasiswa.id_pelanggaran_mhs,
        pelanggaran_mahasiswa.lampiran,
        pelanggaran.nama_pelanggaran,
        pelanggaran.kategori,
        pelanggaran_mahasiswa.deskripsi,
        mahasiswa.nama,
        mahasiswa.nim
        FROM
        pelanggaran_mahasiswa
        JOIN
        mahasiswa ON mahasiswa.nim = pelanggaran_mahasiswa.nim
        JOIN
        pelanggaran ON pelanggaran_mahasiswa.id_pelanggaran = pelanggaran.id_pelanggaran
        WHERE
        pelanggaran_mahasiswa.id_pelanggaran_mhs = ?
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $id_pelanggaran_mhs);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getTabelPelDosen()
    {
        $sql = "SELECT 
        dosen.nip,
        dosen.nama,
        pelanggaran_dosen.id_pelanggaran_dosen,
        pelanggaran_dosen.status,
        pelanggaran_dosen.tanggal_lapor
    FROM 
        dosen
    JOIN
        pelanggaran_dosen ON dosen.nip = pelanggaran_dosen.nip
    WHERE
        pelanggaran_dosen.status IN ('2', '3', '4')
    ";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getHistoryPelDosen()
    {
        $sql = "SELECT 
        dosen.nip,
        dosen.nama,
        pelanggaran_dosen.nama AS nama_pelanggaran,
        pelanggaran_dosen.id_pelanggaran_dosen,
        pelanggaran_dosen.deskripsi,
        pelanggaran_dosen.status,
        pelanggaran_dosen.tanggal_lapor
    FROM 
        dosen
    JOIN
        pelanggaran_dosen ON dosen.nip = pelanggaran_dosen.nip
    ";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getDosenWithNip($id_pelanggaran_dosen)
    {
        $sql = " SELECT 
            dosen.nama,
            dosen.nip,
            pelanggaran_dosen.id_pelanggaran_dosen,
            pelanggaran_dosen.nama AS nama_pelanggaran,
            pelanggaran_dosen.deskripsi

            FROM
            pelanggaran_dosen
            JOIN dosen ON pelanggaran_dosen.nip = dosen.nip
            WHERE 
            pelanggaran_dosen.id_pelanggaran_dosen = ?
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $id_pelanggaran_dosen);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getKaryawanWithNip($id_pelanggaran_tendik)
    {
        $sql = " SELECT 
            karyawan.nama,
            karyawan.nip,
            pelanggaran_tendik.id_pelanggaran_tendik,
            pelanggaran_tendik.nama AS nama_pelanggaran,
            pelanggaran_tendik.deskripsi,
            pelanggaran_tendik.lampiran

            FROM
            pelanggaran_tendik
            JOIN karyawan ON pelanggaran_tendik.nip = karyawan.nip
            WHERE 
            pelanggaran_tendik.id_pelanggaran_tendik = ?
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $id_pelanggaran_tendik);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getDetailDosen($nip)
    {
        $sql = "SELECT 
            dosen.nama, 
            dosen.nip, 
            dosen.status, 
            dosen.no_telp, 
            dosen.email,
            kelas.nama AS nama_kelas 
        FROM 
            dosen 
        LEFT JOIN 
            kelas ON dosen.id_kelas = kelas.id_kelas 
        WHERE 
            dosen.nip = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $nip);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getTabelPelKaryawan()
    {
        $sql = "SELECT 
        karyawan.nip,
        karyawan.nama,
        pelanggaran_tendik.id_pelanggaran_tendik,
        pelanggaran_tendik.status,
        pelanggaran_tendik.tanggal_lapor
    FROM 
        karyawan
    JOIN
        pelanggaran_tendik ON karyawan.nip = pelanggaran_tendik.nip
    WHERE
        pelanggaran_tendik.status IN ('2', '3', '4')
    ";
        $result = $this->db->query($sql);
        return $result->fetch_all(mode: MYSQLI_ASSOC);
    }

    public function getHistoryPelKaryawan()
    {
        $sql = "SELECT 
        karyawan.nip,
        karyawan.nama,
        pelanggaran_tendik.nama AS nama_pelanggaran,
        pelanggaran_tendik.id_pelanggaran_tendik,
        pelanggaran_tendik.deskripsi,
        pelanggaran_tendik.status,
        pelanggaran_tendik.tanggal_lapor
    FROM 
        karyawan
    JOIN
        pelanggaran_tendik ON karyawan.nip = pelanggaran_tendik.nip
    ";
        $result = $this->db->query($sql);
        return $result->fetch_all(mode: MYSQLI_ASSOC);
    }

    public function getDetailKaryawan($nip)
    {
        $sql = "SELECT 
            karyawan.nama, 
            karyawan.nip, 
            karyawan.status,
            karyawan.no_telp, 
            karyawan.email
        FROM 
            karyawan
        WHERE 
            karyawan.nip = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $nip);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function setSelesaiMhsById($id_pel)
    {
        $sql = "UPDATE pelanggaran_mahasiswa SET status_pelanggaran = '1' WHERE id_pelanggaran_mhs = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id_pel);
        return $stmt->execute();
    }

    public function setSelesaiDosenById($id_pel)
    {
        $sql = "UPDATE pelanggaran_dosen SET status = '1' WHERE id_pelanggaran_dosen = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id_pel);
        return $stmt->execute();
    }

    public function setSelesaiKaryawanById($id_pel)
    {
        $sql = "UPDATE pelanggaran_tendik SET status = '1' WHERE id_pelanggaran_tendik = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id_pel);
        return $stmt->execute();
    }

    public function setSanksiDosenById($id_pel, $sanksi)
    {
        $sql = "UPDATE pelanggaran_dosen SET status = '3', sanksi = ? WHERE id_pelanggaran_dosen = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("si", $sanksi, $id_pel);
        return $stmt->execute();
    }

    public function setSanksiKaryawanById($id_pel, $sanksi)
    {
        $sql = "UPDATE pelanggaran_tendik SET status = '3', sanksi = ? WHERE id_pelanggaran_tendik = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("si", $sanksi, $id_pel);
        return $stmt->execute();
    }

    public function getLampiranTendikById($id_pel)
    {
        $sql = "SELECT * FROM pelanggaran_tendik WHERE id_pelanggaran_tendik = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $id_pel);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function dropPelTendik($id_pel)
    {
        $sql = "DELETE FROM pelanggaran_tendik WHERE id_pelanggaran_tendik = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id_pel);
        return $stmt->execute();
    }

    public function dropPelDosen($id_pel)
    {
        $sql = "DELETE FROM pelanggaran_dosen WHERE id_pelanggaran_dosen = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id_pel);
        return $stmt->execute();
    }

    public function dropPelMhs($id_pel)
    {
        $sql = "DELETE FROM pelanggaran_mahasiswa WHERE id_pelanggaran_mhs = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id_pel);
        return $stmt->execute();
    }

    // <-------------------------------MANAJEMEN USER------------------------------------>

    public function getTabelUserMahasiswa()
    {
        $sql = "SELECT mahasiswa.nama AS nama, mahasiswa.nim, mahasiswa.no_telp, kelas.nama 
        AS nama_kelas, mahasiswa.email AS email FROM mahasiswa JOIN kelas
        ON mahasiswa.id_kelas = kelas.id_kelas";
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

        $sql = "SELECT dosen.nama AS nama, dosen.nip, dosen.no_telp, kelas.nama 
        AS nama_kelas, dosen.email AS email, dosen.status FROM dosen LEFT JOIN kelas
        ON dosen.id_kelas = kelas.id_kelas";
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
        $sql = "SELECT karyawan.nama AS nama, karyawan.nip, karyawan.no_telp, karyawan.email AS email, karyawan.status FROM karyawan";
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
        $role = 4;
        $sql = "INSERT INTO mahasiswa 
            (nim, password, id_kelas, status, nama, no_telp, email, alamat, nama_ayah, no_telp_ayah, nama_ibu, no_telp_ibu, role, foto_profile)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        if ($stmt) {
            // Bind parameters tanpa foto profile terlebih dahulu
            $stmt->bind_param(
                "ississssssssib",
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
                $null // Placeholder untuk blob
            );

            // Mengirim data BLOB secara terpisah
            $stmt->send_long_data(13, $fotoProfile); // Parameter ke-14 (0-indexed)

            // Eksekusi statement
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

    public function addTabelUserDosen($nama, $nip, $no_telp, $password, $email, $status, $kelas, $fotoProfile)
    {
        $role = ($kelas === "") ? 3 : 2;
        $id_kelas = ($kelas === "") ? null : $kelas;

        $sql = 'INSERT INTO dosen (nip, password, nama, status, no_telp, email, role, id_kelas, foto_profile) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $stmt = $this->db->prepare($sql);
        echo ($role == 2);
        if ($stmt) {
            // Bind parameters
            $stmt->bind_param(
                "ssssssiss",
                $nip,
                $password,
                $nama,
                $status,
                $no_telp,
                $email,
                $role,
                $id_kelas,
                $fotoProfile
            );
            if ($stmt->execute()) {
                echo "Data inserted successfully.";
                header("Location: ../../views/manajemen-user/manajemen-user.php");
                exit();
            } else {
                echo "Error: " . $this->db->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $this->db->error;
        }
    }

    public function addTabelUserKaryawan($nama, $password, $status, $nip, $noTelp, $email, $fotoProfile)
    {
        $role = 3; // Role selalu 3 untuk Karyawan

        $sql = 'INSERT INTO karyawan (nip, password, nama, status, no_telp, email, role, foto_profile) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)';

        $stmt = $this->db->prepare($sql);

        if ($stmt) {
            // Bind parameters
            $stmt->bind_param(
                "ssssssss", // Tipe data: 7 string (s) untuk nip, password, nama, status, no_telp, email, dan role; dan satu b (binary) untuk foto_profile
                $nip,
                $password,
                $nama,
                $status,
                $noTelp,
                $email,
                $role,
                $fotoProfile // Foto profile sebagai BLOB
            );

            if ($stmt->execute()) {
                echo "Data berhasil ditambah.";
                header("Location: ../../views/manajemen-user/manajemen-user.php");
                exit(); // Menghentikan eksekusi script setelah redirect
            } else {
                echo "Gagal: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Gagal menyiapkan statement: " . $this->db->error;
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
        pelanggaran_mahasiswa.status,
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
        $sql = "SELECT kelas.id_kelas, kelas.nama, kelas.id_prodi
        FROM kelas
        LEFT JOIN dosen ON kelas.id_kelas = dosen.id_kelas
        WHERE dosen.id_kelas IS NULL;";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getKelasForMhs()
    {
        $sql = "SELECT kelas.id_kelas, kelas.nama, kelas.id_prodi
        FROM kelas
        LEFT JOIN dosen ON kelas.id_kelas = dosen.id_kelas;";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function editMhs($nama, $password, $status, $kelas, $notelp, $alamat, $email, $namaAyah, $noTelpAyah, $namaIbu, $noTelpIbu, $id, $fotoProfile)
    {
        $sql = "UPDATE mahasiswa SET 
            password = ?, 
            id_kelas = ?, 
            status = ?, 
            nama = ?,
            no_telp = ?,
            email = ?,
            alamat = ?,
            nama_ayah = ?,
            no_telp_ayah = ?,
            nama_ibu = ?,
            no_telp_ibu = ?,
            foto_profile = ?
            WHERE nim = ?";

        $stmt = $this->db->prepare($sql);

        if ($stmt) {
            // Variabel untuk placeholder foto_profile
            $fotoPlaceholder = null;

            // Bind parameters tanpa foto_profile terlebih dahulu
            $stmt->bind_param(
                "sisssssssssbs",
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
                $fotoPlaceholder, // Placeholder untuk foto_profile
                $id
            );

            // Mengirim data BLOB secara terpisah
            if ($fotoProfile !== null) {
                $stmt->send_long_data(11, $fotoProfile); // Parameter ke-12 (0-indexed)
            }

            // Eksekusi statement
            if ($stmt->execute()) {
                echo "Data berhasil diperbarui.";
            } else {
                echo "Gagal: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Gagal: " . $this->db->error;
        }
    }



    public function deleteMhs($nim)
    {
        // Step 1: Delete related records in pelanggaran_mahasiswa
        $sqlDeletePelanggaran = "DELETE FROM pelanggaran_mahasiswa WHERE nim = ?";
        $stmt = $this->db->prepare($sqlDeletePelanggaran);
        $stmt->bind_param("s", $nim);

        if ($stmt->execute()) {
            echo "Related records in pelanggaran_mahasiswa deleted successfully. ";
        } else {
            echo "Error deleting related records: " . $stmt->error;
        }
        $stmt->close();

        // Step 2: Now, delete from mahasiswa
        $sqlDeleteMahasiswa = "DELETE FROM mahasiswa WHERE nim = ?";
        $stmt = $this->db->prepare($sqlDeleteMahasiswa);
        $stmt->bind_param("s", $nim);

        if ($stmt->execute()) {
            echo "Mahasiswa with NIM $nim deleted successfully.";
        } else {
            echo "Error deleting mahasiswa: " . $stmt->error;
        }
        $stmt->close();
        header("Location: ../../views/manajemen-user/manajemen-user.php");
    }


    public function reaByIdMhs($id)
    {
        $sql = "SELECT * FROM mahasiswa WHERE nim = '$id'";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getAllDataMhsWithId($id)
    {
        $sql = "SELECT * FROM mahasiswa WHERE nim = '$id'";
        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }

    public function editDosen($password, $nama, $status, $no_telp, $email, $kelas, $fotoProfile, $id)
    {
        $role = ($kelas === "") ? 3 : 2;
        $id_kelas = ($kelas === "") ? null : $kelas;

        $sql = "UPDATE dosen SET 
            password = ?, 
            nama = ?, 
            status = ?, 
            no_telp = ?, 
            email = ?, 
            role = ?, 
            id_kelas = ?, 
            foto_profile = ?
            WHERE nip = ?";

        $stmt = $this->db->prepare($sql);

        if ($stmt) {
            // Variabel untuk placeholder foto_profile
            $fotoPlaceholder = null;

            // Bind parameters tanpa foto_profile terlebih dahulu
            $stmt->bind_param(
                "sssssisbs",
                $password,
                $nama,
                $status,
                $no_telp,
                $email,
                $role,
                $id_kelas,
                $fotoPlaceholder, // Placeholder untuk foto_profile
                $id
            );

            // Mengirim data BLOB secara terpisah
            if ($fotoProfile !== null) {
                $stmt->send_long_data(7, $fotoProfile); // Parameter ke-8 (0-indexed)
            }

            // Eksekusi statement
            if ($stmt->execute()) {
                echo "Data dosen berhasil diperbarui.";
            } else {
                echo "Gagal: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Gagal: " . $this->db->error;
        }
    }


    public function reaByIdDosen($id)
    {
        $sql = "SELECT * FROM dosen WHERE nip = '$id'";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getDosenByIdDosen($id)
    {
        $sql = "SELECT * FROM dosen WHERE nip = '$id'";
        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }

    public function deleteDosen($id)
    {
        $sql1 = "DELETE FROM pelanggaran_dosen WHERE nip = '$id'";
        $result = $this->db->query($sql1);

        $sql = "DELETE FROM dosen WHERE nip = '$id'";
        $result = $this->db->query($sql);
        return $result;
    }

    public function readByIdKaryawan($id)
    {
        $sql = "SELECT * FROM karyawan WHERE nip = '$id'";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getAllDataKaryawanWithId($id)
    {
        $sql = "SELECT * FROM karyawan WHERE nip = '$id'";
        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }

    public function editKaryawan($password, $nama, $status, $no_telp, $email, $fotoProfile, $id)
    {
        $sql = "UPDATE karyawan SET 
            password = ?, 
            nama = ?, 
            status = ?, 
            no_telp = ?, 
            email = ?, 
            foto_profile = ?
            WHERE nip = ?";

        $stmt = $this->db->prepare($sql);

        if ($stmt) {
            // Variabel untuk placeholder foto_profile
            $fotoPlaceholder = null;

            // Bind parameters tanpa foto_profile terlebih dahulu
            $stmt->bind_param(
                "sssssbs",
                $password,
                $nama,
                $status,
                $no_telp,
                $email,
                $fotoPlaceholder, // Placeholder untuk foto_profile
                $id
            );

            // Mengirim data BLOB secara terpisah
            if ($fotoProfile !== null) {
                $stmt->send_long_data(11, $fotoProfile); // Parameter ke-12 (0-indexed)
            }

            // Eksekusi statement
            if ($stmt->execute()) {
                echo "Data berhasil diperbarui.";
            } else {
                echo "Gagal: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Gagal: " . $this->db->error;
        }
    }


    public function deleteKaryawan($id)
    {
        // Hapus data terkait di tabel pelanggaran_tendik
        $sql1 = "DELETE FROM pelanggaran_tendik WHERE nip = '$id'";
        $this->db->query($sql1);

        $sql = "DELETE FROM karyawan WHERE nip = '$id'";
        $result = $this->db->query($sql);
        return $result;
    }
}
