<?php
require '../../models/Admin.php';
    $id = $_GET['nip'];
    $admin = new Admin();
    $result = $admin -> deleteDosen($id);
header("Location: manajemen-user.php");
?>