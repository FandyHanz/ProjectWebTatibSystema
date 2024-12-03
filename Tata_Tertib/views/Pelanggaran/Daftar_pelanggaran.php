<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website with Sidebar</title>
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
            <h1>Formulir Laporan Pelanggaran Mahasiswa</h1>

            <!-- toggle button untuk navigasi table -->
            <div class="table-nav" data-toggle="buttons">
                <ul id="tab-nav">
                    <li class="nav-table-button active"><a href="#Mahasiswa"><img src="../../assets/icon/student-icon.svg" class="icon" style="opacity: 1;" alt="">Mahasiswa</a></li>
                    <li class="nav-table-button"><a href="#Dosen"><img src="../../assets/icon/teacher-icon.svg" class="icon" style="opacity: 1;" alt="">Dosen</a></li>
                    <li class="nav-table-button"><a href="#Contact"><img src="../../assets/icon/karyawan-icon.svg" class="icon" style="opacity: 1;" alt="">Karyawan</a></li>
                </ul>
            </div>
            <div class="line">
                <div class="line-active" id="line-active"></div>
            </div>

            <!-- Tempat untuk memuat konten tabel -->
            <div id="table-content-container" class="table-content-container text-center " >
                <!-- Konten tabel akan dimuat di sini -->

                <!-- =================================================================================================================== -->    

                <div class="container-laporkan">
                <span class="masukkan-nama-header text-start" id="masukkan-nama-header">Masukkan Nama Mahasiswa</span>

                 <div class="d-flex justify-content-center mt-4">
                    <!-- Search Bar -->
                    <div class="search-bar-container" >
                        <i class="bi bi-search"></i>
                            <input type="text" placeholder="">
                    </div>

                    <!-- Filter Button -->
                    <div class="filter-button" data-bs-toggle="dropdown">
                    <i class="bi bi-funnel" style="font-size: 19px;"></i>
                    </div>

                    <div class="dropdown-menu d-none">
                    <form>
                        <div class="mb-3">
                        <label><strong>Program Studi</strong></label>
                        <div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="program_studi" id="prodi1">
                            <label class="form-check-label" for="prodi1">D4 - Teknik Informatika</label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="program_studi" id="prodi2">
                            <label class="form-check-label" for="prodi2">D4 - Sistem Informasi Bisnis</label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="program_studi" id="prodi3">
                            <label class="form-check-label" for="prodi3">D2 - Pengembangan Piranti Lunak</label>
                            </div>
                        </div>
                        </div>
                        <div class="mb-3">
                        <label><strong>Kelas</strong></label>
                        <select class="form-select-kelas">
                            <option></option>
                            <option>TI-2A</option>
                            <option>TI-2B</option>
                        </select>
                        </div>
                        <div class="mb-3">
                        <label><strong>Urutkan Berdasarkan</strong></label>
                        <select class="form-select-urut">
                            <option>Nama</option>
                            <option>Tanggal</option>
                        </select>
                        </div>
                    </form>
                    </div>


                </div>
                
                <div  class="mt-3 mb-2">
                <span style="font-size: 19px;">Cari Berdasarkan :</span>
                </div>

                <!-- Radio buttons untuk filter berdasarkan Nama/NIM atau Nama/NIP -->
                <div class="mt-1" style="font-size: 20px;">
                    <input type="radio" name="searchBy" value="nama" checked class="me-4" id="radio-nama"> Nama
                    <input type="radio" name="searchBy" value="nim" class="ms-4 me-3" id="radio-nim"> 
                    <label for="radio-nim">NIM</label>
                </div>


                <!-- Button with Custom Styles -->
                <button type="button" class="mt-3 btn btn-outline-primary" style="color: #007bff; border-color: #007bff; background-color: #fff; border-radius: 20px; width: 100%; max-width: 135px;">
                    Telusuri
                </button>

                </div>
                <!-- =================================================================================================================== -->
            </div>
        </div>

        <!-- Footer -->
        <?php include '../../assets/footer.php'; ?>
        
    </div>

    <script type="module">
        // Mengimpor dan menjalankan fungsi dari tabs.js
        import {
            initializeTabs
        } from './tabs.js';
        document.addEventListener('DOMContentLoaded', () => {
            initializeTabs(); // Menjalankan fungsi untuk menginisialisasi tab ketika selesai memuat strukutr html, tanpa menunggu lain2 seperti gambar dsb.
        });
    </script>
    <script src="script.js"></script>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>