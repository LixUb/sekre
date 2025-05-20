<?php

$users = [
    "123456" => ["name" => "null", "role" => "Operator Sekre"],
    "654321" => ["name" => "apis", "role" => "Admin"],
    "111222" => ["name" => "nullapis", "role" => "Kamad"]
];

$barcode = trim($_POST['barcode']);
$time = date("Y-m-d H:i:s");

if (array_key_exists($barcode, $users)) {
    $user = $users[$barcode];
    $message = "✅ <strong>Nama:</strong> {$user['name']}<br>" .
               "<strong>Jabatan:</strong> {$user['role']}<br>" .
               "<strong>Waktu Hadir:</strong> $time";

    
    $log = "{$time} | {$barcode} | {$user['name']} | {$user['role']}\n";
    file_put_contents("absen_log.txt", $log, FILE_APPEND);
} else {
    $message = "❌ <span style='color:red;'>Barcode tidak dikenal!</span>";
}

header("Location: index.php?message=" . urlencode($message));
exit;
