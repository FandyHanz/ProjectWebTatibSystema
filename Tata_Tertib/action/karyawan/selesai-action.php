<?php
include '../../models/Admin.php';

$obj = new Admin();
$id = $_GET['id'];

$obj->setSelesaiKaryawanById($id);
header("Location: ../../index.php");
exit();