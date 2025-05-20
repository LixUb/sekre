<?php
// Daftar user dummy (simulasi database)
$users = [
    "123456" => ["name" => "Andi Saputra", "role" => "Staff Keuangan"],
    "654321" => ["name" => "Budi Santoso", "role" => "HR Manager"],
    "111222" => ["name" => "Citra Dewi", "role" => "Admin Gudang"]
];

$barcode = trim($_POST['barcode']);
$time = date("Y-m-d H:i:s");

if (array_key_exists($barcode, $users)) {
    $user = $users[$barcode];
    $message = "✅ <strong>Nama:</strong> {$user['name']}<br>" .
               "<strong>Jabatan:</strong> {$user['role']}<br>" .
               "<strong>Waktu Hadir:</strong> $time";

    // Simpan ke log
    $log = "{$time} | {$barcode} | {$user['name']} | {$user['role']}\n";
    file_put_contents("absen_log.txt", $log, FILE_APPEND);
} else {
    $message = "❌ <span style='color:red;'>Barcode tidak dikenal!</span>";
}

// Redirect kembali ke index dengan pesan
header("Location: index.php?message=" . urlencode($message));
exit;
