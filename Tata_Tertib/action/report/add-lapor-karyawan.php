<?php
include_once '../../core/Session.php';
include '../../models/Report.php';
$session = new Session();
$obj = new Report();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = isset($_POST['pelanggaran']) ? trim($_POST['pelanggaran']) : '';
    $deskripsi = isset($_POST['deskripsi']) ? trim($_POST['deskripsi']) : '';
    $lampiran = file_get_contents($_FILES['lampiran']['tmp_name']);
    $nim = isset($_POST['nip']) ? trim($_POST['nip']) : '';
    $sanksi = isset($_POST['sanksi']) ? trim($_POST['sanksi']) : '';
    $nip = isset($_POST['nip']) ? trim($_POST['nip']) : '';
    if (empty($deskripsi) && empty($lampiran)) {
        echo "All fields are required!";
        exit;
    }
    if (!isset($nip)) {
        echo "NIp is required!";
        exit;
    }

    try {
        $set = $obj->addPelanggaranKaryawan($nama, $deskripsi, $sanksi, $lampiran, $nip);
        header("Location: ../../views/report/report.php");
        exit;
    } catch (\Throwable $th) {
        echo "An error occurred: " . $th->getMessage();
    }
}
exit();
