<?php
$access_token = 'yJ0gNoR1OR5PlMtLhfJG7rPnlgp55CNEocKN0MpRKOCq7QEigwE+wbCBN9vl2tQ5wC+SxBtjreOi6u7bjT0vqsO4cx7PeGm4oVZFqN6sL7FUJacYjFWDxfSWDs50timRTLl7dnncvewjvh8JnbcIFgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
