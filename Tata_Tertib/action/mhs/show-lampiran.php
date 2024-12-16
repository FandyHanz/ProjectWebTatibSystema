<?php
// Ambil file PDF dari database
include '../../models/Dpa.php';
$obj = new Dpa();
$id = $_GET['id']; // Ambil ID file dari URL
$data = $obj->getBuktiSelesaiMhs($id);
$fileContent = $data['lampiran'];

if ($fileContent) {
    // Atur header HTTP untuk PDF
    header("Content-Type: application/pdf");
    echo $fileContent; // Kirim isi file langsung ke browser
} else {
    echo "File tidak ditemukan.";
}
?>