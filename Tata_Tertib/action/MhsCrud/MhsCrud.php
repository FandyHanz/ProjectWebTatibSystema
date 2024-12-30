<?php
include '../../models/Admin.php';



if (isset($_POST['upload'])) {
    // Direktori tujuan untuk menyimpan file yang diunggah
    $targetDir = "../../assets/foto-mhasiswa"; // Ganti sesuai kebutuhan
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true); // Membuat folder jika belum ada
    }

    // Ambil informasi file yang diunggah
    $fileName = basename($_FILES['file']['name']);
    $targetFilePath = $targetDir . $fileName;

    // Ekstensi file yang diperbolehkan
    $allowedFileTypes = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx'];

    // Validasi ekstensi file
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    if (in_array(strtolower($fileType), $allowedFileTypes)) {
        // Pindahkan file ke folder tujuan
        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
            echo "File berhasil diunggah ke: " . $targetFilePath;
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file.";
        }
    } else {
        echo "Maaf, hanya file dengan ekstensi berikut yang diperbolehkan: " . implode(", ", $allowedFileTypes);
    }
} else {
    echo "Tidak ada file yang diunggah.";
}

