<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website with Sidebar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/report/style.css">
</head>

<body>
    <!-- Sidebar -->
    <?php include 'assets/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <?php include 'assets/header.php'; ?>

        <!-- Content -->
        <div class="table-container">
            <h1>Formulir Laporan Pelanggaran Mahasiswa</h1>

            <!-- toggle button untuk navigasi table -->
            <div class="table-nav" data-toggle="buttons">
                <ul id="tab-nav">
                    <li class="nav-table-button active"><a href="#Mahasiswa"><img
                                src="../../assets/icon/student-icon.svg" class="icon" style="opacity: 1;"
                                alt="">Mahasiswa</a></li>
                    <li class="nav-table-button"><a href="#Dosen"><img src="../../assets/icon/teacher-icon.svg"
                                class="icon" style="opacity: 1;" alt="">Dosen</a></li>
                    <li class="nav-table-button"><a href="#Contact"><img src="../../assets/icon/karyawan-icon.svg"
                                class="icon" style="opacity: 1;" alt="">Karyawan</a></li>
                </ul>
            </div>
            <div class="line">
                <div class="line-active" id="line-active"></div>
            </div>

            <!-- Tempat untuk memuat konten tabel -->
            <div id="table-content-container" class="table-content-container text-center ">
                <!-- Konten tabel akan dimuat di sini -->

                <!-- =================================================================================================================== -->

                <div class="container-laporkan">
                    <form id="search-form">
                        <div class="container-laporkan">
                            <span class="masukkan-nama-header text-start" id="masukkan-nama-header">Masukkan Nama
                                Mahasiswa</span>

                            <div class="d-flex justify-content-center mt-4">
                                <div class="search-bar-container">
                                    <i class="bi bi-search"></i>
                                    <input style="height: 24px;" type="text" name="query" placeholder="" required>
                                </div>

                                <div class="filter-button" data-bs-toggle="dropdown">
                                    <i class="bi bi-funnel" style="font-size: 19px;"></i>
                                </div>

                                <div class="dropdown-menu d-none">
                                    <div class="mb-3 id=" filter-program-studi">
                                        <label><strong>Program Studi</strong></label>
                                        <div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="program_studi"
                                                    id="prodi1" value="D4 - Teknik Informatika">
                                                <label class="form-check-label" for="prodi1">D4 - Teknik
                                                    Informatika</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="program_studi"
                                                    id="prodi2" value="D4 - Sistem Informasi Bisnis">
                                                <label class="form-check-label" for="prodi2">D4 - Sistem Informasi
                                                    Bisnis</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="program_studi"
                                                    id="prodi3" value="D2 - Pengembangan Piranti Lunak">
                                                <label class="form-check-label" for="prodi3">D2 - Pengembangan Piranti
                                                    Lunak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 id=" filter-kelas">
                                        <label><strong>Kelas</strong></label>
                                        <select class="form-select-kelas" name="kelas">
                                            <option value=""></option>
                                            <option value="TI-2A">TI-2A</option>
                                            <option value="TI-2B">TI-2B</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label><strong>Urutkan Secara</strong></label>
                                        <select class="form-select-urut" name="urutkan">
                                            <option value="ascending">Ascending</option>
                                            <option value="descending">Descending</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3 mb-2">
                                <span style="font-size: 15px;">Cari Berdasarkan :</span>
                            </div>

                            <div class="mt-1" style="font-size: 16px;">
                                <input type="radio" name="search_by" value="nama" checked class="me-4" id="radio-nama">
                                Nama
                                <input type="radio" name="search_by" value="nim" class="ms-4 me-3" id="radio-nim">
                                <label for="radio-nim">NIM</label>
                            </div>

                            <button type="submit" class="mt-3 btn btn-outline-primary"
                                style="color: #007bff; border-color: #007bff; background-color: #fff; border-radius: 20px; width: 100%; max-width: 135px;">
                                Telusuri
                            </button>
                        </div>
                    </form>
                    <div id="recommendations" class="mt-3">
                        <!-- Hasil rekomendasi akan muncul di sini -->
                    </div>

                </div>
                <!-- =================================================================================================================== -->
            </div>
        </div>

        <!-- Footer -->
        <?php include 'assets/footer.php'; ?>

    </div>

    <script type="module">
        // Mengimpor dan menjalankan fungsi dari tabs.js
        import {
            initializeTabs
        } from './views/report/tabs.js';
        document.addEventListener('DOMContentLoaded', () => {
            initializeTabs(); // Menjalankan fungsi untuk menginisialisasi tab ketika selesai memuat strukutr html, tanpa menunggu lain2 seperti gambar dsb.
        });
    </script>
    <script src="views/report/script.js"></script>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>