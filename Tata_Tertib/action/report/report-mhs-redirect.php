<?php 
    include_once '../../core/Session.php';
    include '../../models/Report.php';
    $session = new Session();
    $obj = new Report();

    $cari = $_GET['cari-berdasarkan'];
    $input = $_GET['input'];

    if ($cari == 'nim') {
        $data = $obj->searchByIdMhs($input);

        if ($data == true) {
            header('location:../../views/report/form-mhs.php?nim='.$input);
        } else {
            $message = "Data tidak ditemukan";
            $session->setFlash('status', false);
            $session->setFlash('message', $message);
            header('location:../../views/report/report.php');
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pelanggaran = $_POST['tindakan'];
        $deskripsi = $_POST['deskripsi'];
        $lampiran = $_POST['lampiran'];
        $set = $obj->addPelanggaranMhs($pelanggaran, $deskripsi, $lampiran, $nim);
        header("Location: report.php");
        exit();
    }
?>