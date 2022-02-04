<?php

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


// 1.
// https://t.me/joinchat/ET-f2rDCz7-xudOi
$token = "5262241390:AAHaaWYR4e-l6rdHqQDTenKDP9HwJhqRJ-c";
$chatid = "-1001673749294";
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

// if ($res)
//     echo "<h1> This is res " . $res . "</h1>";
// else
//     echo "<h1> This is false</h1>";

// file_get_contents("https://api.telegram.org/bot5262241390:AAHaaWYR4e-l6rdHqQDTenKDP9HwJhqRJ-c/sendMessage?chat_id=-1001673749294&text=ERROR!");

// file_get_contents("https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=". $chatid . "&text=ERROR!");

// 2.
// Simple way:
// $token = "472035467:AAGQC57vdwNneqKZ4IkgJD-MZkQhJGf0E04";
// $data = [
//     'text' => 'your message here',
//     'chat_id' => '-289382362'
// ];
// file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );


// 3. 
// // initialise variables here
// $chat_id = 1231231231;
// // path to the picture, 
// $text = 'your text goes here';
// // following ones are optional, so could be set as null
// $disable_web_page_preview = null;
// $reply_to_message_id = null;
// $reply_markup = null;

// $data = array(
//         'chat_id' => urlencode($chat_id),
//         'text' => urlencode($text),
//         'disable_web_page_preview' => urlencode($disable_web_page_preview),
//         'reply_to_message_id' => urlencode($reply_to_message_id),
//         'reply_markup' => urlencode($reply_markup)
//     );

// $url = https://api.telegram.org/bot472035467:AAGQC57vdwNneqKZ4IkgJD-MZkQhJGf0E04/sendMessage;

// //  open connection
// $ch = curl_init();
// //  set the url
// curl_setopt($ch, CURLOPT_URL, $url);
// //  number of POST vars
// curl_setopt($ch, CURLOPT_POST, count($data));
// //  POST data
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// //  To display result of curl
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// //  execute post
// $result = curl_exec($ch);
// //  close connection
// curl_close($ch);
?>
