<?php
// api/mahasiswa.php - endpoint eksekusi query data mahasiswa

require_once '../config.php';
require_once '../helpers/response.php';

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $result = $koneksi->query("
            SELECT mahasiswa.*, jurusan.nama_jurusan
            FROM mahasiswa
            LEFT JOIN jurusan ON mahasiswa.jurusan_id = jurusan.id
        ");

        if (!$result) {
            sendResponse(false, "Query gagal: " . $koneksi->error, null, 500);
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        sendResponse(true, "Data mahasiswa berhasil diambil", $data, 200);
        break;

    default:
        sendResponse(false, "Method tidak diizinkan", null, 405);
        break;
}
