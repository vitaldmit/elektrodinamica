<?php
$tel = htmlspecialchars($_POST['tel']);
if ($_POST['fio'] && $_POST['problems']) {
    $fio = $_POST['fio'];
    $problems = $_POST['problems'];
}

// 1.
// https://t.me/joinchat/ET-f2rDCz7-xudOi
$token = "472035467:AAGQC57vdwNneqKZ4IkgJD-MZkQhJGf0E04";
$chatid = "-289382362";
function sendMessage($chatID, $messaggio, $token) {
    // echo "sending message to " . $chatID . "\n";
    $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=" . $chatID;
    $url = $url . "&text=" . urlencode($messaggio) . "&parse_mode=markdown";
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

sendMessage($chatid, "*Заявка на сайте*\nНомер: $tel,\nФИО: $fio,\nПроблема: $problems.\n*Срочно ждет Вашего звонка.*", $token);


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