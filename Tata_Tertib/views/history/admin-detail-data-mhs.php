<?php
include '../../core/Session.php';
include '../../models/Admin.php';
$session = new Session();
$obj = new Admin();
$nim = $_GET['nim'];

$data = $obj->getDetailMhs($nim);
$img= base64_encode($obj->getImgProfileMhs($nim));

$level = $session->get('level');
function getHeader($level) {
    switch ($level) {
        case '1':
            return 'dashboard-admin.php';
        case '2':
            return 'dashboard-dpa.php';
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
        <div class="table-container" style="overflow-y:auto;">
        <a href="<?=getHeader($level)?>" ?> <img src="../../assets/icon/x.svg" class="justify-self-end rounded-circle mt-3" style="position:absolute;top: 20px; right: 40px; width:20px;height:20px; font-size:10px; justify-content:center; justify-items:center; cursor:pointer; z-index:3; border-radius: 40px">  </a>
            <div class="modal-body d-flex flex-row p-0 m-0">
                <div class="lefside col-4 d-flex flex-column align-items-center">
                    <img class="xmx-auto mt-5" style="width: 200px; top: 130px; position:fixed;" alt="avatar" src="../../assets/foto-mahasiswa/contoh-profile.png" />
                </div>
                <div class="rightside col-8 p-4">
                    <h3 class="mb-0"><?= $data['nama_mahasiswa']; ?></h3>
                    <h9 class="mt-0 pt-0"><?= $data['status_mahasiswa']; ?></h9>
                    <br><br>
                    <h9 class="mt-0 pt-0">NIM: <?= $data['nim']; ?></h9><br>
                    <h9 class="mt-0 pt-0">Kelas: <?= $data['nama_kelas']; ?></h9><br>
                    <h9 class="mt-0 pt-0">No Telp : <?= $data['no_telp']; ?></h9><br>
                    <h9 class="mt-0 pt-0">Email: <?= $data['email_mahasiswa']; ?></h9><br>
                    <h9 class="mt-0 pt-0">Domisili: <?= $data['alamat']; ?></h9><br>
                    <br>
                    <h5>Data Keluarga</h5>
                    <h9 class="mt-0 pt-0">Nama Ayah: <?= $data['nama_ayah']; ?></h9><br>
                    <h9 class="mt-0 pt-0">No Telp Ayah: <?= $data['no_telp_ayah']; ?></h9><br>
                    <h9 class="mt-0 pt-0">Nama Ibu: <?= $data['nama_ibu']; ?></h9><br>
                    <h9 class="mt-0 pt-0">No Telp Ibu: <?= $data['no_telp_ibu']; ?></h9><br>
                    <br>
                    <h5>Data DPA</h5>
                    <h9 class="mt-0 pt-0">Nama: <?= $data['nama_dpa']; ?></h9><br>
                    <h9 class="mt-0 pt-0">NIP: <?= $data['nip_dpa']; ?></h9><br>
                    <h9 class="mt-0 pt-0">No Telp: <?= $data['no_telp_dpa']; ?></h9><br>
                    <h9 class="mt-0 pt-0">Email: <?= $data['email_dpa']; ?></h9><br>
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