<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website with Sidebar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/dashboard/style.css">
    <link rel="stylesheet" href="../style.css">
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
                        <a href="/dashboardAdmin"><img src="../../../assets/icon/house-icon.svg" alt=""> <span>Home</span></a>
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
                        <a href="../../history/mhs/history-mhs.php"><img src="../../../assets/icon/history-icon.svg" alt=""><span>History</span></a>
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
            <h1>List Pelanggaran Dosen</h1>

            <!-- toggle button untuk navigasi table -->
            <div class="table-nav" data-toggle="buttons">
                <ul id="tab-nav">
                    <li class="nav-table-button active"><a href="/dashboardAdmin"><img src="assets/icon/student-icon.svg" class="icon" style="opacity: 1;" alt="">Mahasiswa</a></li>
                    <li class="nav-table-button"><a href="/dashboardAdminTableDosen"><img src="assets/icon/teacher-icon.svg" class="icon" style="opacity: 1;" alt="">Dosen</a></li>
                    <li class="nav-table-button"><a href="/dashboardAdminTableKaryawan"><img src="assets/icon/karyawan-icon.svg" class="icon" style="opacity: 1;" alt="">Karyawan</a></li>
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
                <div class="scrollable-table">
                    <table class="custom-table">
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
                            <?php for ($i = 0; $i < count($dataMhs); $i++): ?>
                                <tr>
                                    <td><?= $i + 1 ?>.</td>
                                    <td><?= $dataMhs[$i]["nama_mahasiswa"]; ?></td>
                                    <td><?= $dataMhs[$i]["nim"]; ?></td>
                                    <td><?= $dataMhs[$i]["status_pelanggaran"]; ?></td>
                                    <td>2024-10-30, 15:39</td>
                                    <td><?= $dataMhs[$i]["kategori"]; ?></td>
                                    <td>
                                        <button class="btn btn-light">
                                            Option
                                            <img src="assets/icon/caret-down-icon.svg" style="width: 13px; height: 13px; margin-left: 5px" alt="">
                                        </button>
                                    </td>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <!-- Footer -->
        <footer class="footer text-center py-3">
            <p>&copy; 2024 Your Website</p>
        </footer>
    </div>

    <script src="script.js"></script>
</body>

</html>