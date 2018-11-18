<?php

namespace app\index\controller;

use QQ\QC;
use think\Controller;
use think\Db;
use think\Session;

class Passport extends Controller
{
    public function login()
    {
        if (request()->isPost()) {
            var_dump(input(''));die;
        } else {
            return view();
        }
    }

    function qqLogin()
    {
        $qc = new QC();
        $qc->qq_login();
    }

    public function logout(){
        Session::delete('userinfo');
        $this->redirect('index/index');
    }

    public function register()
    {
        return view();
    }

    public function doLogin($user_openid)
    {
        $user = Db::name('user')->where('user_openid', $user_openid)->find();
        Session::set('userinfo', $user);
    }

    public function qqCallback()
    {
        $qc = new QC();
        $qc->qq_callback();
        $openid = $qc->get_openid();

        $res = Db::name('user')->where('qq_openid', $openid)->find();
        if (!empty($res)) {
            $qqbind = Session::get('qqbind');
            if (!$qqbind) {
                //登录
                $data['last_login'] = time();
                Db::name('user')->where('qq_openid', $openid)->update($data);
                $this->doLogin($res['user_openid']);
                $this->redirect('index/index');
            } else {
                //绑定(待完善)
                Db::name('user')->where('user_openid', $res['user_openid'])->update(array('qq_openid' => $openid));
                $this->redirect('index/index');
            }
        } else {
            $arr = $qc->get_user_info();
            //注册
            $data['nickname'] = $arr["nickname"];
            $data['figureurl'] = $arr["figureurl_qq_2"];
            $data['gender'] = $arr["gender"];
            $data['province'] = $arr["province"];
            $data['city'] = $arr["city"];
            $data['year'] = $arr["year"];
            $data['user_openid'] = md5(microtime() . rand(1000, 9999));
            $data['qq_openid'] = $openid;
            $data['create_time'] = time();
            $data['last_login'] = time();
            Db::name('user')->insert($data);
            $this->doLogin($data['user_openid']);
            $this->redirect('index/index');
        }
    }
}
