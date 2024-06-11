<?php

include 'secret.php';

if ($_POST['tel'])
    $tel = htmlspecialchars($_POST['tel']);
else
    $tel = "-";

if ($_POST['fio'])
    $fio = $_POST['fio'];
else
    $fio = "-";

if ($_POST['problems'])
    $problems = $_POST['problems'];
else
    $problems = "-";

$sitename = $_SERVER['SERVER_NAME'];


function sendMessage($chatID, $message, $token) {
    $data = [
        "text" => $message,
        "chat_id" => $chatID,
        "parse_mode" => "markdown",
    ];
    $result = file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );
    if (!$result) {
        file_get_contents("https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID . "&text=Error. Phone: " . $tel);
    }
}

$message = "*Заявка на сайте " . $sitename . "*\nНомер: " . $tel . "\nФИО: " . $fio . "\nПроблема: " . $problems;

if ($tel != "-")
    sendMessage($chatid, $message, $token, );

?>
