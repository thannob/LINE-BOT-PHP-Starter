<?php
$access_token = 'Oski+YFKV4aTJxTBVuR1KN+OvOBlNgTKi9YQI/lHz1fdnP5h7NPD0571e+9G1dwCQXmF08SKvDs+UU6tixRi8usk6MlF2IwNLygDxchhQf6lU+6UdnPMCzR4Wkrs51oaQc0AURQjWhU7hhOh7xNCmAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;