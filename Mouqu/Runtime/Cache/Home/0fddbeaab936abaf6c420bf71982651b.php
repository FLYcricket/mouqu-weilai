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
    <div id="urHere">谋趣 管理中心<b>></b><strong>订单生成</strong></div>
    <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <div id="list"><h3><a href="orders.html" class="actionBtn">返回列表</a>订单生成</h3>
            <form name="action" method="post" action="<?php echo U('Orders/order');?>">
                <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                    <tr>
                        <th>订单号</th>
                        <td><input type="text" name="orderid" value="<?php echo ($orderid); ?>" size="80" class="inpMain"/>
                        </td>
                    </tr>
                    <tr>
                        <th align="center">用户id</th>
                        <td><input type="text" name="ad_id" value="" size="80" class="inpMain"/></td>
                    </tr>
                    <tr>
                        <th align="center">订单内容</th>
                        <td><input type="text" name="content" value="" size="80" class="inpMain"/></td>
                    </tr>
                    <tr>
                        <th align="center">单价</th>
                        <td><input type="text" name="price" value="" size="80" class="inpMain"/></td>
                    </tr>
                    <tr>
                        <th align="center">数量</th>
                        <td><input type="text" name="num" value="" size="80" class="inpMain"/></td>
                    </tr>
                    <tr>
                        <th align="center">订单标签</th>
                        <td><input type="text" name="tag" value="" size="80" class="inpMain"/></td>
                    </tr>

                    <tr>
                    <th align="center">手机号码</th>
                    <td>
                        <input type="text" name="mobile" value="" size="80" class="inpMain"/>
                    </td>
                </tr>
                    <tr>
                        <th align="center">地址</th>
                        <td>
                            <input type="text" name="address" value="" size="80" class="inpMain"/>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2" align="center"><input type="submit" class="btn" value="提交">&nbsp;&nbsp;&nbsp;
                        </th>
                    </tr>
                </table>
            </form>
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