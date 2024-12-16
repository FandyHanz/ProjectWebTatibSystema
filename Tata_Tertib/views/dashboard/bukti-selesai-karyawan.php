<?php
include '../../core/Session.php';
include '../../models/Dpa.php';
$session = new Session();
$obj = new Dpa();
$id_pelanggaran = $_GET['id'];
$data = $obj->getLampiranById($id_pelanggaran);
$level = $session->get('level');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website with Sidebar</title>
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
    <?php include '../../assets/sidebar.php';?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <?php include '../../assets/header.php'; ?>

        <!-- Content -->
        <div class="table-container" style="overflow-y:auto;">
            <a href="../../index.php" ?> <img src="../../assets/icon/x.svg" class="justify-self-end rounded-circle mt-3" style="position:absolute; right: 40px; width:20px;height:20px; font-size:10px; justify-content:center; justify-items:center; cursor:pointer; z-index:3; border-radius: 40px"> </a>
            <div class="modal-body d-flex flex-row p-0 m-0">
                <div class="rightside col-6 p-4">
                    <h3 class="mb-0"><?= $data['nama']; ?></h3>
                    <h9 class="mt-0 pt-0">Tanggal: <?= $data['tanggal_lapor']; ?></h9><br>
                    <br>
                    <h9 class="mt-0 pt-0">Sanksi :</h9><br>
                    <div class="textarea p-2" style="border: none; background-color: #FAFAFC; border-radius: 10px; overflow-y: auto; width:500px">
                        <?= $data['sanksi'];?>
                    </div>
                    <br>
                    <div class="form-group col-2 d-flex flex-row mb ">
                    </div>
                    <?php
                    if ($data['bukti_selesai'] == null) {
                        echo "Tidak ada file yang diupload<br>";
                    }
                    ?>
                    <a class="btn btn-primary" href="../../action/dosen/selesai-action.php?id=<?= $data['id_pelanggaran_dosen'] ?>">
                        Selesai
                    </a>
                </div>
                <?php
                if ($data['bukti_selesai'] != null) {
                ?>
                    <iframe src="../../action/dosen/show-bukti-selesai.php?id=<?= $data['id_pelanggaran_dosen'] ?>" width="400px" height="400px" style="margin-top:40px"></iframe>
                <?php
                } else {
                }
                ?>
            </div>
        </div>
        <!-- Footer -->
        <?php include '../../assets/footer.php'; ?>
        <script>
            function validateFileSize() {
                const fileInput = document.getElementById('formFile');
                const file = fileInput.files[0];
                const maxSize = 2 * 1024 * 1024; // 2MB dalam byte

                if (file && file.size > maxSize) {
                    alert("File terlalu besar! Maksimal ukuran file adalah 2MB.");
                    fileInput.value = ""; // Mengosongkan input file
                }
            }
        </script>
        <script src="script.js"></script>
        <!-- Jquery -->
        <!-- <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
        <!-- Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>