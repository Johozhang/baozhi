<?php
include 'WechatJssdk.class.php';
header( 'Access-Control-Allow-Origin:*' );


$appid = 'wxf4955c4949bf96ee';
$secret = '6121b7013d781e9cc47fbe625d137889';



$url = isset($_POST['url']) ? $_POST['url'] : '';

$jssdk = new WechatJssdk($appid,$secret,$url);
$sign = $jssdk->GetSignPackage();

$data['appid'] = $sign['appId'];
$data['noncestr'] = $sign['nonceStr'];
$data['signature'] = $sign['signature'];
$data['timestamp'] = $sign['timestamp'];
$data['url'] = $sign['url'];

echo json_encode($data);