<?php
// ใช้ RouterOS API PHP Client
require('routeros_api.class.php'); // ให้แน่ใจว่าไฟล์นี้อยู่ในที่เดียวกับ time-api.php หรือปรับเส้นทางให้ถูกต้อง

$API = new RouterosAPI();
$hostname = '202.29.229.205'; // IP ของ MikroTik Router
$username = 'planning'; // ชื่อผู้ใช้ของ MikroTik
$password = 'ford5361'; // รหัสผ่านของ MikroTik

if ($API->connect($hostname, $username, $password)) {
    $response = $API->comm('/system/clock/print');
    $currentTime = $response[0]['time'];
    echo json_encode(['currentTime' => $currentTime]);
    $API->disconnect();
} else {
    echo json_encode(['error' => 'Unable to connect to MikroTik API']);
}
?>
