<?php
session_start();
include('../core/Session.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nip = $_POST['username']; // Ubah 'nipd' menjadi 'nip' untuk konsistensi
    $password = $_POST['password'];
    
    $db = new $pbl();
    $conn = $db->getConnection(); // Tambahkan titik koma di akhir baris ini

    $stmt = $conn->prepare("SELECT * FROM dosen WHERE nip = :nip");
    $stmt->bindParam(':nip', $nip); 
    $stmt->execute();
    
    $dosen = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($dosen && password_verify($password, $dosen['password'])) { 
        $session->set('is_login', true);
        $session->set('username', $dosen['nip']); 
        $session->set('level', $dosen['role']); 
        $session->commit();
        echo "Login Berhasil Teman";
        header('Location: ../dashboard_dpa', true, 302); 
        exit(); 
    } else {
        $session->setFlash('status', false);
        $session->setFlash('message', 'Username dan password salah.');
        $session->commit();
        echo "Login Gagal Teman";
        header('Location: ../login.php', true, 302); 
        exit(); 
    }
} else if (isset($_GET['act']) && $_GET['act'] == 'logout') { 
    $session->deleteAll();
    header('Location: ../login.php', true, 302); 
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Tenaga Pendidikan</title>
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

        .login-container a {
            color: #007bff;
            text-decoration: none;
        }

        .login-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <img src="../assets/img/logo_polinema.png" alt="Polinema Logo">
        <h2>Login Tenaga Pendidikan</h2>
        <form action="auth.php?act=login-tendik" method="post">
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <div class="dropdown">
                <select id="role" onchange="redirectToPage()" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                    <option value="" disabled selected>Pilih Role</option>
                    <option value="login-mahasiswa.php">Mahasiswa</option>
                    <option value="login-tendik.php">Tenaga Kependidikan</option>
                </select>
                <button type="submit">Login</button>
        </form>
        <p><a href="#">Lupa Password?</a></p>
    </div>

    <script>
        function redirectToPage() {
            const role = document.getElementById("role").value;
            if (role) {
                window.location.href = role;
            } else {
                alert("Please select a valid role.");
            }
        }
    </script>
</body>

</html>