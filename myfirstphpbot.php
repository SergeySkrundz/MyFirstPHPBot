<?php 
$GET_INPUT = file_get_contents('php://input');

require_once 'config.php';
require_once 'function.php';

$event = json_decode($GET_INPUT, 1);

if (mb_strtolower($event['message']['text']) == 'привет') {
    $autoAnswer = 'Приветствую Вас!';
}elseif (mb_strtolower($event['message']['text']) == 'пока'){
    $autoAnswer = 'Пока!'; 
}elseif (mb_strtolower($event['message']['text']) == 'как дела'){
    $autoAnswer = 'У меня все хорошо'; 
}elseif (mb_strtolower($event['message']['text']) == 'что делаешь'){
    $autoAnswer = 'Переписываюсь с тобой)'; 
}else {
    $autoAnswer = 'Я не понимаю Вашу фразу - ' . $event['message']['text'] . "?\nПопробуйте спросить еще раз"; 
}

getTelegramApi('sendMessage',
    [
        'text' => $autoAnswer;
        'chat_id' => $event['message']['chat']['id'];
    ]
);

?>