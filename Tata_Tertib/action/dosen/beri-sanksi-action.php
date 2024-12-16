<?php
include '../../models/Admin.php';

$obj = new Admin();
$id = $_GET['id'];
$sanksi = $_POST['sanksi'];

$obj->setSanksiDosenById($id, $sanksi);
header("Location: ../../index.php");
exit();