<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>谋趣科技-管理中心</title>
    <meta name="Copyright" content="Douco Design." />
    <link href="/thinkphp/Public/cms_1/css/public.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/thinkphp/Public/cms_1/js/jquery.min.js"></script>
    <script type="text/javascript" src="/thinkphp/Public/cms_1/js/global.js"></script>
</head>
<body>
<div id="dcWrap"> <div id="dcHead">
    <div id="head">
        <div class="logo"><a href="index.html"><img src="/thinkphp/Public/cms_1/images/dclogo.gif" alt="logo"></a></div>
        <div class="nav">

            <ul class="navRight">
                <li class="M noLeft"><a href="JavaScript:void(0);">您好,<?php echo $_SESSION['user_name'] ?></a>
                    <div class="drop mUser">
                        <a href="manager.php?rec=edit&id=1">编辑我的个人资料</a>
                        <a href="manager.php?rec=cloud_account">设置云账户</a>
                    </div>
                </li>
                <li class="noRight"><a href="<?php echo U('Index/loginout');?>">退出</a></li>
            </ul>
        </div>
    </div>
</div>
    <!-- dcHead 结束 --> <div id="dcLeft"><div id="menu">
        <ul >
            <li><a href="<?php echo U('Index/index');?>"><i class="home"></i><em>管理首页</em></a></li>
       <!-- </ul>
        <ul>-->
            <li><a href="<?php echo U('Orders/orders');?>"><i class="page"></i><em>订单管理</em></a></li>
            <li><a href="<?php echo U('Orders/create');?>"><i class="article"></i><em>订单生成</em></a></li>
       <!-- </ul>
        <ul>-->
            <li><a href="<?php echo U('Check/check');?>"><i class="page"></i><em>信息审核</em></a></li>
            <li><a href="<?php echo U('Address/address');?>"><i class="productCat"></i><em>地址管理</em></a></li>
            <!--<li><a href="<?php echo U('Article/article');?>"><i class="article"></i><em>文章列表</em></a></li>-->
      <!--  </ul>
        <ul class="bot">-->
            <li><a href="<?php echo U('Admin/manager');?>"><i class="manager"></i><em>网站管理员</em></a></li>
            <li><a href="<?php echo U('User/user');?>"><i class="manager"></i><em>用户信息</em></a></li>
        </ul>
    </div></div>
    <script type="text/javascript">
        $("#menu ul li").click( function () {
            $(this).siblings('li').removeClass('cur');  // 删除其他兄弟元素的样式

            $(this).addClass('cur'); ;

        });
    </script>
<div id="dcMain">
    <!-- 当前位置 -->
    <div id="urHere">谋趣 管理中心<b>></b><strong>用户列表</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
    <div id="list"><h3>用户列表</h3>
        <form name="action" method="post" action="<?php echo U('Article/delete_all_article');?>">
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                <tr>
                    <th width="40" align="center">用户名</th>
                    <th width="40">手机号</th>
                    <th width="100" align="center">性别</th>
                    <th width="100" align="center">年龄</th>
                    <th width="100" align="center">住址</th>
                    <th width="100" align="center">家乡</th>
                    <th width="80" align="center">个人说明</th>
                    <th width="80" align="center">创建时间</th>
                </tr>

                <?php if(is_array($users)): $i = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$users): $mod = ($i % 2 );++$i;?><tr>
                        <td align="center"><?php echo ($users["username"]); ?></td>
                        <td align="center"><?php echo ($users["phone"]); ?></td>
                        <td align="center"><?php echo ($users["sex"]); ?></td>
                        <td align="center"><?php echo ($users["age"]); ?></td>
                        <td align="center"><?php echo ($users["location"]); ?></td>
                        <td align="center"><?php echo ($users["hometown"]); ?></td>
                        <td align="center" id="tag"><?php echo ($users["info"]); ?></td>
                        <td align="center"><?php echo ($users["created"]); ?></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
        </form>
        <div class="page1">
            <?php echo ($pager->show()); ?>
        </div>
    </div>
    <div class="clear"></div>
</div>
</div>
<div class="clear"></div>
<div id="dcFooter">
    <div id="footer">
        <div class="line"></div>
        <ul>
            版权所有 © 2013-2015 漳州豆壳网络科技有限公司，并保留所有权利。
        </ul>
    </div>
</div><!-- dcFooter 结束 -->
<div class="clear"></div> </div>
</body>
</html>