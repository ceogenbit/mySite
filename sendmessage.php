<?php
  $content = '';
  foreach ($_POST as $key => $value) {
    if($value) {
      $content .= "<b>$key</b>: <i>$value</i>\n";
    }
  }
  if(trim($content)) {
    $content = "<b>Message from Site:</b>\n".$content;
    apiToken = "6899000990:AAG6DiYhJH9tG8pjBq55hs0mdRDaI3nvvJU";
    $data = [
      'chat_id' => '@hawfSite',
      'text' => $content,
      'parse_mode' => 'HTML'
    ];
    $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?".http_build_query($data))
  }
?>
