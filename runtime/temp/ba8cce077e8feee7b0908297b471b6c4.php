<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"D:\workspace\project\blog\public/../application/index\view\passport\login.html";i:1542535597;}*/ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>会员登录</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="shortcut icon" href="/static/admin/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/static/admin/css/font.css">
    <link rel="stylesheet" href="/static/admin/css/weadmin.css">
    <script src="/static/lib/layui/layui.js" charset="utf-8"></script>
    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
</head>
<body class="login-bg">

<div class="login">
    <div class="message">会员登录</div>
    <div id="darkbannerwrap"></div>

    <form class="layui-form" >
        <input name="account" placeholder="账号"  type="text" lay-verify="required" class="layui-input" >
        <hr class="hr15">
        <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
        <hr class="hr15">
        <input class="loginin" value="登录" lay-submit lay-filter="login" style="width:100%;" type="button">
        <hr class="hr20" >

    </form>
</div>

<script type="text/javascript">

    layui.extend({
        admin: '{/}../../static/admin/js/admin'
    });
    layui.use(['form','admin'], function(){
        var form = layui.form
            ,admin = layui.admin;
        //监听提交
        form.on('submit(login)', function(data){
            $.post(
                "<?php echo url('passport/login'); ?>",
                data.field,
                function (res) {
                    res=JSON.parse(res);
                    if (res.status==0){
                        layer.msg(res.msg);
                    } else{
                        layer.msg('登录成功！',{time:500},function(data){
                            location.href='<?php echo url("index/index"); ?>'
                        });
                    }
                }

            );

            return false;
        });
    });
</script>
<!-- 底部结束 -->
</body>
</html>