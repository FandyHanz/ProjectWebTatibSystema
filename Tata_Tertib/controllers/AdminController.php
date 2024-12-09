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
    public function manajemenUserMhs()
    {
        // Logika untuk halaman manajemen user admin
        $tabelMahasiswa = $this->data->getTabelUserMahasiswa();

        // Passing variabel secara eksplisit
        require 'views/manajemen-user/manajemen-user-mhs.php';
    }
    public function manajemenUserDosen()
    {
        // Logika untuk halaman manajemen user admin
        $tabelDosen = $this->data->getTabelUserDosen();

        // Passing variabel secara eksplisit
        require 'views/manajemen-user/manajemen-user-dosen.php';
    }
    public function manajemenUserKaryawan()
    {
        // Logika untuk halaman manajemen user admin
        $tabelKaryawan = $this->data->getTabelUserKaryawan();
        // Passing variabel secara eksplisit
        require 'views/manajemen-user/manajemen-user-karyawan.php';
    }

    public function tambahMhs() {
        
        require 'views/manajemen-user/tambah/mhs.php';
    }
    public function tambahDosen() {

    }
    public function tambahKaryawan() {

    }
}