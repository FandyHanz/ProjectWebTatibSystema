<?php
class TendikController
{
    public function dashboard()
    {
        // Logika untuk halaman dashboard Tendik

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

            if($nama){
                $data = $report -> searchingName($nama, $kelas, $prodi, $option);
                return $data;
            } else if($nip){
                $data = $report -> searchingName($nip, $kelas, $prodi, $option);
                return $data;
            } else if ($nim){
                $data = $report -> searchingName($nim, $kelas, $prodi, $option);
                return $data;
            }
        }

        echo "Tendik Report";
    }

    public function history()
    {
        // Logika untuk halaman riwayat Tendik

        echo "Tendik History";
    }
}