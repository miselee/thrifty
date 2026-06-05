<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location:index.php?page=login');
    exit;
}

date_default_timezone_set('Asia/Jakarta');

$backup_dir = __DIR__ . '/storage/backups/';

if (!is_dir($backup_dir)) {
    mkdir($backup_dir, 0755, true);
}

$date = date('Y-m-d_H-i-s');
$backupFile = $backup_dir . "thrifty_backup_$date.sql";

$mysqldump_path = "C:\\laragon\\bin\\mysql\\mysql-8.0.30-winx64\\bin\\mysqldump.exe";

$db_user = 'root';
$db_pass = '';
$db_name = 'thrifty';

$command = "\"$mysqldump_path\" -u $db_user ";

if (!empty($db_pass)) {
    $command .= "-p$db_pass ";
}

$command .= "$db_name --result-file=\"$backupFile\"";

exec($command, $output, $return_var);

header("Location:index.php?page=admin-dashboard&backup=success");
exit;