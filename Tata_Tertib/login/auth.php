<?php
include('../core/Session.php');
include('../core/koneksi.php');

$session = new Session();
$act = isset($_GET['act']) ? strtolower($_GET['act']) : '';

$koneksi = new Koneksi(); // Akan menggunakan nilai default
$db = $koneksi->db;
if ($act == 'login-mhs') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // digunakan untuk query user
    $query = $db->prepare('select * from mahasiswa where nim = ?');
    $query->bind_param('s', $username);
    $query->execute();
    // untuk ambil datanya
    $data = $query->get_result()->fetch_assoc();
    // jika password sesuai
    if ($password == $data['password']) {
        $session->set('is_login', true);
        $session->set('username', $data['nim']);
        $session->set('level', $data['role']);
        $session->commit();
        header('Location: ../dashboardMhs', false);
    } else {
        $session->setFlash('status', false);
        $session->setFlash('message', 'Username dan password salah.');
        $session->commit();
        header('Location: ../login.php', false);
    }
} else if ($act == 'login-tendik') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $tables = ['admin', 'dosen', 'karyawan'];

    $data = null;
    foreach ($tables as $table) {
        // Mempersiapkan query untuk tabel yang sedang dicek
        $query = $db->prepare("SELECT * FROM $table WHERE nip = ?");
        $query->bind_param('s', $username);
        $query->execute();
        $result = $query->get_result();
    
        // Mengecek apakah ada data yang ditemukan
        if ($result->num_rows > 0) {
            // Ambil data pertama (asumsi username unik)
            $data = $result->fetch_assoc();
            break; // Jika data ditemukan, keluar dari loop
        }
    }

    if ($password == $data['password']) {
        $session->set('is_login', true);
        $session->set('username', $data['nip']);
        $session->set('level', $data['role']);
        $session->commit();
        echo "$username";
        echo "$password";
        echo "Login Berhasil Teman";
        header('Location: ../dashboard', false);
    } else {
        $session->setFlash('status', false);
        $session->setFlash('message', 'Username dan password salah.');
        $session->commit();
        echo "$username";
        echo "$password";
        echo "Login Gagal Teman";
        header('Location: ../login.php', false);
    }
} else if ($act == 'logout') {
    $session->deleteAll();
    header('Location: ../login.php', false);
}