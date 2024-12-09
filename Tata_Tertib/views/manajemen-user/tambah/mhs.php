<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website with Sidebar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/dashboard/style.css">
    <style>
        .form-group {
            gap: 35px
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <?php include 'assets/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <?php
        include 'assets/header.php';
        ?>
        <div class="table-container p-4 pb-0">
            <h4 class="mb-4">Input Data Mahasiswa</h4>
            <form action="" method="post">
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
                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="nama">Kelas:</label>
                    </div>
                    <input class="col-3" type="text" id="nama" name="nama" required>
                    <div class="col-2"></div>
                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="nim">Status:</label>
                    </div>
                    <input class="col-3" type="text" id="nim" name="nim" required>
                </div>
                <div class="baris-tiga d-flex flex-row mb-3">
                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="nama">No Telepon:</label>
                    </div>
                    <input class="col-3" type="text" id="nama" name="nama" required>
                    <div class="col-2"></div>
                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="nim">Email:</label>
                    </div>
                    <input class="col-3" type="text" id="nim" name="nim" required>
                </div>
                <div class="baris-empat d-flex flex-row mb-3">
                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="nama">Alamat:</label>
                    </div>
                    <input class="col-3" type="text" id="nama" name="nama" required>
                    <div class="col-2"></div>
                </div>
                <div class="baris-tiga d-flex flex-row mb-3">
                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="nama">Nama Ayah:</label>
                    </div>
                    <input class="col-3" type="text" id="nama" name="nama" required>
                    <div class="col-2"></div>
                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="nim">No Telepon Ayah:</label>
                    </div>
                    <input class="col-3" type="text" id="nim" name="nim" required>
                </div>
                <div class="baris-tiga d-flex flex-row mb-3">
                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="nama">Nama Ibu:</label>
                    </div>
                    <input class="col-3" type="text" id="nama" name="nama" required>
                    <div class="col-2"></div>
                    <div class="form-group col-2 d-flex flex-row ">
                        <label class="" for="nim">No Telepon Ibu:</label>
                    </div>
                    <input class="col-3" type="text" id="nim" name="nim" required>
                </div>
                <div class="baris-tiga d-flex flex-row col-12 justify-content-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <?php
        include 'assets/footer.php';
        ?>
    </div>
    <script src="views/dashboard/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>