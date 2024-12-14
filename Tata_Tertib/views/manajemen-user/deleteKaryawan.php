<?php
require '../../models/Admin.php';
$id = $_GET['nip'];
$admin = new Admin();
$result = $admin -> deleteKaryawan($id);
header("Location: manajemen-user.php");
?>