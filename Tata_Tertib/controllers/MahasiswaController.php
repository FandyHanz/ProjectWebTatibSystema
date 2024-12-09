<?php
class MahasiswaController extends Koneksi
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
