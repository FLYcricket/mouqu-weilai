<?php

namespace Home\Controller;
use Think\Controller;
use Home\Controller\CommonController;
class LoginController extends Controller {


    public function login(){
        $this->display();

    }
public function checklogin(){
    if( IS_POST )  { // 判断用户是否提交
        // 查询数据库中是否存在用户信息
        $user = M('admin');// 实例化news表对象
       // $user->create();// 根据表单提交的POST数据创建数据对象

        $result = $user->where("username='{$_POST['username']}'")->find();
//echo $user->getLastSql();
        if( count($result) > 0 ){
            // 检查用户密码是否正确
            if ( $result['password'] == md5($_POST['password'].$result['salt'])  ){
                // 登录成功
                // 设置session信息
                $_SESSION['is_auth'] = true;
                $_SESSION['user_name'] = $result['username'];
                $_SESSION['power']=$result['power'];
                $date=date('Y-m-d H:i:s');
                $sql = "update admin set login_log = '{$date}' where username='{$_POST['username']}' ";
                 $user->execute($sql);
                // 进入首页
                $this->success('登录成功！',U('Index/index'),1);
            } else {
                $this->error('对不起,用户密码不对，请重新输入！', U('Login/login'), 1);
            }
        } else {
            $this->error('对不起,用户名不存在，请重新输入！', U('Login/login'), 1);
        }
    }


}

}