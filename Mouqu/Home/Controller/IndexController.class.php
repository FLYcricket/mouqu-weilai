<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    // 检测自动登录
    public function _initialize()
    {
        //判断用户是否已经登录
        if (!isset($_SESSION['is_auth'])) {
            $this->error('对不起,您还没有登录!请先登录再进行浏览', U('Login/login'), 1);
        }
    }
//首页
    public function Index()
    {
        //print_r($_SESSION['user_name']);
        $this->display();
    }

//登录注销
    public function loginout()
    {
        unset($_SESSION['is_auth']);
        unset($_SESSION['user_name']);
        unset($_SESSION['email']);
        $this->success('退出成功！', U('Login/login'), 3);
    }

}