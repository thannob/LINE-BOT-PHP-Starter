﻿<?php
 
$strAccessToken = "Oski+YFKV4aTJxTBVuR1KN+OvOBlNgTKi9YQI/lHz1fdnP5h7NPD0571e+9G1dwCQXmF08SKvDs+UU6tixRi8usk6MlF2IwNLygDxchhQf6lU+6UdnPMCzR4Wkrs51oaQc0AURQjWhU7hhOh7xNCmAdB04t89/1O/w1cDnyilFU=";
 
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
 
$strUrl = "https://api.line.me/v2/bot/message/reply";
 
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
 
if($arrJson['events'][0]['message']['text'] == "คุณชื่ออะไร" ){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "ผมชื่อ ธรรณพ อารีพรรค";
}else if($arrJson['events'][0]['message']['text'] == "สวัสดี"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "สวัสดีครับ IDของคุณ คือ ".$arrJson['events'][0]['source']['userId'];
}else if($arrJson['events'][0]['message']['text'] == "รูป"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "image";
  $arrPostData['messages'][0]['originalContentUrl'] = "https://secret-wave-21341.herokuapp.com/it_rsu.jpg";
  $arrPostData['messages'][0]['previewImageUrl'] = "https://secret-wave-21341.herokuapp.com/preview_it_rsu.jpg";
}else if($arrJson['events'][0]['message']['text'] == "ที่อยู่"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "location";
  $arrPostData['messages'][0]['title'] = "Rangsit University";
  $arrPostData['messages'][0]['address'] = "52/347 เอกทักษิณ Tambon Lak Hok, จังหวัด ปทุมธานี 12000";
  $arrPostData['messages'][0]['latitude'] = 35.65910807942215;
  $arrPostData['messages'][0]['longitude'] = 139.70372892916203;
}else if($arrJson['events'][0]['message']['text'] == "sticker"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "sticker";
  $arrPostData['messages'][0]['packageId'] = "1";
  $arrPostData['messages'][0]['stickerId'] = "1";
}else{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = $arrJson['events'][0]['message']['text'];
}
 
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);
 
echo "OK";
?>