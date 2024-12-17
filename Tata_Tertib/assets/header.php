<?php
$name = $session->get('nama');
$status = $session->get('status');
// $level = $session->get('level');

// switch ($level) {
//     case '1':
//         # code...
//         include '';
//         break;
//     case '2':
//         # code...
//         break;
//     case '3':
//         # code...
//         break;
//     case '4':
//         # code...
//         break;
//     case '5':
//         # code...
//         break;
//     default:
//         # code...
//         break;
// }
// $img = $obj->getSimpleDataDosen($nip);

// $base64_image = base64_encode($data['foto_profile']);
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
            <span class="nama-header"><?= $name?></span><br> <!-- Nama -->
            <span class="status-header"><?= $status?></span> <!-- Status -->
        </p>
    </div>
</header>