<?php
include('../core/Session.php');

$session = new Session();

if ($session->get('is_login') === true) {
    header('Location: /dashboard');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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
        <img src="..\assets\img\logo_polinema.png" alt="Polinema Logo">
        <form action="auth.php?act=login-mhs" method="post" id="form-login">
            <input type="text" id="username" placeholder="NIM">
            <input type="password" id="password" placeholder="Password">
            <div class="dropdown">
                <select id="role" onchange="redirectToPage()" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                    <option value="" disabled selected>Pilih Role</option>
                    <option value="login-mahasiswa.php">Mahasiswa</option>
                    <option value="login-tendik.php">Tenaga Kependidikan</option>
                </select>
                <button type="button" onclick="login()">Login</button>
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

        function login() {
            const nim = document.getElementById("nim").value;
            const password = document.getElementById("password").value;
            const role = document.getElementById("role").value;

            if (nim === "" || password === "") {
                alert("Please fill in all fields.");
                return;
            }

            const xhr = new XMLHttpRequest();
            xhr.open("POST", "login_proses.php");
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function() {
                if (xhr.status === 200) {
                    const response = xhr.responseText;
                    if (response === "success") {
                        if (role === "mahasiswa") {
                            window.location.href = "mahasiswa_dashboard.php";
                        } else if (role === "admin") {
                            window.location.href = "admin_dashboard.php";
                        }
                    } else {
                        alert("Invalid credentials");
                    }
                } else {
                    alert("An error occurred.");
                }
            };
            xhr.send(`nim=${nim}&password=${password}&role=${role}`);
        }
    </script>
</body>

</html>