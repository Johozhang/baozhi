<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller{
    public function index(){

         if(!cookie("dongfengOpenid")){
             $id = I("get.id");
             if($id){
                 $redirect = "http://www.nice-idea.cn/2018/dongfeng-peugeot/0421-2018bjautoshow/?id=".$id;
             }else{
                $redirect = "http://www.nice-idea.cn/2018/dongfeng-peugeot/0421-2018bjautoshow/";
             }

            $url = 'http://www.nice-idea.cn/2018/dongfeng-peugeot/0421-2018bjautoshow/index.php?a=auth&redirect='.urlencode($redirect);
             header('Location: '.$url); exit;
         }

//       $obj = M("app_name_list");
//       $id = I("get.id");
//       $list = $obj->field("id,num,imgurl")->where(array("id"=>$id))->find();
//
//       $this->assign("list", $list);
//       //获取图片文件夹里的路径文件名
//       $dir = "Public/img/";
//      $fileList = getFile($dir);
//     $this->assign("resJson", json_encode($fileList));
//      $this->display('./index');
    }

    public function openid(){
        cookie("dongfengOpenid","789789",3600*24*7);
    }
    public function nullOpenid(){
        cookie("dongfengOpenid",null,3600*24*7);
    }
    public function getfile() {
        Vendor('Api.wechatauth');
        $config = C('WEIXINPAY_CONFIG');
        $wechat = new \WechatAuth($config['KEY'], $config['APPSECRET']);
        $wechat -> getAccessToken();
        $media_id = I("post.media_id");
        $mediaUrl = $wechat -> mediaGet($media_id);
        $mediaFile = file_get_contents($mediaUrl);
        $tempPath = './Public/uploads/' . date('YmdHis') . mt_rand(10000, 99999) . '.jpg';
        httpcopy($mediaUrl, $tempPath);
        $arr["picurl"] = $tempPath;
        $this -> ajaxReturn($arr, 'json');
    }

    public function getfile2() {
        $mediaUrl = "http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=9_bK9pR6jTw6MN0tQq1_F_owt9s2LOaWzV_Rag3y70WPyQLtBRKl3L2nQtYD8yNFyAY02YqKBxKfQu6SE7aUVZKgTRfYT6ObBf-AgKwbhdu0oJq0P5D3GHk1bU-1f5f4Ff3bIbPkMRp00XgxTATDBlCJAPZX&media_id=tCqTdvL9NIXZoHQwmULWAvegDW2X6T49TNDFWN3X6jT4wvc5WEoOnJnJd57w6ysU";
        $tempPath = './Public/uploads/' . date('YmdHis') . mt_rand(10000, 99999) . '.jpg';
        httpcopy($mediaUrl, $tempPath);
        $arr["picurl"] = $mediaUrl;
        echo $tempPath;
    }

    public function smallImg(){
        $base64 =I('post.base64');
        $id = I("post.id");
        $tel = I("post.tel");
        $obj = M("app_name_list");
        $count = $obj->where(array("uid"=>$id))->count();
        if(!$count){
            if($id && $tel){
                if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64, $result)) {
                    $type = $result[2];
                    $name =  time().rand(1,10000).".{$type}";
                    $newFile = "./Public/upload/" .$name ;

                    $data["openid"] = cookie("dongfengOpenid");
                    $data["uid"] = $id;
                    $data["tel"] = $tel;
                    $data["imgurl"] = $name;
                    $data["add_time"] = date("Y-m-d H:i:s");
                    $data["ip"] = get_real_ip();

                    if (file_put_contents($newFile, base64_decode(str_replace($result[1], '', $base64)))) {
                        $arr["code"]=1;
                        $id = $obj->data($data)->add();
                        $arr["id"]=$id;
                    }else{
                        $arr["code"]=3;
                    }
                }else{
                    $arr["code"]=2;
                }
            }else{
                $arr["code"]=4;
            }
        }else{
            $arr["code"]=5;
        }

        $this->ajaxReturn($arr,'json');

    }


    public function ranking(){
        $obj = M("app_name_list");
        $num = I("post.num");
        $where["uid"] = array("like","%".I("post.where")."%") ;
        if($num){
            if(I("post.where")){
                $list = $obj->field("id,num,uid,imgurl")->order("num desc,id asc")->where($where)->limit($num.",10")->select();
            }else{
                $list = $obj->field("id,num,uid,imgurl")->order("num desc,id asc")->limit($num.",10")->select();
            }
            if($list){
                $arr["code"] = 1;
            }else{
                $arr["code"] = 2;
            }
        }else{
            $arr["code"] = 1;
            $list = $obj->field("id,num,uid,imgurl")->order("num desc,id asc")->limit(10)->select();
        }
        $arr["list"] = $list;
        $this->ajaxReturn($arr,"json");
    }

    public function vote(){
        $id = I("post.id");
        $game = M("app_game");
        $count = $game->where(array("openid"=>cookie("dongfengOpenid"),"uid"=>$id))->count();
        if(!$count){
            $Obj = M("app_name_list");
            $Obj->where(array("id"=>$id))->setInc("num",1);
            $data["openid"] = cookie("dongfengOpenid");
            $data["uid"] = $id;
            $data["add_time"] = date("Y-m-d H:i:s");
            $data["ip"] = get_real_ip();
            $game->data($data)->add();
            $arr["code"] = 1;
        }else{
            $arr["code"] = 2;
        }
        $this->ajaxReturn($arr,"json");
    }

    public function select(){
        $obj = M("app_name_list");
        $uid = I("post.uid");
        $data['uid'] = array('like','%'.$uid.'%');
        $list = $obj->field("id,num,uid,imgurl")->order("num desc")->where($data)->limit(10)->select();
        if($list){
            $arr["list"] = $list;
            $arr["code"] =1;
        }else{
            $arr["code"] =2;
        }
        $this->ajaxReturn($arr,"json");
    }

    public function auth(){

        Vendor('Api.wechatauth');
        $token = isset($_GET['only_token']) ? htmlspecialchars_decode($_GET['only_token']) : '';
        $redirect = isset($_GET['redirect']) ? htmlspecialchars_decode($_GET['redirect']) : '';

        if(!$redirect) die('获取redirect失败');
        $code = isset($_GET['code']) ? $_GET['code'] : '';

        $config = C('WEIXINPAY_CONFIG');

        if($code){

            $wechat = new \WechatAuth($config['KEY'],$config['APPSECRET']);
            $access = $wechat->getAccessToken('code',$code);
            $wechat->getAccessToken();
            $result = $wechat->userInfo($access['openid']);
            cookie("dongfengOpenid",$result['openid'],3600*24*7);
            header('Location: '.$redirect); exit;

        }else{

            $wechat = new \WechatAuth($config['KEY'],$config['APPSECRET']);
            $url = 'http://www.nice-idea.cn/2018/dongfeng-peugeot/0421-2018bjautoshow/index.php?a=auth&redirect='.urlencode($redirect);
            $apiUrl = $wechat->getRequestCodeURL($url,null,"snsapi_base");

            header('Location: '.$apiUrl); exit;
        }

    }
}
