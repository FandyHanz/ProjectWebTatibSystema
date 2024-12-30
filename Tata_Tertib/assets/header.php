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
        $account_profile = $forImg->getImgProfile($idUsername);
        break;
    case '2':
        # code...
        include_once '../../models/Dpa.php';
        $forImg = new Dpa();
        $account_profile = $forImg->getImgProfile($idUsername);
        break;
    case '3':
        include_once '../../models/Karyawan.php';
        $forImg = new Karyawan();
        $account_profile = $forImg->getImgProfile($idUsername);
        # code...
        break;
    case '4':
        include_once '../../models/Mhs.php';
        $forImg = new Mhs();
        $account_profile = $forImg->getImgProfile($idUsername);
        # code...
        break;
    case '5':
        # code...
        include_once '../../models/Dosen.php';
        $forImg = new Dosen();
        $account_profile = $forImg->getImgProfile($idUsername);
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
        <img src="data:image/jpeg;base64,<?=base64_encode($account_profile) ?>" alt="">
        <p>
            <!-- Diganti sql -->
            <span class="nama-header"><?= $name ?></span><br> <!-- Nama -->
            <span class="status-header"><?= $status ?></span> <!-- Status -->
        </p>
    </div>
</header>