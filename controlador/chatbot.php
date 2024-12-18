<?php

$API_KEY = "93a433ad2eb1fbfb3c912039226baeac794d9c2cbbbe34f539e83a22bfc3f274";
// $API_KEY = "dde90c7653009173373a17eb77048d0462734493e71f2bdcb8cc516512ce7efe";

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.askyourdatabase.com/api/chatbot/v2/session');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    "chatbotid" => "e88ad54402e62de9ed31f00d87d7a252",
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
    // header('Content-Type: application/json');
    $result = json_decode($result, true);
    $data_url = $result['url'];
}

curl_close($ch);
