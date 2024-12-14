<?php
// Membuat endpoint untuk menangani pencarian

?>

<div class="d-flex justify-content-center align-items-center flex-column" style="width: 100%; height: 100%;">

    <!-- Elemen H1 -->
    <h1 id="title" class="mb-4" style="font-size: 35px;">Masukkan Data Mahasiswa</h1>

    <!-- Input dan Dropdown -->
    <form action="../../action/report/report-mhs-redirect.php" class="d-flex flex-column justify-content-center align-items-center">
        <div style="position: relative; width: 500px;">
            <input type="text" class="form-control mb-2" style="width: 100%;" name="input" id="search" placeholder="Search">
        </div>
        <!-- Radio Button -->
        <h8>Cari Berdasarkan: </h8>
        <div class="radio d-flex flex-row justify-content-center align-items-center mb-4" style="gap: 30px;">
            <label>
                <input type="radio" name="cari-berdasarkan" value="nim" checked>
                NIM
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
