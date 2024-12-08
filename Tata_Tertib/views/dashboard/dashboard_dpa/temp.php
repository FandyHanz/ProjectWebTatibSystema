<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website with Sidebar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/dashboard/style.css">
</head>

<body>
    <!-- Sidebar -->
    <?php include 'assets/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <?php
        include 'assets/header.php'; ?>

        <div class="table-container">
            <h1>List Pelanggaran Mahasiswa</h1>

            <!-- toggle button untuk navigasi table -->
            <div class="table-nav" data-toggle="buttons">
                <ul id="tab-nav">
                    <li class="nav-table-button active"><a href="#Mahasiswa"><img src="assets/icon/student-icon.svg" class="icon" style="opacity: 1;" alt="">Mahasiswa</a></li>
                    <li class="nav-table-button"><a href="#Dosen"><img src="assets/icon/teacher-icon.svg" class="icon" style="opacity: 1;" alt="">Dosen</a></li>
                    <li class="nav-table-button"><a href="#Contact"><img src="assets/icon/karyawan-icon.svg" class="icon" style="opacity: 1;" alt="">Karyawan</a></li>
                </ul>
            </div>
            <div class="line">
                <div class="line-active" id="line-active"></div>
            </div>

            <div class="filter d-flex flex-row justify-content-between align-items-center mx-auto mb-4">
                <div class="filter-button" id="filter-button">
                    <a href="#" class="btn btn-light d-inline-flex" style="gap:10px;">
                        <img src="assets/icon/book-open-icon.svg" alt=""> Program Studi
                        <img src="assets/icon/caret-down-icon-filter.svg" alt="">
                    </a>
                    <a href="#" class="btn btn-light d-inline-flex" style="gap:10px;"><img src="assets/icon/classroom-icon.svg" alt="">Kelas<img src="assets/icon/caret-down-icon-filter.svg" alt=""></a>
                    <a href="#" class="btn btn-light d-inline-flex" style="height: 38px;"><img src="assets/icon/filter-icon.svg" alt=""></a>
                </div>
                <div class="search">
                    <form action="">
                        <div class="form-group">
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tempat untuk memuat konten tabel -->
            <div id="table-content-container" class="table-content-container">
                <!-- Konten tabel akan dimuat di sini -->
            </div>
        </div>

        <?php
        // Footer
        include 'assets/footer.php';
        ?>
    </div>
    <script type="module">
        // Mengimpor dan menjalankan fungsi dari tabs.js
        import {
            initializeTabs
        } from './views/dashboard/tabs.js';
        document.addEventListener('DOMContentLoaded', () => {
            initializeTabs(); // Menjalankan fungsi untuk menginisialisasi tab

            const tabs = document.querySelectorAll(".nav-table-button a"); // Semua tab
            const filterButton = document.getElementById("filter-button"); // Elemen filter-button
        });
    </script>

    <script src="views/dashboard/script.js"></script>

</body>

</html>