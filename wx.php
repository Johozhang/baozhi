<?php
error_reporting(0);
require 'WechatJsSdk.class.php';
$app_id = 'wx2bc6584bdf5d4ca8';
$app_secret = '4625d6bded4a45951b1b285e70b868a2';

$url = $_GET['url'];
$authorizeUrl = urldecode($url);
$jssdk = new WechatJsSdk($app_id,$app_secret);
$res = $jssdk->getSignPackage($authorizeUrl);
$json=json_encode($res);
header("content-type:application/json");
echo $json;