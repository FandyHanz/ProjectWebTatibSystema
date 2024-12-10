<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website with Sidebar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="style.css">
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
                        <a href="dashboard.php">
                            <img src="../../../assets/icon/house-icon.svg" alt=""> 
                            <span>Home</span>
                        </a>
                    </div>
                </div>
            </li>
            <li class="sidebar-nav">
                <div class="circle-outside">
                    <div class="circle-inside">
                        <a href="Report.php">
                            <img src="../../../assets/icon/warning-icon.svg" alt=""> 
                            <span>Report</span>
                        </a>
                    </div>
                </div>
            </li>
            <li class="sidebar-nav">
                <div class="circle-outside">
                    <div class="circle-inside">
                        <a href="../../history/dpa/history-dpa.php">
                            <img src="../../../assets/icon/history-icon.svg" alt=""> 
                            <span>History</span>
                        </a>
                    </div>
                </div>
            </li>
            <li class="sidebar-nav" style="display: <?= ($_SESSION['level'] == 1) ? 'block' : 'none'; ?>;"></li>
            <li><a href="/logout">
                <img src="../../../assets/icon/log-out-icon.svg" alt="">
                <span>Log Out</span>
            </a></li>
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
                    <span class="nama-header">Mahmoed Joendi M.</span><br>
                    <span class="status-header">DPA</span>
                </p>
            </div>
        </header>

        <div class="table-container">
            <h1>Daftar Pelanggaran Kelas</h1>

            <!-- Toggle button for table navigation -->
            <div class="table-nav" data-toggle="buttons">
                <ul id="tab-nav" class="nav nav-tabs">
                    <li class="nav-table-button active">
                        <a href="#Mahasiswa" class="nav-link">
                            <img src="../../../assets/icon/student-icon.svg" class="icon" alt="">
                            Mahasiswa
                        </a>
                    </li>
                    <li class="nav-table-button">
                        <a href="#Dosen" class="nav-link">
                            <img src="../../../assets/icon/teacher-icon.svg" class="icon" alt="">
                            Pelanggaran Pribadi
                        </a>
                    </li>
                </ul>
            </div>
            <div class="line">
                <div class="line-active" id="line-active"></div>
            </div>

            <!-- Filter Section -->
            <div class="filter d-flex flex-row justify-content-between align-items-center mx-auto mb-4">
                <div class="filter-button" id="filter-button">
                    <a href="#" class="btn btn-light d-inline-flex" style="gap:10px;">
                        <img src="../../../assets/icon/book-open-icon.svg" alt=""> Program Studi
                        <img src="../../../assets/icon/caret-down-icon-filter.svg" alt="">
                    </a>
                    <a href="#" class="btn btn-light d-inline-flex" style="gap:10px;">
                        <img src="../../../assets/icon/classroom-icon.svg" alt="">Kelas
                        <img src="../../../assets/icon/caret-down-icon-filter.svg" alt="">
                    </a>
                    <a href="#" class="btn btn-light d-inline-flex" style="height: 38px;">
                        <img src="../../../assets/icon/filter-icon.svg" alt="">
                    </a>
                </div>
                <div class="search">
                    <form action="">
                        <div class="form-group">
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                    </form>
                </div>
            </div>

            <!-- Table Content -->
            <div id="table-content-container" class="table-content-container">
                <div class="scrollable-table">
                    <table class="custom-table" id="table-data">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Status</th>
                                <th>Tanggal/Waktu</th>
                                <th>Kategori</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
    <?php if (!empty($kelas)) : ?>
        <?php foreach ($tabelDosen as $index => $kelas) : ?>
            <tr>
                <td><?= $index + 1; ?></td>
                <td><?= htmlspecialchars($kelas['nama'] ?? '-'); ?></td>
                <td><?= htmlspecialchars($kelas['nim'] ?? '-'); ?></td>
                <td><?= htmlspecialchars($kelas['status'] ?? '-'); ?></td>
                <td><?= htmlspecialchars($kelas['tanggal_date'] ?? '-'); ?></td>
                <td><?= htmlspecialchars($kelas['kategori_date'] ?? '-'); ?></td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Option
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Lampiran</a></li>
                            <li><a class="dropdown-item" href="#">Konfirmasi Bukti</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="7" class="text-center">Tidak ada data mahasiswa yang tersedia.</td>
        </tr>
    <?php endif; ?>
</tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer text-center py-3"></footer>

    <!-- Scripts -->
    <script type="module">
        import { initializeTabs } from './tabs.js';

        document.addEventListener('DOMContentLoaded', () => {
            initializeTabs();
        });
    </script>
    <script src="script.js"></script>
</body>

</html>
