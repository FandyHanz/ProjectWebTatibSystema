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
        // Logika untuk halaman laporan Tendik

        echo "Tendik Report";
    }

    public function history()
    {
        // Logika untuk halaman riwayat Tendik

        echo "Tendik History";
    }
}