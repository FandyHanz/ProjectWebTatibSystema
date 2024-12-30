<?php
include_once '../../core/Session.php';
include '../../models/Report.php';
$session = new Session();
$obj = new Report();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pelanggaran = isset($_POST['tindakan']) ? trim($_POST['tindakan']) : '';
    $deskripsi = isset($_POST['deskripsi']) ? trim($_POST['deskripsi']) : '';
    $lampiran = file_get_contents($_FILES['lampiran']['tmp_name']);
    $nim = isset($_POST['nim']) ? trim($_POST['nim']) : '';
    if (empty($pelanggaran) || empty($deskripsi) || empty($lampiran)) {
        echo "All fields are required!";
        exit;
    }
    if (!isset($nim)) {
        echo "NIM is required!";
        exit;
    }

    try {
        $obj->addPelanggaranMhs($pelanggaran, $deskripsi, $lampiran, $nim);
        header("Location: ../../views/report/report.php");
        exit;
    } catch (\Throwable $th) {
        echo "An error occurred: " . $th->getMessage();
    }
}
exit();
