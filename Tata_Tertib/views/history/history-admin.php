<?php
include '../../core/Session.php';
$session = new Session();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../../assets/icon/logo_polinema.png" type="image/png">
<title>Sistem Tata Tertib | Polinema</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Sidebar -->
    <?php include '../../assets/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <?php include '../../assets/header.php'; ?>

        <!-- Content -->
        <div class="table-container">
            <h1 class="m-4 mb-1">List Pelanggaran <span id="title-table">Mahasiswa</span></h1>

            <!-- toggle button untuk navigasi table -->
            <div class="table-nav" data-toggle="buttons">
                <ul id="tab-nav">
                    <li class="nav-table-button active"><a href="#Mahasiswa"><img src="../../assets/icon/student-icon.svg" class="icon" style="opacity: 1;" alt=""><span class="title-btn">Mahasiswa</span class="title-btn"></a></li>
                    <li class="nav-table-button"><a href="#Dosen"><img src="../../assets/icon/teacher-icon.svg" class="icon" style="opacity: 1;" alt=""><span class="title-btn">Dosen</span class="title-btn"></a></li>
                    <li class="nav-table-button"><a href="#Karyawan"><img src="../../assets/icon/karyawan-icon.svg" class="icon" style="opacity: 1;" alt=""><span class="title-btn">Karyawan</span class="title-btn"></a></li>
                    <!-- <li class="nav-table-button"><a href="#Karyawan"><img src="../../assets/icon/karyawan-icon.svg" class="icon" style="opacity: 1;" alt=""><span class="title-btn">Karyawan</span class="title-btn"></a></li> -->
                </ul>
            </div>
            <div class="line">
                <div class="line-active" id="line-active"></div>
            </div>

            <!-- Tempat untuk memuat konten tabel -->
            <div id="table-content-container" class="table-content-container">
                <!-- Konten tabel akan dimuat di sini -->
            </div>
        </div>

        <!-- Footer -->
        <?php include '../../assets/footer.php'; ?>
    </div>

    <script type="module">
        // Mengimpor dan menjalankan fungsi dari tabs.js
        import {
            initializeTabs
        } from './admin-tabs.js';
        document.addEventListener('DOMContentLoaded', () => {
            initializeTabs(); // Menjalankan fungsi untuk menginisialisasi tab
        });
    </script>
    <script src="script.js"></script>
    <!-- Jquery -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>