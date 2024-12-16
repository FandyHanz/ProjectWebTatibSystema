<?php
include '../../models/Admin.php';

$obj = new Admin();
$id = $_GET['id'];
$sanksi = $_POST['sanksi'];

$obj->setSanksiKaryawanById($id, $sanksi);
header("Location: ../../index.php");
exit();