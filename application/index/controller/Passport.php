<?php
namespace app\index\controller;

use QQ\QC;

class Passport
{
    public function login()
    {
        if (request()->isPost()){
            sucReturn('ok');
        }else{
            return view();
        }
    }
    function qqLogin(){
//        $qc = new QC();
//        $arr = $qc->get_user_info();


        $qc = new QC();
        $acs = $qc->qq_callback();
        $oid = $qc->get_openid();
        $qc = new QC($acs,$oid);
        $arr = $qc->get_user_info();


        echo '<meta charset="UTF-8">';
        echo "<p>";
        echo "Gender:".$arr["gender"];
        echo "</p>";
        echo "<p>";
        echo "NickName:".$arr["nickname"];
        echo "</p>";
        echo "<p>";
        echo "<img src=\"".$arr['figureurl']."\">";
        echo "<p>";
        echo "<p>";
        echo "<img src=\"".$arr['figureurl_1']."\">";
        echo "<p>";
        echo "<p>";
        echo "<img src=\"".$arr['figureurl_2']."\">";
        echo "<p>";
        echo "vip:".$arr["vip"];
        echo "</p>";
        echo "level:".$arr["level"];
        echo "</p>";
        echo "is_yellow_year_vip:".$arr["is_yellow_year_vip"];
        echo "</p>";
    }
    public function register()
    {
        return view();
    }
    public function qqCallback()
    {
        echo 'this is qqCallback';
    }
}
