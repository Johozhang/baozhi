<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function _empty($name){

        $this->display('./'.$name);
    }
    public function login(){
       
        if(IS_POST){
            $username = I("post.usrname");
            $pwd = I("post.pwd",'','md5');


            if(!empty($pwd)|| !empty($username)){
                $U = M("app_users");

                $g = $U->where("user_name = '".$username."' and user_pw= '".$pwd."'")->find();

                if($g['user_name']){
                    session('admin_usr',$g['user_name']);
                    session('admin_id',$g['id']);


                    redirect("index.php?s=admin&a=admin");


                    exit();
                }

            }
            msg('用户名或密码错误，请重新登陆');
        }
    }
    public function out(){
        session('admin_usr',null);
        session('admin_id',null);

        redirect("index.php?s=admin");
    }
   
    public function admin(){
        $obj = M("app_name_list");
        $text = I("get.state");
        if(!$text){
            $text = "num";
        }
        $c = $obj->count();
        $Page       = new \Think\Page($c,20);
        $show       = $Page->show();
        $list = $obj->order($text.' desc')->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display("./admin");
    }


    public function del(){
        $obj = M("app_name_list");
        $id = I("get.id");
        $obj->where(array("id"=>$id))->delete();
        $this->success("删除成功！");
    }






    public function excel(){
        $xlsName  = "点赞列表";
        $xlsCell  = array(
            array('id','编号'),
            array('openid','OPENID'),
            array('uid','用户填写的ID'),
            array('tel','电话'),
            array('imgurl','图片名称'),
            array('num','点赞'),
            array('add_time','时间'),
            array('ip','IP')
        );

        $xlsModel = M('app_name_list');

        $xlsData  = $xlsModel->order("id desc")->select();

        exportExcel($xlsName,$xlsCell,$xlsData);


    }




    public function saveUserInfo(){
        $oldpwd = I("post.oldpwd",'','md5');
        $newpwd = I("post.newpwd",'','md5');
        $newpassword = I("post.newpassword",'','md5');


        if($newpwd != $newpassword){
            msg('两次密码不一致，请重新输入');
            exit;
        }
        $U = M("app_users");

        if($U->where("user_name = '".session('admin_usr')."' and user_pw = '$oldpwd'")->count() != 0){
            $arr['id'] = session('admin_id');
            $arr['user_pw'] = $newpassword;

            if($U->data($arr)->save()){
                session('admin_usr',null);
                session('admin_id',null);
//                msg('修改成功,请重新登陆');
//                redirect("index.php?s=admin");
                $this->success('修改成功', 'index.php?s=admin');
            }
        }else {
            msg('密码错误，请重新输入');
        }

    }


}