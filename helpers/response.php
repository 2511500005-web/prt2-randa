<?php
// helpers/response.php - fungsi reusable untuk format output JSON API

function sendResponse($status, $message, $data = null, $httpCode = 200) {
    http_response_code($httpCode);
    header('Content-Type: application/json');
    echo json_encode([
        "status"  => $status,   // true/false, indikator keberhasilan operasi
        "message" => $message,
        "data"    => $data
    ]);
    exit;
}
