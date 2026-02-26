<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "appslipgaji"; // ✅ NAMA DATABASE, BUKAN TABEL

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$koneksi) {
    die("Database error: " . mysqli_connect_error());
}