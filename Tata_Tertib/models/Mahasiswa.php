<?php
include_once '../../../core/koneksi.php';

Class Mahasiswa extends Koneksi{
    public function __construct()
    {
        parent :: __construct();
    }

    public function getTablePelanggaranMahasiswa(){
        $sql = "SELECT * FROM pelanggaran_mahasiswa";
        $result = $this -> db -> query($sql);
        return $result;
    }

    public function getUserInfoMahasiswa(){
        $sql = "SELECT * FROM mahasiswa";
        $result = $this -> db -> query($sql);
        return $result;
    }
}
?>