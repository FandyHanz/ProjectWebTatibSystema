<?php
// Membuat endpoint untuk menangani pencarian
if (isset($_GET['query'])) {
    include '../../models/Report.php';
    $obj = new Report();
    $searchQuery = $_GET['query'];

    // Mengambil data berdasarkan query (NIM atau Nama)
    $result = $obj->searchRekomendasiMahasiswa($searchQuery);
    echo json_encode($result);
    exit;
}
?>

<div class="d-flex justify-content-center align-items-center flex-column" style="width: 100%; height: 100%;">

    <!-- Elemen H1 -->
    <h1 id="title" class="mb-4" style="font-size: 35px;">Masukkan Data Mahasiswa</h1>

    <!-- Input dan Dropdown -->
    <form action="form-mhs.php" class="d-flex flex-column justify-content-center align-items-center">
        <div style="position: relative; width: 500px;">
            <input type="text" class="form-control mb-2" style="width: 100%;" name="search" id="search" placeholder="Search">
        </div>

        <!-- Radio Button -->
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
    </form>

</div>
