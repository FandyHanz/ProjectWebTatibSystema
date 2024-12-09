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
            gap:35px
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
        <div class="table-container p-4">
            <h4>Input Data Mahasiswa</h4>
            <form action="" method="post">
                <div class="baris-satu d-flex flex-row">
                    <div class="form-group col-3 d-flex flex-row ">
                        <label for="nama">Nama:</label>
                    </div>
                    <input class="col-3" type="text" id="nama" name="nama" required>
                    <div class="form-group col-3 d-flex flex-row ">
                        <label for="nim">NIM:</label>
                    </div>
                    <input class="col-3" type="text" id="nim" name="nim" required>
                </div>
                <div class="baris-dua d-flex flex-row ">
                    <label for="prodi">Program Studi:</label>
                    <input class="col-3" type="text" id="prodi" name="prodi" required>
                </div>
                <div class="form-group d-flex flex-row ">
                    <label for="kelas">Kelas:</label>
                    <input class="col-3" type="text" id="kelas" name="kelas" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
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