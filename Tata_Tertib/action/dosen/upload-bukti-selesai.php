<?php
// Ambil file PDF dari form
include '../../models/Dpa.php';
$obj = new Dpa();

// Ambil ID dari URL
$id = $_GET['id']; // Ambil ID dari URL

// Periksa apakah file diunggah
if (isset($_FILES['bukti_selesai']) && $_FILES['bukti_selesai']['error'] == UPLOAD_ERR_OK) {
    // Baca konten file
    $fileContent = file_get_contents($_FILES['bukti_selesai']['tmp_name']);
    
    // Simpan ke database
    $obj->setBuktiSelesaiById($id, $fileContent);

    echo "File berhasil diunggah.";
} else {
    echo "Gagal mengunggah file.";
}

// Redirect kembali ke halaman sebelumnya
header("Location: ../../views/dashboard/dosen-kirim-bukti.php?id_pelanggaran=$id");