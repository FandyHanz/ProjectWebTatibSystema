<?php
include '../../models/Report.php';
include '../../core/Session.php';

$session = new Session();
$obj = new Report();
$listPelanggaran = $obj->getPelanggaran();

$nim = isset($_GET['nim']) ? $_GET['nim'] : '';
$data = $obj->getSimpleDataMhs($nim);

$base64_image = base64_encode($data['foto_profile']);
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
        .dropdown-pelanggaran {
            max-height: 200px;
            /* Tinggi maksimum dropdown */
            overflow-y: auto;
            /* Aktifkan scroll jika melebihi tinggi maksimum */
        }

        .dropdown-pelanggaran select option {
            max-width: 100px;
            word-wrap: break-word;
            /* Tinggi maksimum dropdown */
            /* Aktifkan scroll jika melebihi tinggi maksimum */
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
        <div class="table-container">
            <h1 class="p-3">Formulir Laporan Pelanggaran Mahasiswa</h1>

            <div class="d-flex flex-column pt-4">
                <form action="../../action/report/add-lapor-mhs.php" method="post" enctype="multipart/form-data">
                    <div class="form d-flex flex-row" style="padding-left: 100px; gap:100px">
                        <div class="left d-flex flex-column justify-content-center">
                            <img src="data:image/jpeg;base64,<?php echo $base64_image; ?>" style="height: 200px; width: 150px; object-fit: cover; object-position: center;" alt="">
                            <div class="photo bg-primary"></div>
                            <p class="align-self-center mt-2 mb-0"><?= $data['nama']; ?></p>
                            <p class="align-self-center"><?= $data['nim']; ?></p>
                            <input type="text" value="<?= $data['nim']; ?>" name="nim" id="nim" hidden>
                        </div>
                        <div class="middle">
                            <label for="pelanggaran">Pelanggaran: </label>
                            <select name="tindakan" id="pelanggaran" class="form-control" required>
                                <option value="" disabled selected>List</option>
                                <?php
                                foreach ($listPelanggaran as $pelanggaran) {
                                    echo '<option value="' . $pelanggaran['id_pelanggaran'] . '">' . $pelanggaran['nama_pelanggaran'] . '</option>';
                                }
                                ?>
                            </select>
                            <br>
                            <div class="form-group col-2 d-flex flex-row mb ">
                                <label for="formFile" class="form-label">Lampiran:</label>
                            </div>
                            <input class="form-control" style="width: 300px;" type="file" name="lampiran" id="formFile" accept="application/pdf">
                        </div>
                        <div class="right">
                            <label for="deskripsi">Deskripsi :</label><br>
                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" style="border-color: #E9ECEF;"></textarea>
                        </div>
                    </div>
                    <div class="buttons d-flex flex-row align-items-center justify-content-center" style="gap:30px">
                        <button class="btn btn-danger" style="width:100px" type="submit">report</button>
                        <a href="" class="btn btn-light border-secondary" style="width:100px">cancel</a>
                    </div>
                </form>
            </div>

        </div>

        <!-- Footer -->
        <?php include '../../assets/footer.php'; ?>
    </div>

    <script src="views/report/script.js"></script>
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>