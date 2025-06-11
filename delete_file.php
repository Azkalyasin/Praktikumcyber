<?php
$data = json_decode(file_get_contents("php://input"));

if (!isset($data->fileName)) {
    echo json_encode(["message" => "Nama file tidak ditemukan."]);
    exit;
}

$file = "uploads/" . basename($data->fileName);

if (file_exists($file)) {
    unlink($file);
    echo json_encode(["message" => "File berhasil dihapus."]);
} else {
    echo json_encode(["message" => "File tidak ditemukan."]);
}
?>
