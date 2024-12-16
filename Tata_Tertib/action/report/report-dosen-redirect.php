<?php 
    include_once '../../core/Session.php';
    include '../../models/Report.php';
    $session = new Session();
    $obj = new Report();

    $cari = $_GET['cari-berdasarkan'];
    $input = $_GET['input'];

    if ($cari == 'nip') {
        $data = $obj->searchDosensById($input);

        if ($data != null) {
            header('location:../../views/report/form-dosen.php?nip='.$input);
        } else {
            $message = "Data tidak ditemukan";
            $session->setFlash('status', false);
            $session->setFlash('message', $message);
            header('location:../../views/report/report.php');
        }
    }
?>