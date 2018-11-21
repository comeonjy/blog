<?php
namespace app\index\model;

use think\Model;

class PmArticle extends Model{
    public function getCatslugAttr($value)
    {
        $arr=array(
            'it'=>'业界动态',
            'evaluating'=>'分析评测',
            'operate'=>'产品运营',
            'pmd'=>'产品经理',
            'zhichang'=>'职场攻略',
            'copy'=>'文案策划',
            'active'=>'讲座沙龙',
            'pd'=>'产品设计',
            'chuangye'=>'创业学院',
            'data-analysis'=>'数据分析',
            'user-research'=>'用户研究',
            'ai'=>'AI人工智能',
            'marketing'=>'营销推广',
            'rp'=>'原型设计',
            'ucd'=>'交互体验',
            'blockchain'=>'区块链',
            'discuss'=>'人人专栏',
            'job'=>'招聘信息',
            'kol'=>'大咖分享',
            'newretail'=>'新零售',
            'video'=>'大咖视频',
            'xiazai'=>'干货下载',
            ''=>'未分类'
        );
        return $arr[$value];
    }
}