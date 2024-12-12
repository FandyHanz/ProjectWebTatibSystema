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
            <h1 class="p-3">Formulir Laporan Pelanggaran Mahasiswa</h1>

            <div class="d-flex flex-column">
                <div class="form d-flex flex-row">
                    <div class="left d-flex flex-column justify-content-center align-center">
                        <div class="photo bg-primary" style="height: 200px; width: 100px;"></div>
                        <p>23417230123</p>
                    </div>
                    <div class="">
                        <p>Tingkat :
                            <select class="form-select" id="tingkat" name="tingkat" aria-label="Select Tingkat">
                                <option value="" disabled selected></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </p>
                        <p>Pelanggaran :
                            <select class="form-select" id="tingkat" name="tingkat" aria-label="Select Tingkat">
                                <option value="" disabled selected></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </p>
                        <p>Lampiran : </p>
                    </div>
                </div>
                <div class="buttons"></div>
            </div>

        </div>

        <!-- Footer -->
        <?php include '../../assets/footer.php'; ?>
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