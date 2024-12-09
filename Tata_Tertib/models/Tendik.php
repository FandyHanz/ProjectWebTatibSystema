<?php
include_once 'core/koneksi.php';
Class Tendik extends Koneksi{
    public function __construct(){
        parent :: __construct();
    }
    public function getTabelPelanggaranTendik(){
        $sql = "SELECT * FROM pelanggaran_tendik";
        $result = $this -> db -> query($sql);
        return $result;
    }

    public function getUserTendik(){
        $sql = "SELECT * FROM Karyawan";
        $result = $this -> db -> query($sql);
        return $result;
    }
}
?>
