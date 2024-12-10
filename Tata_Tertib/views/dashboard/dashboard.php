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
        include 'assets/header.php';

        // Content
        switch ($_SESSION['level']) {
            case '1':
                # code...
                header('Location: /dashboardAdmin');
                break;
            case '2':
                header('location: /dashboardDpa');
                # code...
                break;
            case '3':
                header('location: /dashboardTendik');
                # code...
                break;
            case '4':
                header('location: /dashboardMhs');
                # code...
                break;
            default:
                echo "Error: Invalid level";
                break;
        }

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