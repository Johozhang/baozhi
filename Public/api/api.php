<?php
/**
 * Created by PhpStorm.
 * User: KLiu09
 * Date: 2017/11/16
 * Time: 11:07
 */
$action=isset($_REQUEST['action']) ? $_REQUEST['action'] : NULL;
require_once ('class/api.class.php');
if($action=='city'){
//    获取城市
    $pid=isset($_POST['pid']) ? $_POST['pid'] : 3361;
    $data=api::cityOption($pid);
}elseif($action=='dealer'){
//    获取经销商
    $cid=isset($_POST['cid']) ? $_POST['cid'] : 3392;
    $data=api::dealerOption($cid);
}elseif($action=='initShare'){
//    初始化微信自定义分享
    $url=isset($_REQUEST['url']) ? $_REQUEST['url'] : NULL;
    $data=api::setShare($url);
    if($data['body'])
    {
        $data['body']['flag']=1;
        exit(json_encode($data['body']));
    }else{
        $data=array(
            'flag'=>0,
            'msg'=>$data['head']['return_msg']
        );
    }
}else{
//    非法请求
    $data=array(
        'flag'=>0,
        'errorCode'=>161100,
    );
}
echo json_encode($data);