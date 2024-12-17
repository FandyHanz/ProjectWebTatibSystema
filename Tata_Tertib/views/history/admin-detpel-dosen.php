<?php
include '../../core/Session.php';
include '../../models/Admin.php';
$session = new Session();
$obj = new Admin();
$id_pelanggaran_dosen = $_GET['id_pelanggaran_dosen'];

$data = $obj->getDosenWithNip($id_pelanggaran_dosen);
$level = $session->get('level');
$img= base64_encode($obj->getImgProfileDosen($nip));

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
        .textarea {
            border: none;
            background-color: #FAFAFC;
            border-radius: 10px;
            overflow-y: auto;
        }
    </style>
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
            <a href="../../index.php" ?> <img src="../../assets/icon/x.svg" class="justify-self-end rounded-circle mt-3" style="position:absolute; right: 40px; width:20px;height:20px; font-size:10px; justify-content:center; justify-items:center; cursor:pointer; z-index:3; border-radius: 40px"> </a>
            <div class="modal-body d-flex flex-row p-0 m-0">
                <div class="lefside col-4 d-flex flex-column align-items-center">
                    <img class="xmx-auto mt-5" style="width: 200px; top: 130px; position:fixed;" alt="avatar" src="../../assets/foto-mahasiswa/contoh-profile.png" />
                </div>
                <div class="rightside col-8 p-4">
                    <h3 class="mb-0"><?= $data['nama']; ?></h3>
                    <h9 class="mt-0 pt-0">NIP: <?= $data['nip']; ?></h9><br>
                    <br>
                    <h9 class="mt-0 pt-0">Pelanggaran : <?= $data['nama_pelanggaran'] ?></h9><br>
                    <h9 class="mt-0 pt-0">Deskripsi :</h9><br>
                    <textarea class="textarea p-2" name="" id="" cols="90" rows="3" readonly disabled><?= $data['deskripsi'] ?></textarea><br><br>
                    <div class="container d-flex flex-row p-0">
                        <div class="" style="margin-right: 100px;">
                            <h9 class="mt-0 pt-0">Lampiran :</h9><br>
                            <a class="lampiran-btn btn btn-light align-items-center justify-content-center" href="../../action/dosen/show-lampiran.php?id=<?= $data['id_pelanggaran_dosen']?>" target="_blank" style="border-color: #D9D9D9;color:#4A4A4A"><img src="../../assets/icon/pdf-icon.svg" alt=""> Bukti Pelanggaran</a><br>
                        </div>
                        <div class="">
                            <h9 class="mt-0 pt-0">Berikan Sanksi :</h9>
                            <form action="../../action/dosen/beri-sanksi-action.php?id=<?= $data['id_pelanggaran_dosen']?>" method="post">
                                <textarea class="textarea p-2" name="sanksi" id="sanksi" cols="55" rows="3"></textarea><br>
                        </div>
                    </div>
                    <br>
                    <div class="buttons">
                        <button class="tindakan-btn btn btn-danger" style="margin-right: 15px;" type="submit">
                            Konfirmasi
                        </button>
                        <a class="tindakan-btn btn btn-light" style="border-color: #D9D9D9;color:#4A4A4A" href="../../action/dosen/hapus-laporan-action.php?id=<?= $data['id_pelanggaran_dosen']?>">
                            Hapus Laporan
                        </a>
                    </div>
                    </form>
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