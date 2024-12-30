<?php
include '../../core/Session.php';
include '../../models/Admin.php';
$session = new Session();
$obj = new Admin();
$nip = $_GET['nip'];

$data = $obj->getDetailKaryawan($nip);
$kelas = isset($data['nama_kelas']) ? $data['nama_kelas'] : '-';
$img = $obj->getImgProfileKaryawan($nip);

function getHeader($level)
{
    switch ($level) {
        case '1':
            return 'dashboard-admin.php';
        case '2':
            return 'href:dashboard-dpa.php';
    }
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
</head>

<body>
    <!-- Sidebar -->
    <?php include '../../assets/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <?php include '../../assets/header.php'; ?>

        <!-- Content -->
        <div class="table-container d-flex justify-content-center align-items-center" style="overflow-y:auto;">
            <div class="modal-body d-flex flex-row p-0 m-0">
                <div class="lefside col-4 d-flex flex-column align-items-center">
                <img class="mx-auto mt-5" style="width: 200px; top: 140px; position:fixed;" alt="avatar" src="data:image/jpeg;base64,<?= base64_encode($img) ?>" />
                </div>
                <div class="rightside col-8 p-4">
                    <h3 class="mb-0"><?= $data['nama']; ?></h3>
                    <h9 class="mt-0 pt-0"><?= $data['status']; ?></h9>
                    <br><br>
                    <h9 class="mt-0 pt-0">NIP: <?= $data['nip']; ?></h9><br>
                    <h9 class="mt-0 pt-0">No Telp : <?= $data['no_telp']; ?></h9><br>
                    <h9 class="mt-0 pt-0">Email : <?= $data['email']; ?></h9><br>
                </div>

            </div>
        </div>

        <!-- Footer -->
        <?php include '../../assets/footer.php'; ?>
    </div>
    <script src="script.js"></script>
    <!-- Jquery -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>