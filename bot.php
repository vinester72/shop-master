<?php
// токен бота
define('TELEGRAM_TOKEN', 'ПРОПИШИ_ТУТ_ТВОЙ_ТЕЛЕГРАМ_ТОКЕН');
  
// внутренний айди
define('TELEGRAM_CHATID', 'ПРОПИШИ_ТУТ_ТВОЙ_ЧАТ_ID');
message_to_telegram('Новый заказ!');
function message_to_telegram($text) {
    $data = [
        'chat_id' => TELEGRAM_CHATID,
        'text' => $text,
        'parse_mode' => "HTML"
    ];
     
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, 'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/sendMessage' );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch, CURLOPT_TIMEOUT, 10 );
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );
    curl_setopt( $ch, CURLOPT_POST, true );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $data ); 
 
    $result = curl_exec( $ch );
    curl_close( $ch );
}