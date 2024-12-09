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
    <div id="sidebar" class="sidebar">
        <div class="sidebar-logo">
            <img src="../../../assets/icon/logo_polinema.png" alt="LogoPolinema">
            <p>Politeknik Negeri Malang</p>
        </div>
        <ul class="sidebar-menu">
            <li class="sidebar-nav">
                <div class="circle-outside">
                    <div class="circle-inside">
                        <a href="/views/dashboard/mhs/dashboard-mhs.php"><img src="../../../assets/icon/house-icon.svg" alt=""> <span>Home</span></a>
                    </div>
                </div>
            </li>
            <li class="sidebar-nav">
                <div class="circle-outside">
                    <div class="circle-inside">
                        <a href="Report.php"><img src="../../../assets/icon/warning-icon.svg" alt=""><span>Report</span></a>
                    </div>
                </div>
            </li>
            <li class="sidebar-nav">
                <div class="circle-outside">
                    <div class="circle-inside">
                        <a href=""><img src="../../../assets/icon/history-icon.svg" alt=""><span>History</span></a>
                    </div>
                </div>
            </li>
            <li class="sidebar-nav" style="display: <?= ($_SESSION['level'] == 1) ? 'block' : 'none'; ?>;">
                <div class="circle-outside">
                    <div class="circle-inside">
                    </div>
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
                    <span class="status-header">DPA</span> <!-- Status -->
                </p>
            </div>
        </header>
        <div class="table-container">
            <h1>List Pelanggaran DPA</h1>

            <!-- Toggle button for table navigation -->
            <div class="table-nav" data-toggle="buttons">
                <ul id="tab-nav" class="nav nav-tabs">
                    <li class="nav-table-button active"><a href="#Mahasiswa" class="nav-link"><img src="../../../assets/icon/student-icon.svg" class="icon" alt="">Pelanggaran Pribadi</a></li>
                    <li class="nav-table-button"><a href="#Kelas" class="nav-link"><img src="../../../assets/icon/teacher-icon.svg" class="icon" alt="">Kelas</a></li>
                </ul>
            </div>
            <div class="line">
                <div class="line-active" id="line-active"></div>
            
                        </div>
                    </form>
                </div>
            </div>

            <!-- Container for loading table content -->
            <div id="table-content-container" class="table-content-container">
                <!-- Table content will be loaded here -->
            </div>
        </div>

       
    </div>

    <!-- Scripts -->
    <script type="module">
        // Import and run functions from tabs.js
        import {
            initializeTabs
        } from './views/dashboard/tabs.js';

        document.addEventListener('DOMContentLoaded', () => {
            initializeTabs(); // Initialize tab functionality

            const tabs = document.querySelectorAll(".nav-table-button a"); // All tabs
            const filterButton = document.getElementById("filter-button"); // Filter button element
        });
    </script>

    <!-- Include additional scripts -->
    <script src="views/dashboard/script.js"></script>

</body>

</html>