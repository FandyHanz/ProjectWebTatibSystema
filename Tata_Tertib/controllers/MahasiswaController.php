<?php
include_once 'models/Mahasiswa.php';

class MahasiswaController
{
    private $data;
    public function __construct()
    {
        // instansiasi objek
        $this->data = new Mahasiswa();
    }
    public function dashboard()
    {
        // Logika untuk halaman dashboard Mahasiswa
        $tabelPelanggaran = $this->data->getTablePelanggaranMahasiswa();

        require 'views/dashboard/dashboard.php';
    }

    public function dashboard_mhs()
    {
        // Logika untuk halaman dashboard DPA

        require 'views/dashboard/mhs/dashboard-mhs.php';
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
        echo "Mahasiswa Report";
    }

    public function history()
    {
        // Logika untuk halaman riwayat Mahasiswa

        echo "Mahasiswa History";
    }
}
