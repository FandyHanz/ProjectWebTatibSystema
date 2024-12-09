<?php
include 'models/Tendik.php';

class TendikController extends Koneksi
{

    private $data;
    public function __construct()
    {
        // instansiasi objek
        $this->data = new Tendik();
    }
    public function dashboard()
    {
        // Logika untuk halaman dashboard Mahasiswa
        $tabelPelanggaran = $this->data->getTabelPelanggaranTendik();

        require 'views/dashboard/dashboard.php';
    }

    public function dashboard_tendik()
    {
        // Logika untuk halaman dashboard DPA
        $tabelPelTendik = $this->data->getTabelPelanggaranTendik();

        require 'views/dashboard/tendik/dashboard-tendik.php';
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

        echo "Tendik Report";
    }

    public function history()
    {
        // Logika untuk halaman riwayat Tendik

        echo "Tendik History";
    }
}