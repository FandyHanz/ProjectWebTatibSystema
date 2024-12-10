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

    public function dashboard_admin()
    {
        // Logika untuk halaman dashboard admin

        $dataMhs = $this->data->getTabelPelMhs();

        require 'views/dashboard/admin/dashboard-admin.php';
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
    
    public function reportMhsForm() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $nim = $_GET['nim'] ?? ''; // Ambil query dari parameter GET
            $nama = $_GET['nama'] ?? ''; // Ambil query dari parameter GET
        }
        require 'views/report/report-form-mhs.php';
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

        require 'views/manajemen-user/tambah/mhs.php';
    }

    public function actionTambahMhs()
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
            $fotoProfile = $_POST['foto_profile'];

            $tabelMahasiswa = $this->data->addTabelUserMahasiswa($nama, $password, $status, $nim, $kelas, $noTelp, $alamat, $email, $namaAyah, $noTelpAyah, $namaIbu, $noTelpIbu, $fotoProfile);
            return $tabelMahasiswa;
        }
        require 'views/manajemen-user/tambah/mhs.php';
    }
    public function tambahDosen()
    {
        require 'views/manajemen-user/tambah/dosen.php';
    }
    public function actionTambahDosen()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST['nama'];
            $password = $_POST['password'];
            $status = $_POST['status'];
            $nip = $_POST['nip'];
            $noTelp = $_POST['no_telp'];
            $email = $_POST['email'];
            $id_kelas = $_POST['id_kelas'];
            $fotoProfile = $_POST['foto_profile'];

            $tabelDosen = $this->data->addTabelUserDosen($nama, $password, $status, $nip, $noTelp, $email, $id_kelas, $fotoProfile);
            return $tabelDosen;
        }
        require 'views/manajemen-user/tambah/dosen.php';
    }
    public function tambahKaryawan()
    {

        require 'views/manajemen-user/tambah/karyawan.php';
    }
    public function actionTambahKaryawan()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nip = $_POST['nip'];
            $password = $_POST['password'];
            $nama = $_POST['nama'];
            $status = $_POST['status'];
            $noTelp = $_POST['no_telp'];
            $email = $_POST['email'];
            $fotoProfile = $_POST['foto_profile'];

            $tabelKaryawan = $this->data->addTabelUserKaryawan($nama, $password, $status, $nip, $noTelp, $email, $fotoProfile);
            return $tabelKaryawan;
        }
        require 'views/manajemen-user/tambah/karyawan.php';
    }
}
