<?php
namespace app\admin\controller;

use think\Controller;

class Member extends Controller{
    public function index(){
        return view();
    }

    public function welcome(){
        return view();
    }

    public function __empty($name){
        return view(request()->controller().'/'.request()->action());
    }
    public function __call($a,$b){
        return $a;
        return view(request()->controller().'/'.request()->action());
    }
}