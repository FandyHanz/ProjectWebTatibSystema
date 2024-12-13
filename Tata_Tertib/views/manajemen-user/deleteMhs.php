<?php
require '../../models/Admin.php';
    $id = $_GET['nim'];
    $admin = new Admin();
    $result = $admin -> deleteMhs($id);
    return $result;
header("Location: manajemen-user.php");
?>
