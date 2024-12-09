<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website with Sidebar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/dashboard/tendik/style.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
    <div class="sidebar-logo">
        <img src="../../../assets/icon/logo_polinema.png" alt="LogoPolinema">
        <p>Politeknik Negeri Malang</p>
    </div>
    <ul class="sidebar-menu">
        <li class="sidebar-nav">
            <div class="circle-outside">
                <div class="circle-inside">
                    <a href="../../../views/dashboard/tendik/dashboard-tendik.php"><img src="../../../assets/icon/house-icon.svg" alt=""> <span>Home</span></a>
                </div>
            </div>
        </li>
        <li class="sidebar-nav">
            <div class="circle-outside">
                <div class="circle-inside">
                    <a href="report.php"><img src="../../../assets/icon/warning-icon.svg" alt=""><span>Report</span></a>
                </div>
            </div>
        </li>
        <li class="sidebar-nav">
            <div class="circle-outside">
                <div class="circle-inside">
                    <a href="history.php"><img src="../../../assets/icon/history-icon.svg" alt=""><span>History</span></a>
                </div>
            </div>
        </li>
        <li class="sidebar-nav" style="display: <?= ($_SESSION['level'] == 1) ? 'block' : 'none'; ?>;">
            <div class="circle-outside">
            </div>
        </li>
        <li></li>
        <li></li>
        <li></li>   
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li><a href="/logout"><img src="../../../assets/icon/log-out-icon.svg" alt=""><span>Log Out</span></a></li>
    </ul>
</div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <header class="header d-flex align-items-center justify-content-between p-3">
    <div class="header-kiri">
        <img src="../../../assets/icon/menu-icon.svg" id="menu-toggle" alt="Menu">
        <p>Sistem Tata Tertib | Polinema</p>
    </div>
    <div class="header-kanan">
        <img src="../../../assets/foto-mhs/contoh-profile.png" alt="">
        <p>
            <!-- Diganti sql -->
            <span class="nama-header">Mahmoed Joendi M.</span><br> <!-- Nama -->
            <span class="status-header">Mahasiswa Aktif</span> <!-- Status -->
        </p>
    </div>
</header>

        <!-- Content -->
        <div class="table-container">
            <h1>List Pelanggaran Mahasiswa</h1>

            <!-- toggle button untuk navigasi table -->
            <div class="table-nav" data-toggle="buttons">
                <ul id="tab-nav">
                    <li class="nav-table-button active"><a href="#Mahasiswa"><img src="../../../assets/icon/student-icon.svg" class="icon" style="opacity: 1;" alt="">Pelanggaran Pribadi</a></li>
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
        <footer class="footer text-center py-3">
    <p>&copy; 2024 Your Website</p>
</footer>
    </div>

    <script type="module">
        // Mengimpor dan menjalankan fungsi dari tabs.js
        import {
            initializeTabs
        } from './tabs.js';
        document.addEventListener('DOMContentLoaded', () => {
            initializeTabs(); // Menjalankan fungsi untuk menginisialisasi tab
        });
    </script>
    <script src="views/dashboard/tendik/script.js"></script>
</body>

</html>