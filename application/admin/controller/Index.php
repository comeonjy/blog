<?php
namespace app\admin\controller;

use think\Controller;

class Index extends Controller{
    public function index(){
        return view();
    }

    public function upload($path=false,$save=false){
        $file = request()->file('upload');
        $path = $path?$path:ROOT_PATH . 'public/uploads/';
        $save = $save?$save:'/uploads/';
        if($file){
            $info = $file->move($path);
            if($info){
                $url = $save.$info->getSaveName();// 成功上传后 获取上传信息
            }else{
                $error = $file->getError();
            }
        }
        $url = str_replace("\\","/",$url);//把url的\换成/
        return json(['uploaded'=>true,'url'=>$url]);
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