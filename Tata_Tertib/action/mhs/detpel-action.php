<?php
include '../../models/Dpa.php';
$obj = new Dpa();
$id = $_GET['id'];
$sanksi = isset($_POST['sanksi']) ? $_POST['sanksi'] : [];
$tambahan = isset($_POST['tambahan']) ? $_POST['tambahan'] : '';

$obj->setSanksiById($id, $sanksi, $tambahan);
header("Location: ../../index.php");
?>