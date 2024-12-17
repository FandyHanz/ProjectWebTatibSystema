<?php
require_once '../../models/Admin.php';
include '../../core/Session.php';
$session = new Session();
$admin = new Admin();
$kelas = $admin->getKelasMhs();
$id = $_GET['nip'];
$edit = $admin -> reaByIdDosen($id);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama = $_POST['nama'];
    $noTelp = $_POST['no_telp'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $kelas = $_POST['kelas'];
    $fotoProfil = $_POST['foto_profile'];
    $addDosen = $admin -> editDosen($password, $nama, $status, $noTelp, $email, $kelas, $fotoProfil, $id);

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
            <h4 class="mb-4">Input Data Dosen</h4>
            <form action="" method="post">
                <div class="baris-satu d-flex flex-row mb-3">
                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="nama">Nama:</label>
                    </div>
                    <input class="col-3" type="text" id="nama" name="nama" required>
                    <div class="col-2"></div>
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
                        <label class="" for="status">Status:</label>
                    </div>
                    <input class="col-3" type="text" id="status" name="status" required>
                </div>
                <div class="baris-empat d-flex flex-row mb-3">
                    <div class="form-group col-2 d-flex flex-row">
                        <label class="" for="nama">Kelas:</label>
                    </div>
                    <select class="form-select" id="kelas" name="kelas">
                        <?php
                        foreach ($kelas as $row) {
                            echo '<option value="' . $row['id_kelas'] . '">' . $row['nama'] . '</option>';
                            echo '<option value="' ."". '">' . "" . '</option>';
                        }
                        ?>
                    </select>

                    <div class="col-2"></div>

                    <div class="form-group col-5 d-flex flex-row ">

                    </div>

                </div>
                <div class="baris-lima d-flex flex-row mb-3">
                    <div class="form-group col-2 d-flex flex-row ">
                        <label for="formFile" class="form-label">Foto Profil</label>
                    </div>
                    <input class="form-control" type="file" id="formFile" accept="image/png," name="foto_profile" required>

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