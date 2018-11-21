<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Session;

class Index extends Controller
{
    public function index()
    {
        if (!Session::get('info')){
            $days=(int)((time()-strtotime('2018-11-20'))/(24*3600));
            Session::set('info.days',$days);
            $article_count=Db::name('pm_article')->count();
            Session::set('info.article_count',$article_count);
        }


        $list=Db::name('pm_comment')->field('article_id')->limit(8)->order('create_time desc')->select();
        foreach ($list as $v){
            $arr[]=$v['article_id'];
        }
        $arr= implode(',',$arr);
        $new=model('pm_article')->field('title,date,view,image')->where('id in ('.$arr.')')->select();

        $page=input('param.page')?input('param.page'):1;
        $data=model('pm_article')->page($page)->limit(10)->select();
        $this->assign('data',$data);
        $this->assign('page',$page+1);
        $this->assign('new',$new);
        return view();
    }
    public function show()
    {
        $list=Db::name('pm_comment')->field('article_id')->limit(8)->order('create_time desc')->select();
        foreach ($list as $v){
            $arr[]=$v['article_id'];
        }
        $arr= implode(',',$arr);
        $new=model('pm_article')->field('title,date,view,image')->where('id in ('.$arr.')')->select();
        $this->assign('new',$new);

        $data=model('pm_article')->where('id',input('param.id'))->find();
        $this->assign('data',$data);

        $comments=model('pm_comment')->alias('c')->join('pm_author a','c.author_id=a.id','left')->where('article_id',input('param.id'))->select();
        $this->assign('comments',$comments);

        return view();
    }
    public function category()
    {
        $where['catslug']=input('param.type');
        $list=Db::name('pm_comment')->field('article_id')->limit(8)->order('create_time desc')->select();
        foreach ($list as $v){
            $arr[]=$v['article_id'];
        }
        $arr= implode(',',$arr);
        $new=model('pm_article')->field('title,date,view,image')->where('id in ('.$arr.')')->select();

        $page=input('param.page')?input('param.page'):1;
        $data=model('pm_article')->where($where)->page($page)->limit(10)->select();
        $this->assign('data',$data);
        $this->assign('page',$page+1);
        $this->assign('new',$new);

        $this->assign('catslug',$data[0]['catslug']);
        return view();
    }

    public function search()
    {
        $where['title']=['like','%'.input('get.keyword').'%'];
        $list=Db::name('pm_comment')->field('article_id')->limit(8)->order('create_time desc')->select();
        foreach ($list as $v){
            $arr[]=$v['article_id'];
        }
        $arr= implode(',',$arr);
        $new=model('pm_article')->field('title,date,view,image')->where('id in ('.$arr.')')->select();

        $page=input('param.page')?input('param.page'):1;
        $data=model('pm_article')->where($where)->page($page)->limit(10)->select();
        $this->assign('data',$data);
        $this->assign('page',$page+1);
        $this->assign('new',$new);

        $this->assign('keyword',input('param.keyword'));
        return view();
    }
}
