<?php
namespace Admin\Controller;
use Think\Controller;
class EmptyController extends Controller{
    public function index(){
        $path = I('path.');
        $template = count($path) ? join('_', $path) : 'index';

        $this->display('./'.$template);
    }

}