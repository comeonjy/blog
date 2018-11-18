<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function adminReturn($status,$msg,$data,$url){
    $rt['status']=$status;
    $rt['msg']=$msg;
    $rt['data']=$data;
    $rt['url']=$url;
    echo json_encode($rt);
    exit();
}

function sucReturn($msg='操作成功',$data=array(),$url=''){
    adminReturn(1,$msg,$data,$url);
}

function errReturn($msg='操作失败',$data=array(),$url=''){
    adminReturn(0,$msg,$data,$url);
}