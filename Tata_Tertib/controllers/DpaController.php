<?php
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nama = $_POST['nama'];
            $nip = $_POST['nip'];
            $nim = $_POST['nim'];
            $kelas = $_POST['kelas'];
            $prodi = $_POST['prodi'];
            $option = $_POST['option'];

            include 'models/Report.php';
            $report = new Report();

            if($option == 'nama'){
                $data = $report -> searchingName($nama, $kelas, $prodi, $option);
                return $data;
            } else if($option == 'nim'){
                $data = $report -> searchingName($nip, $kelas, $prodi, $option);
                return $data;
            } else if ($option == 'nim'){
                $data = $report -> searchingName($nim, $kelas, $prodi, $option);
                return $data;
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