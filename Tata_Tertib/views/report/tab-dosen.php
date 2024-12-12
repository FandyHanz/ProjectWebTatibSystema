<?php
// Membuat array yang menyimpan data tabel
include '../../models/Admin.php';
$obj = new Admin();
$data = $obj->getTabelPelMhs();
?>

<div class="d-flex justify-content-center align-items-center flex-column" style="width: 100%; height: 100%;">

    <!-- Elemen H1 -->
    <h1 id="title" class="mb-4" style="font-size: 35px;">Masukkan Data Dosen</h1>

    <!-- Input dan Radio Button -->
    <input type="text" class="form-control mb-2" style="width: 500px;" name="search" id="search" placeholder="Search">
    <h8>Cari Berdasarkan: </h8>
    <div class="radio d-flex flex-row justify-content-center align-items-center mb-4" style="gap: 30px;">
        <label>
            <input type="radio" name="tabel" value="NIM" checked>
            NIM
        </label>
        <label>
            <input type="radio" name="tabel" value="Nama">
            Nama
        </label>
    </div>

    <!-- Tombol -->
    <button class="btn btn-primary" type="submit" style="width: 150px;">Search</button>

</div>