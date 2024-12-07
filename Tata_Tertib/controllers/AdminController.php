<?php
include 'models/Admin.php';
class AdminController
{

    private $data;
    private $db;

    public function __construct()
    {
        include_once 'core/koneksi.php';
        // instansiasi objek
        $this->db = $db;
        $this->data = new Admin($db);
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
        // Logika untuk halaman riwayat admin

        echo "Admin History";
    }
    public function manajemenUser()
    {
        // Logika untuk halaman riwayat admin

        echo "Admin History";
    }
}
