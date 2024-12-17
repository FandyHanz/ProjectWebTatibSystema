<?php
include_once '../../core/Session.php';
include '../../models/Report.php';
$session = new Session();
$obj = new Report();

if (isset($_GET['cari-berdasarkan'])) {
    $cari = $_GET['cari-berdasarkan'];
} else {
    $cari = 'nama'; // atau arahkan ke halaman lain jika perlu
}
$input = $_GET['input'];

if ($cari == 'nip') {
    $data = $obj->searchByIdKaryawan($input);

    if ($data != null) {
        header('location:../../views/report/form-karyawan.php?nip=' . $input);
    } else {
        $message = "Data tidak ditemukan";
        $session->setFlash('status', false);
        $session->setFlash('message', $message);
        header('location:../../views/report/report.php');
    }
} else if ($cari == 'nama') {
    $data = $obj->searchKaryawanByName($input);

    if ($data != null) {
        header('location:../../views/report/list-karyawan.php?nama=' . $input);
    } else {
        $message = "Data tidak ditemukan";
        $session->setFlash('status', false);
        $session->setFlash('message', $message);
        header('location:../../views/report/report.php');
    }
}
