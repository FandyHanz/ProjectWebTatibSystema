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
        <img src="img/logo_polinema.png" alt="Polinema Logo">
        <h2>Login Tenaga Pendidikan</h2>
        <form>
            <input type="text" id="username" placeholder="Username" required>
            <input type="password" id="password" placeholder="Password" required>
            <div class="dropdown">
            <select id="role" onchange="redirectToPage()" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                <option value="" disabled selected>Pilih Role</option>
                <option value="login_mahasiswa.php">Mahasiswa</option>
                <option value="Login_Admin.php">Tenaga Kependidikan</option>
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
            const username = document.getElementById("username").value;
            const password = document.getElementById("password").value;

            if (username && password) {
                alert(`Welcome, Tenaga Pendidikan! \nUsername: ${username}`);
            } else {
                alert("Please fill in all fields.");
            }
        }
    </script>
</body>
</html>
