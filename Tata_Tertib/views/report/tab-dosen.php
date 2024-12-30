<?php
// Membuat array yang menyimpan data tabel
include '../../models/Admin.php';
$obj = new Admin();
$data = $obj->getTabelPelDosen();
?>

<div class="d-flex justify-content-center align-items-center flex-column" style="width: 100%; height: 100%;">

    <!-- Input dan Dropdown -->
    <h1 id="title" class="mb-4" style="font-size: 35px;">Masukkan Data Dosen</h1>

    <form action="../../action/report/report-dosen-redirect.php" class="d-flex flex-column justify-content-center align-items-center">
        <div style="position: relative; width: 500px;">
            <input type="text" class="form-control mb-2" style="width: 100%;" name="input" id="search" placeholder="Search">
        </div>
        <!-- Radio Button -->
        <h8>Cari Berdasarkan: </h8>
        <div class="radio d-flex flex-row justify-content-center align-items-center mb-4" style="gap: 30px;">
            <label>
                <input type="radio" name="cari-berdasarkan" value="nip" checked>
                NIP
            </label>
            <label>
                <input type="radio" name="cari-berdasarkan" value="nama">
                Nama
            </label>
        </div>
        <!-- Tombol -->
        <button class="btn btn-primary" type="submit" style="width: 150px;">Search</button>
    </form>
</div>