<?php
include 'models/Dpa.php';

class DpaController 
{
    private $data;

    public function __construct()
    {
        // Instansiasi objek
        $this->data = new Dpa();
    }

    public function dashboard_dpa()
    {
        // Logika untuk halaman dashboard DPA
        $tableDpa = $this->data->getTabelPelDosen();

        require 'views/dashboard/dashboard_dpa/dasboard.php';
    }

    public function dashboard()
    {
        // Logika untuk halaman dashboard DPA
        require 'views/dashboard/dashboard.php';
    }

    public function report()
    {
        $data = null; // Inisialisasi variabel data

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = $_POST['nama'] ?? '';
            $nip = $_POST['nip'] ?? '';
            $nim = $_POST['nim'] ?? '';
            $kelas = $_POST['kelas'] ?? '';
            $prodi = $_POST['prodi'] ?? '';
            $option = $_POST['option'] ?? '';

            include 'models/Report.php';
            $report = new Report();

            // Validasi input
            if (!empty($kelas) && !empty($prodi)) {
                if ($option == 'nama') {
                    $data = $report->searchingName($nama, $kelas, $prodi, $option);
                } elseif ($option == 'nip') {
                    $data = $report->searchingName($nip, $kelas, $prodi, $option);
                } elseif ($option == 'nim') {
                    $data = $report->searchingName($nim, $kelas, $prodi, $option);
                }
            }
        }

        require 'views/report/report.php';
        // Jika Anda ingin menampilkan data di sini, Anda bisa melakukannya
        // echo "DPA Report"; // Ini bisa dihapus jika tidak diperlukan
    }

    public function history()
    {
        // Logika untuk halaman riwayat DPA
        echo "DPA History";
    }
}