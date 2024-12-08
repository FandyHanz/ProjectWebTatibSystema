<?php
class MahasiswaController
{
    public function dashboard()
    {
        // Logika untuk halaman dashboard Mahasiswa

        require 'views/dashboard/dashboard.php';
    }

    public function report()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nama = $_POST['nama'];
            $nip = $_POST['nip'];
            $kelas = $_POST['kelas'];
            $prodi = $_POST['prodi'];
            $option = $_POST['option'];

            include 'models/Report.php';
            $report = new Report();

            if($nama){
                $data = $report -> searchingName($nama, $kelas, $prodi, $option);
                return $data;
            } else if($nip){
                $data = $report -> searchingName($nip, $kelas, $prodi, $option);
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
