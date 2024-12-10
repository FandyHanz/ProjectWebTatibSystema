<?php
include 'models/Admin.php';
include_once 'models/Report.php';

class AdminController
{
    private $data;
    private $reportModel;

    public function __construct()
    {
        // instansiasi objek
        $this->data = new Admin();
        $this->reportModel = new Report();
    }

    public function dashboard()
    {
        // Logika untuk halaman dashboard admin

        $tableMhs = $this->data->getTabelPelMhs();

        require 'views/dashboard/dashboard.php';
    }

    public function report()
    {
        require 'views/report/report.php';
    }
    
    public function reportMhsAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $query = $_GET['query'] ?? ''; // Ambil query dari parameter GET

            $results = $this->reportModel->searchNim($query); // Method ini harus dikembangkan di model
            if ($results === null) {
                echo "Not Found";
                require 'views/report/report.php';
                exit;
            }
        }
        require 'views/report/confirm-user.php';
    }

    public function history()
    {

        echo "Admin History";
    }
    public function manajemenUserMhs()
    {
        // Logika untuk halaman manajemen user admin
        $tabelMahasiswa = $this->data->getTabelUserMahasiswa();

        // Passing variabel secara eksplisit
        require 'views/manajemen-user/manajemen-user-mhs.php';
    }
    public function manajemenUserDosen()
    {
        // Logika untuk halaman manajemen user admin
        $tabelDosen = $this->data->getTabelUserDosen();

        // Passing variabel secara eksplisit
        require 'views/manajemen-user/manajemen-user-dosen.php';
    }
    public function manajemenUserKaryawan()
    {
        // Logika untuk halaman manajemen user admin
        $tabelKaryawan = $this->data->getTabelUserKaryawan();
        // Passing variabel secara eksplisit
        require 'views/manajemen-user/manajemen-user-karyawan.php';
    }

    public function tambahMhs()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $password = $_POST['password'];
            $kelas = $_POST['kelas'];
            $status = $_POST['status'];
            $noTelp = $_POST['no_telp'];
            $alamat = $_POST['alamat'];
            $email = $_POST['email'];
            $namaAyah = $_POST['nama_ayah'];
            $noTelpAyah = $_POST['no_telp_ayah'];
            $namaIbu = $_POST['nama_ibu'];
            $noTelpIbu = $_POST['no_telp_ibu'];

            $tabelMahasiswa = $this->data->addTabelUserMahasiswa($nama, $password, $status, $nim, $kelas, $noTelp, $alamat, $email, $namaAyah, $noTelpAyah, $namaIbu, $noTelpIbu);
            return $tabelMahasiswa;
        }
        require 'views/manajemen-user/tambah/mhs.php';
    }

    public function actionTambahMhs()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $kelas = $_POST['kelas'];
            $status = $_POST['status'];
            $noTelp = $_POST['no_telp'];
            $alamat = $_POST['alamat'];
            $email = $_POST['email'];
            $namaAyah = $_POST['nama_ayah'];
            $noTelpAyah = $_POST['no_telp_ayah'];
            $namaIbu = $_POST['nama_ibu'];
            $noTelpIbu = $_POST['no_telp_ibu'];

            $tabelMahasiswa = $this->data->getTabelUserKaryawan();
            return $tabelMahasiswa;
        }
        require 'views/manajemen-user/tambah/mhs.php';
    }

    public function tambahDosen() {}
    public function tambahKaryawan() {}
}
