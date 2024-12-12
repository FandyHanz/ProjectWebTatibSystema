<?php
include '../../models/Admin.php';

$data = new Admin();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $password = $_POST['password'];
    $kelas = $_POST['kelas'];
    $status = $_POST['status'];
    $noTelp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $namaAyah = $_POST['nama_ayah'];
    $noTelpAyah = $_POST['no_telp_ayah'];
    $namaIbu = $_POST['nama_ibu'];
    $noTelpIbu = $_POST['no_telp_ibu'];
    $fotoProfile = $_POST['foto_profile'];

    $tabelMahasiswa = $data->addTabelUserMahasiswa($nama, $password, $status, $nim, $kelas, $noTelp, $alamat, $email, $namaAyah, $noTelpAyah, $namaIbu, $noTelpIbu, $fotoProfile);
    return $tabelMahasiswa;
}
require '../views/manajemen-user/manajemen-user.php';