<?php
include '../../models/Admin.php';

$obj = new Admin();
$id = $_GET['id'];

$obj->dropPelMhs($id);
header("Location: ../../index.php");
exit();