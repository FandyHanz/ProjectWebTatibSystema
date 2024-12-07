<?php
include 'models/Admin.php';
class AdminController {
    private $data;

    public function __construct() {
        $this->data = new Admin();
    }
    public function dashboard() {
        // Logika untuk halaman dashboard admin

        $table = $this->data->getTabelMhs();
        $dummy = "ASODKASODKASODKASDOKASODKADOKASDOKASDOASDK";

        require 'views/dashboard/dashboard.php';
    }

    public function report() {
        // Logika untuk halaman laporan admin

        echo "Admin Report";
    }

    public function history() {
        // Logika untuk halaman riwayat admin

        echo "Admin History";
    }
    public function manajemenUser() {
        // Logika untuk halaman riwayat admin

        echo "Admin History";
    }
}
?>