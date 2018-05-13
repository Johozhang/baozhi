<?php
namespace Admin\Controller;
use Think\Controller;
use SoapClient;
class CommonController extends Controller {
	protected $client;
	protected $sessionId;
	public function _initialize(){
		header ( "Content-Type: text/html; charset=utf-8" );
		
		session('admin_curpage',ACTION_NAME);
		if(strpos(ACTION_NAME,"admin") !== false) {
			session('admin_curpage',"admin");
		}
		if(strpos(ACTION_NAME,"lists") !== false) {
			session('admin_curpage',"lists");
		}
		if(strpos(ACTION_NAME,"olding") !== false) {
			session('admin_curpage',"olding");
		}
		if(strpos(ACTION_NAME,"vadd") !== false) {
			session('admin_curpage',"v");
		}
		if(strpos(ACTION_NAME,"vedit") !== false) {
			session('admin_curpage',"v");
		}
		if(strpos(ACTION_NAME,"loingmsg") !== false) {
			session('admin_curpage',"loingMsg");
		} 
		if(ACTION_NAME != "index" && ACTION_NAME != "login"){
			isLogin();
		}

	}

}