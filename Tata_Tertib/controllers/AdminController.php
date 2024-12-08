<?php
include 'models/Admin.php';

class AdminController
{
    private $data;

    public function __construct()
    {
        // instansiasi objek
        $this->data = new Admin();
    }

    public function dashboard()
    {
        // Logika untuk halaman dashboard admin

        $tableMhs = $this->data->getTabelPelMhs();

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
        $tableMhs = $this->data->getTabelPelMhs();

        require 'views/report/report.php';
    }

    public function history()
    {


        echo "Admin History";
    }
    public function manajemenUser()
    {
        // Logika untuk halaman manajemen user admin
        $tabelMahasiswa = $this->data->getTabelUserMahasiswa();
        
        $text = "TEST";
        // Passing variabel secara eksplisit
        require 'views/manajemen-user/manajemen-user.php';
    }
}