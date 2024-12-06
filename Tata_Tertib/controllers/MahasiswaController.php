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
        // Logika untuk halaman laporan Mahasiswa

        echo "Mahasiswa Report";
    }

    public function history()
    {
        // Logika untuk halaman riwayat Mahasiswa

        echo "Mahasiswa History";
    }
}
