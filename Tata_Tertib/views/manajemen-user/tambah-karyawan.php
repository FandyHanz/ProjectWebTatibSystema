<?php
include_once '../../models/Admin.php';
include '../../core/Session.php';
$session = new Session();
$admin = new Admin();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $nip = $_POST['nip'];
    $noTelp = $_POST['no_telp'];
    $email = $_POST['email'];
    $fotoProfile = base64_encode(file_get_contents($_FILES['foto_profile']['tmp_name']));

    $result = $admin -> addTabelUserKaryawan($nama, $password, $status, $nip, $noTelp, $email, $fotoProfile);
    header("Location:manajemen-user.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../../assets/icon/logo_polinema.png" type="image/png">
<title>Sistem Tata Tertib | Polinema</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .form-group {
            gap: 35px
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <?php include '../../assets/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <?php
        include '../../assets/header.php';
        ?>
        <div class="table-container p-4 pb-0" style="overflow-y: auto;">
            <h4 class="mb-4">Input Data Karyawan</h4>
            <form action="" method="post">
                <div class="baris-satu d-flex flex-row mb-3">
                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="nama">Nama:</label>
                    </div>
                    <input class="col-3" type="text" id="nama" name="nama" required>
                    <div class="col-2"></div>
                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="nim">NIP:</label>
                    </div>
                    <input class="col-3" type="text" id="nip" name="nip" required>
                </div>
                <div class="baris-dua d-flex flex-row mb-3">
                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="no_telp">No Telepon:</label>
                    </div>
                    <input class="col-3" type="text" id="no_telp" name="no_telp" required>
                    <div class="col-2"></div>
                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="password">Password:</label>
                    </div>
                    <input class="col-3" type="text" id="status" name="password" required>
                </div>
                <div class="baris-tiga d-flex flex-row mb-3">
                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="email">Email:</label>
                    </div>
                    <input class="col-3" type="text" id="email" name="email" required>
                    
                    <div class="col-2"></div>

                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="nim">Status:</label>
                    </div>
                    <input class="col-3" type="text" id="status" name="status" required>
                </div>
                <div class="baris-tiga d-flex flex-row mb-3">
                    <div class="form-group col-2 d-flex flex-row ">
                        <label for="formFile" class="form-label">Foto Profil</label>
                    </div>
                    <input class="form-control" type="file" id="formFile" name="foto_profile" required accept="image/jpeg,">

                    <div class="col-2"></div>

                    <div class="form-group col-5 d-flex flex-row ">
                    </div>

                </div>

                <div class="baris-tiga d-flex flex-row col-12 justify-content-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
        <?php
        include '../../assets/footer.php';
        ?>
    </div>
    <script src="../views/dashboard/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>