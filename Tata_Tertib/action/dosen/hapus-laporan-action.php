<?php
include '../../models/Admin.php';

$obj = new Admin();
$id = $_GET['id'];

$obj->dropPelDosen($id);
header("Location: ../../index.php");
exit();