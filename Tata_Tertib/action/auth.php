<?php
include('../core/Session.php');
include('../core/koneksi.php');

$session = new Session();
$koneksi = new Koneksi(); // Akan menggunakan nilai default
$db = $koneksi->db;

$act = isset($_POST['act']) ? strtolower($_POST['act']) : (isset($_GET['act']) ? strtolower($_GET['act']) : '');

switch ($act) {
    case 'login-mhs':
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = $db->prepare('SELECT * FROM mahasiswa WHERE nim = ?');
        $query->bind_param('s', $username);
        $query->execute();
        $data = $query->get_result()->fetch_assoc();

        if ($data && $password === $data['password']) {
            $session->set('is_login', true);
            $session->set('username', $data['nim']);
            $session->set('level', $data['role']);
            $session->set('nama', $data['nama']);
            $session->set('status', $data['status']);
            $session->commit();
            header('Location: ../index.php');
        } else {
            $session->setFlash('status', false);
            $session->setFlash('message', 'Username dan password salah.');
            $session->commit();
            header('Location: ../index.php');
        }
        break;

    case 'login-tendik':
        $username = $_POST['username'];
        $password = $_POST['password'];
        $tables = ['admin', 'dosen', 'karyawan'];

        $data = null;
        foreach ($tables as $table) {
            $query = $db->prepare("SELECT * FROM $table WHERE nip = ?");
            $query->bind_param('s', $username);
            $query->execute();
            $result = $query->get_result();
            if ($result->num_rows > 0) {
                $data = $result->fetch_assoc();
                break;
            }
        }

        if ($data && $password === $data['password']) {
            $session->set('is_login', true);
            $session->set('username', $data['nip']);
            $session->set('level', $data['role']);
            $session->set('nama', $data['nama']);
            $session->set('status', $data['status']);
            $session->commit();
            header('Location: ../index.php');
        } else {
            $session->setFlash('status', false);
            $session->setFlash('message', 'Username dan password salah.');
            $session->commit();
            header('Location: ../index.php');
        }
        break;

    case 'logout':
        $session->deleteAll();
        header('Location: ../index.php');
        break;

    default:
        echo 'Aksi tidak dikenali.';
        break;
}
