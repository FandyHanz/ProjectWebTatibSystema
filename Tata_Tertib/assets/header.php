<?php
$name = $session->get('nama');
$status = $session->get('status');
$level = $session->get('level');
$idUsername = $session->get('username');

switch ($level) {
    case '1':
        # code...
        include_once '../../models/Admin.php';
        $forImg = new Admin();
        $base64_image = base64_encode($forImg->getImgProfile($idUsername));
        break;
    case '2':
        # code...
        include_once '../../models/Dpa.php';
        $forImg = new Dpa();
        $base64_image = base64_encode($forImg->getImgProfile($idUsername));
        break;
    case '3':
        include_once '../../models/Karyawan.php';
        $forImg = new Karyawan();
        $base64_image = base64_encode($forImg->getImgProfile($idUsername));
        # code...
        break;
    case '4':
        include_once '../../models/Mhs.php';
        $forImg = new Mhs();
        $base64_image = base64_encode($forImg->getImgProfile($idUsername));
        # code...
        break;
    case '5':
        # code...
        include_once '../../models/Dosen.php';
        $forImg = new Dosen();
        $base64_image = base64_encode($forImg->getImgProfile($idUsername));
        break;
    default:
        break;
}


?>

<header class="header d-flex align-items-center justify-content-between p-3">
    <div class="header-kiri">
        <img src="../../assets/icon/menu-icon.svg" id="menu-toggle" alt="Menu">
        <p>Sistem Tata Tertib | Polinema</p>
    </div>
    <div class="header-kanan">
        <img src="../../assets/foto-mahasiswa/contoh-profile.png" alt="">
        <p>
            <!-- Diganti sql -->
            <span class="nama-header"><?= $name ?></span><br> <!-- Nama -->
            <span class="status-header"><?= $status ?></span> <!-- Status -->
        </p>
    </div>
</header>