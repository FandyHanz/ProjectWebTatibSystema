<?php
$koneksi = mysqli_connect("127.0.0.1:3307", "root", "", "tatibrev");

if (mysqli_connect_errno()){
    die("Koneksi database gagal: " . mysqli_connect_error());
}