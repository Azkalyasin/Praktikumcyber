<?php
$dir = "uploads/";
$files = [];

if (is_dir($dir)) {
    $scan = scandir($dir);
    foreach ($scan as $file) {
        if ($file !== "." && $file !== ".." && !is_dir($dir . $file)) {
            $files[] = $file;
        }
    }
}

header('Content-Type: application/json');
echo json_encode($files);
?>
