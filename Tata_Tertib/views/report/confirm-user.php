<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website with Sidebar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/report/style.css">
    <link rel="stylesheet" href="../report/style.css">
    <style>
        .recommendation-item {
            padding: 5px;
            border-bottom: 1px solid #ddd;
            cursor: pointer;
        }

        .recommendation-item:hover {
            background-color: #f1f1f1;
        }
    </style>
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
            <div class="table-content mb-3">
                <div class="d-flex justify-content-center flex-row" style="gap: 20px;">
                    <div class="foto bg-secondary" style="height: 200px; width: 150px;">
                    </div>
                    <div class="text d-">
                        <p>Nama : <?php echo $results['nama'] ?></p>
                        <p>NIM : <?php echo $results['nim'] ?></p>
                        <p>Kelas : <?php echo $results['nama_kelas'] ?></p>
                        <a href="/reportMhsForm?nim=<?php echo $results['nim']; ?>&name=<?php echo $results['nama']; ?>" class="btn btn-danger">Report</a>
                        <a href="#" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
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