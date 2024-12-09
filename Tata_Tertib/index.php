<?php
session_start();

error_log(isset($_SESSION['is_login']) ? "Session is_login: " . $_SESSION['is_login'] : "Session is_login is not set.");

// Initialize controller

$controller = initialization();

// Route the request
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Routing
switch ($path) {
    case '/':
    case '/dashboard':
        $controller->dashboard();
        break;

    case '/dashboardDpa':
        $controller->dashboard_dpa();
        break;

    case '/report':
        $controller->report();
        break;
    case '/report/reportMhsAction':
        $controller->reportMhsAction();
        break;

    case '/history':
        $controller->history();
        break;

    case '/manajemenUserMhs':
        $controller->manajemenUserMhs();
        break;

    case '/manajemenUserDosen':
        $controller->manajemenUserDosen();
        break;

    case '/manajemenUserKaryawan':
        $controller->manajemenUserKaryawan();
        break;

    case '/tambahUserMhs':
        $controller->tambahMhs();
        break;

    case '/logout':
        header('Location: login/auth.php?act=logout');
        break;

    default:
        // Handle 404 error
        http_response_code(404);
        echo "404 Page Not Found";
        break;
}

function initialization()
{
    static $controller = null;

    if ($controller === null) {
        if (!$_SESSION['is_login']) {
            header('Location: login.php', true, 302);
            exit();
        }

        $level = $_SESSION['level'] ?? null;

        switch ($level) {
            case '1':
                include('controllers/AdminController.php');
                $controller = new AdminController();
                break;

            case '2':
                include('controllers/DpaController.php');
                $controller = new DpaController();
                break;

            case '3':
                include('controllers/TendikController.php');
                $controller = new TendikController();
                break;

            case '4':
                include('controllers/MahasiswaController.php');
                $controller = new MahasiswaController();
                break;

            default:
                header('Location: login/auth.php?act=logout');
                echo "Unauthorized";
                exit();
        }
    }

    return $controller;
}
