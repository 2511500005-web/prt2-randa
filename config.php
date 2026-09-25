<?php
// config.php - pusat pengaturan koneksi MySQL global

$host   = "localhost";
$user   = "root";
$pass   = "";
$dbname = "pertemuan_2";

$koneksi = new mysqli($host, $user, $pass, $dbname);

if ($koneksi->connect_error) {
    die(json_encode([
        "status" => false,
        "message" => "Koneksi database gagal: " . $koneksi->connect_error
    ]));
}
