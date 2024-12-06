<?php
class AdminController {
    public function dashboard() {
        // Logika untuk halaman dashboard admin

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