<?php
include('core/Session.php');
include('core/Koneksi.php');

$session = new Session();
$koneksi = new Koneksi(); // Akan menggunakan nilai default
$db = $koneksi->db;

if ($session->get('is_login') === true) {
    switch ($session->get('level')) {
        case '1':
            header('Location: views/dashboard/dashboard-admin.php');
            break;
        case '2':
            header('Location: views/dashboard/dashboard-dpa.php');
            break;
        case '3':
            header('Location: views/dashboard/dashboard-karyawan.php');
            break;
        case '4':
            header('Location: views/dashboard/dashboard-mhs.php');
            break;
        case '5':
            header('Location: views/dashboard/dashboard-dosen.php');
            break;
        default:
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="/assets/icon/logo_polinema.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        .login-container img {
            width: 150px;
            /* Ukuran logo diperbesar */
            margin-bottom: 20px;
        }

        .login-container input {
            width: calc(100% - 40px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-container button:hover {
            background-color: #0056b3;
        }

        .dropdown {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h3>SISTEM TATA TERTIB POLINEMA</h3>
        <img src="assets/icon/logo_polinema.png" alt="Polinema Logo">
        <?php
        $status = $session->getFlash('status');
        if ($status === false) {
            $message = $session->getFlash('message');
            echo '<div class="alert alert-warning">' . $message .
                '<span aria-hidden="true"></span></div>';
        }
        ?>
        <form action="action/auth.php" method="post" id="form-login">
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <div class="dropdown">
                <select id="act" name="act" style="width: 332px; padding: 10px; margin-bottom: 25px; border: 1px solid #ccc; border-radius: 5px;" required>
                    <option value="" disabled selected>Pilih Role</option>
                    <option value="login-mhs">Mahasiswa</option>
                    <option value="login-tendik">Tenaga Kependidikan</option>
                </select>
            </div>
            <button type="submit">Login</button>
        </form>
        <p><a href="#">Lupa Password?</a></p>
    </div>

</body>

</html>