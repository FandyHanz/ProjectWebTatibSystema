<?php
include_once '../../core/Koneksi.php';

class Karyawan extends Koneksi
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getLampiranById($id_pel)
    {
        $sql = "SELECT * FROM pelanggaran_tendik WHERE id_pelanggaran_tendik = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("s", $id_pel);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
