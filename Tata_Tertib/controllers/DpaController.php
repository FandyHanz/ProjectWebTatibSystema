<?php
class DpaController
{
    public function dashboard()
    {
        // Logika untuk halaman dashboard DPA

        require 'views/dashboard/dashboard.php';
    }

    public function report()
    {
        // Logika untuk halaman laporan DPA

        echo "DPA Report";
    }

    public function history()
    {
        // Logika untuk halaman riwayat DPA

        echo "DPA History";
    }
}
