<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="/thinkphp/Public/css/reset.css" />
    <link rel="stylesheet" href="/thinkphp/Public/css/login.css" />
</head>
<body>
<div class="page">
    <div class="loginwarrp">
        <div class="logo">管理员登陆</div>
        <p class="error"><?php echo $error_tips;?></p>
        <div class="login_form">
            <form id="login" name="login" method="post" action="<?php echo U ('Login/checklogin');?>">
                <li class="login-item">
                    <span>用户名：</span>
                    <input type="text" name="username" class="login_input" placeholder="请输入用户名" required="required">
                </li>
                <li class="login-item">
                    <span>密　码：</span>
                    <input type="password" name="password" class="login_input" placeholder="密　码" required="required">
                </li>
                <div class="clearfix"></div>
                <li class="login-sub">
                    <input type="submit" name="Submit" value="登录" />
                </li>
            </form>
        </div>
    </div>
</div>
</body>
</html>