<?php
include '../../models/Admin.php';
include '../../core/Session.php';
$session = new Session();

$data = new Admin();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $password = $_POST['password'];
    $kelas = $_POST['kelas'];
    $status = $_POST['status'];
    $noTelp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $namaAyah = $_POST['nama_ayah'];
    $noTelpAyah = $_POST['no_telp_ayah'];
    $namaIbu = $_POST['nama_ibu'];
    $noTelpIbu = $_POST['no_telp_ibu'];
    $fotoProfile = $_POST['foto_profile'];

    $tabelMahasiswa = $data->addTabelUserMahasiswa($nama, $password, $status, $nim, $kelas, $noTelp, $alamat, $email, $namaAyah, $noTelpAyah, $namaIbu, $noTelpIbu, $fotoProfile);
    return $tabelMahasiswa;
}
$kelas = $data->getKelasMhs();

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
            <h4 class="mb-4">Input Data Mahasiswa</h4>
            <form action="" method="post" enctype="multipart/formdata">
                <div class="baris-satu d-flex flex-row mb-3">
                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="nama">Nama:</label>
                    </div>
                    <input class="col-3" type="text" id="nama" name="nama" required>
                    <div class="col-2"></div>
                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="nim">NIM:</label>
                    </div>
                    <input class="col-3" type="text" id="nim" name="nim" required>
                </div>
                <div class="baris-dua d-flex flex-row mb-3">
                    <div class="form-group col-2 d-flex flex-row">
                        <label class="" for="nama">Kelas:</label>
                    </div>
                    <select class="form-select" id="kelas" name="kelas" required>
                        <option value="" disabled selected>Kelas</option>
                        <?php
                        foreach ($kelas as $row) {
                            echo '<option value="' . $row['id_kelas'] . '">' . $row['nama'] . '</option>';
                        }
                        ?>
                    </select>
                    <div class="col-2"></div>
                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="password">Password:</label>
                    </div>
                    <input class="col-3" type="text" id="status" name="password" required>
                </div>
                <div class="baris-tiga d-flex flex-row mb-3">
                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="no_telp">No Telepon:</label>
                    </div>
                    <input class="col-3" type="text" id="no_telp" name="no_telp" required>
                    <div class="col-2"></div>
                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="nim">Status:</label>
                    </div>
                    <input class="col-3" type="text" id="status" name="status" required>
                </div>
                <div class="baris-empat d-flex flex-row mb-3">
                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="alamat">Alamat:</label>
                    </div>
                    <input class="col-3" type="text" id="alamat" name="alamat" required>
                    <div class="col-2"></div>
                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="email">Email:</label>
                    </div>
                    <input class="col-3" type="text" id="email" name="email" required>
                </div>
                <div class="baris-tiga d-flex flex-row mb-3">
                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="nama_ayah">Nama Ayah:</label>
                    </div>
                    <input class="col-3" type="text" id="nama_ayah" name="nama_ayah" required>
                    <div class="col-2"></div>
                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="no_telp_ayah">No Telepon Ayah:</label>
                    </div>
                    <input class="col-3" type="text" id="no_telp_ayah" name="no_telp_ayah" required>
                </div>
                <div class="baris-tiga d-flex flex-row mb-3">
                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="nama_ibu">Nama Ibu:</label>
                    </div>
                    <input class="col-3" type="text" id="nama_ibu" name="nama_ibu" required>
                    <div class="col-2"></div>
                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="no_telp_ibu">No Telepon Ibu:</label>
                    </div>
                    <input class="col-3" type="text" id="no_telp_ibu" name="no_telp_ibu" required>
                </div>
                <div class="baris-empat d-flex flex-row mb-3">
                    <div class="form-group col-2 d-flex flex-row mb ">
                        <label for="formFile" class="form-label">Upload</label>
                    </div>
                    <input class="form-control" type="file" name="foto_profile" id="formFile">
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