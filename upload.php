<?php
$targetDir = "uploads/";

if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

if (isset($_POST["submit"])) {
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Bolehkan hanya file tertentu jika perlu:
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'docx', 'xlsx', 'txt'];

    if (!in_array($fileType, $allowedTypes)) {
        echo "Tipe file tidak diizinkan.";
        exit;
    }

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        header("Location: index.html"); // ganti dengan halaman utama kamu
        exit;
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah file.";
    }
}
?>
