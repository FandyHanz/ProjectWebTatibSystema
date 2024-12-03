<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login e-TibPol</title>
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
        .login-container h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }
        .login-container img {
            width: 150px;
            margin-bottom: 20px;
        }
        .login-container .dropdown {
            margin: 20px 0;
        }
        .login-container select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-container p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>SELAMAT DATANG</h1>
        <img src="login/img/logo_polinema.png" alt="Polinema Logo">
        
        <div class="dropdown">
            <select id="role" onchange="redirectToPage()" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                <option value="" disabled selected>Pilih Role</option>
                <option value="login\login_mahasiswa.php">Mahasiswa</option>
                <option value="login\Login_Admin.php">Tenaga Kependidikan</option>
            </select>
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
