<?php

require_once "../config.php";
require_once "../helpers/response.php";

$base = "SELECT m.id, m.nama, m.nim, j.nama_jurusan AS jurusan
         FROM mahasiswa m
         LEFT JOIN jurusan j ON m.jurusan_id = j.id";

// 1. GET by ID: ?id=1
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $r = mysqli_query($koneksi, "$base WHERE m.id = $id");
    if (!$r) sendResponse(false, "query gagal: " . mysqli_error($koneksi), null, 500);

    $row = mysqli_fetch_assoc($r);
    if (!$row) sendResponse(false, "Data tidak ditemukan", null, 404);

    sendResponse(true, "berhasil", $row, 200);
    exit;
}

// 2. Pencarian: ?search=si (nama LIKE atau nim LIKE)
if (isset($_GET['search'])) {
    $s = mysqli_real_escape_string($koneksi, $_GET['search']);

    $q = "$base
          WHERE m.nama LIKE '%$s%' OR m.nim LIKE '%$s%'
          ORDER BY m.id DESC";

    $r = mysqli_query($koneksi, $q);
    if (!$r) sendResponse(false, "query gagal: " . mysqli_error($koneksi), null, 500);

    $data = [];
    while ($row = mysqli_fetch_assoc($r)) {
        $data[] = $row;
    }

    sendResponse(true, "berhasil", $data, 200);
    exit;
}

// 3. Pagination: ?page=1&limit=5 (urut id terbesar / DESC)
if (isset($_GET['page']) || isset($_GET['limit'])) {
    $page  = isset($_GET['page'])  ? max(1, (int) $_GET['page'])  : 1;
    $limit = isset($_GET['limit']) ? max(1, (int) $_GET['limit']) : 10;
    $offset = ($page - 1) * $limit;

    $q = "$base ORDER BY m.id DESC LIMIT $limit OFFSET $offset";

    $r = mysqli_query($koneksi, $q);
    if (!$r) sendResponse(false, "query gagal: " . mysqli_error($koneksi), null, 500);

    $data = [];
    while ($row = mysqli_fetch_assoc($r)) {
        $data[] = $row;
    }

    sendResponse(true, "berhasil", $data, 200);
    exit;
}

// 4. Default: semua mahasiswa
$r = mysqli_query($koneksi, "$base ORDER BY m.id DESC");
if (!$r) sendResponse(false, "query gagal: " . mysqli_error($koneksi), null, 500);

$data = [];
while ($row = mysqli_fetch_assoc($r)) {
    $data[] = $row;
}

sendResponse(true, "berhasil", $data, 200);