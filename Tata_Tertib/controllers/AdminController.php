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
        // Logika untuk halaman laporan admin

        echo "Admin Report";
    }

    public function history()
    {
        

        echo "Admin History";
    }
    public function manajemenUser()
    {
        // Logika untuk halaman riwayat admin

        echo "Admin History";
    }
}
