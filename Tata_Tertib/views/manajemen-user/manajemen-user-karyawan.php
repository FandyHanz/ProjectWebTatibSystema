<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website with Sidebar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/dashboard/style.css">
</head>

<body>
    <!-- Sidebar -->
    <?php include 'assets/sidebar.php';?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <?php
        include 'assets/header.php';
        ?>
        <div class="table-container">
            <div class="d-flex flex-row justify-content-between align-items-center p-4 pb-0">
                <h1 class="m-0 p-0">List User Karyawan</h1>
                <a href="/tambahUserKaryawan" class="btn btn-primary">Tambah Karyawan</a>
            </div>
            <!-- toggle button untuk navigasi table -->
            <div class="table-nav" data-toggle="buttons">
                <ul id="tab-nav">
                    <a href="/manajemenUserMhs" style="color: #BDD0E7;">
                        <li class="nav-table-button" id="btn-mhs"><img src="assets/icon/student-icon.svg" class="icon" style="opacity: 1;" alt="">Mahasiswa</li>
                    </a>
                    <a href="/manajemenUserDosen" style="color: #BDD0E7;">
                        <li class="nav-table-button" id="btn-dosen"><img src="assets/icon/teacher-icon.svg" class="icon" style="opacity: 1;" alt="">Dosen</li>
                    </a>
                    <a href="/manajemenUserKaryawan">
                        <li class="nav-table-button active" id="btn-karyawan"><img src="assets/icon/karyawan-icon.svg" class="icon" style="opacity: 1;" alt="">Karyawan</li>
                    </a>
                </ul>
            </div>
            <div class="line">
                <div class="line-active" id="line-active" style="width: 156.13px; margin-left: 296.25px;"></div>
            </div>
            <div class="filter d-flex flex-row col-12 justify-content-end pb-4">
                <div class="search">
                    <form action="">
                        <div class="form-group">
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tempat untuk memuat konten tabel -->
            <div id="table-content-container" class="table-content-container">
                <div class="scrollable-table">
                    <table class="custom-table" id="table-data">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>No Telepon</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < count($tabelKaryawan); $i++) {
                            ?>
                                <tr>
                                    <td></td>
                                    <td><?php echo $tabelKaryawan[$i]["nama"]; ?></td>
                                    <td><?php echo $tabelKaryawan[$i]["nip"]; ?></td>
                                    <td><?php echo $tabelKaryawan[$i]["no_telp"]; ?></td>
                                    <td><?php echo $tabelKaryawan[$i]["status"]; ?></td>
                                    <td>
                                        <button class="btn btn-light">
                                            Option
                                            <img src="assets/icon/caret-down-icon.svg" style="width: 13px; height: 13px; margin-left: 5px" alt="">
                                        </button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
        include 'assets/footer.php';
        ?>
    </div>

    <script src="views/dashboard/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>