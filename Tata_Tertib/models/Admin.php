<?php
class Admin
{
    private $db;
    public function __construct($db) {
        $this->db = $db;
    }

    public function getTabelPelMhs()
    {
        include 'core/koneksi.php';
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
}