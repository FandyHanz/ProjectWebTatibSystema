<?php
include_once 'core/koneksi.php';
class Admin extends Koneksi
{
    public function __construct() {
        parent::__construct();
    }

    public function getTabelPelMhs()
    {
        $sql = "SELECT * FROM pelanggaran_mahasiswa";
        $result = $this->db->query($sql);
        return $result;
    }
    
    public function getTabelPelDosen() {
        $sql = "SELECT *
        FROM pelanggaran_tendik p
        JOIN dosen d
        ON d.nip = p.nip";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getTabelPelKaryawan() {
        $sql = "SELECT *
        FROM pelanggaran_tendik p
        JOIN karyawan k
        ON k.nip = p.nip";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getTabelUserMahasiswa() {
        $sql = "SELECT * FROM mahasiswa";
        $result = $this->db->query($sql);
        return $result;
    }
}