<?php
namespace app\admin\controller;

use think\Controller;

class EmptyController extends Controller{
    public function __empty(){
        return view(request()->controller().'/'.request()->action());
    }
    public function __call($a,$b){
        return $a;
        return view(request()->controller().'/'.request()->action());
    }

}