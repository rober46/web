<?php

$API_KEY = "20417887cfe2d867bd30411d88191f48671950c15cd20b3401ae0040ac1a22d8";
// $API_KEY = "dde90c7653009173373a17eb77048d0462734493e71f2bdcb8cc516512ce7efe";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.askyourdatabase.com/api/chatbot/v2/session');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    "chatbotid" => "c60789c5f68143a59a28df9d9b142b2a",
    "name" => "Sheldon",
    "email" => "test@gmail.com",
]));

$headers = [
    'Accept: application/json, text/plain, */*',
    'Accept-Language: en',
    'Content-Type: application/json',
    'Authorization: Bearer ' . $API_KEY,
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    header('Content-Type: application/json');
    $result = json_decode($result, true);
    echo $result['url'];
}

curl_close($ch);
