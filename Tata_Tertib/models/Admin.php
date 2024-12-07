<?php
class Admin {
    private $db;
    
    public function __construct()
    {
        include_once('core/koneksi.php');
        $this->db = $db;
        $this->db->set_charset('utf8');
    }

    public function getTabelMhs() {
        $sql = "SELECT * FROM mahasiswa";
        $result = $this->db->query($sql);
        return $result;
    }
}
