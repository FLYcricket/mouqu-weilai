<?php
namespace Home\Controller;

use Think\Controller;
use Think\Image;
use Think\Page;
use Think\Model;
use Think\Upload;
use Think\Verify;

class AdminController extends Controller
{
//管理员列表
    public function manager()
    {
        $data = M('admin');
        $amount = $data->count();
        $page_size = 3;
        $page = I('get.p', 1);
        $this->pager = new Page($amount, $page_size);
        $this->pager->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $this->pager->setConfig('prev', '上一页');
        $this->pager->setConfig('next', '下一页');
        $this->admin = $data->page("{$page},{$page_size}")->select();
        $this->display();
    }

    //添加管理员
    public function add_manager()
    {
        $this->display();
    }

//添加管理员sql语句插入数据库
    public function insert_manager()
    {
        //print_r($_POST);
        // exit;
        $data = D('admin');
        if ($_POST['password'] == $_POST['password2']) {
            if ($data->create()) {// 根据表单提交的POST数据创建数据对象
                $salt = substr(md5(time() . rand(1000, 9999)), 0, 10);   // 生成一个10位的随机数，做为密码加密的盐，保证密码的安全性
                // 将用户输入的密码和satl字符串进行连接，在加密，保证密码的安全性
                $password = md5($_POST['password'] . $salt);
                $data->password = $password;
                $data->salt = $salt;
                $data->power = implode(",", $_POST['power']);
                $result = $data->add(); // 写入数据到数据库
                if ($result) {
                    $this->success('操作成功！', U('Admin/manager'), 3);
                } else {
                    $this->error('写入错误！');
                }
            } else {
                $this->error($data->getError());
            }
        } else {
            $this->error('前后密码不一致，请重新输入！');
        }
    }

    //删除管理员
    public function manager_delete($id)
    {
        $admin = M('admin');// 实例化news表对象
        $admin->create();// 根据表单提交的POST数据创建数据对象
        $result = $admin->delete($id); // 写入删除语句到数据库
        if ($result) {
            $this->success('操作成功！', U('Admin/manager'), 3);
        } else {
            $this->error('写入错误！');
        }
    }

    //管理员信息编辑
    public function editor_manager($id)
    {
        $data = M('admin');
        $this->admin = $data->find($id);
        $this->display();

    }

    //管理员信息提交处理
    public function edit_manager()
    {
        $data = M('admin');
        $this->check_admin = $data->find($_POST['id']);
        if ($this->check_admin['password'] == $_POST['password1']) {
            if ($_POST['password'] == $_POST['password2']) {
                if ($data->create()) {// 根据表单提交的POST数据创建数据对象
                    $result = $data->save(); // 写入数据到数据库
                    if ($result) {
                        $this->success('操作成功！', U('Admin/manager'), 3);
                    } else {
                        $this->error('写入错误！');
                    }
                } else {
                    $this->error($data->getError());
                }
            } else {
                $this->error('前后密码不一致，请重新输入！');
            }
        } else {
            $this->error('原密码不正确，请重新输入！');
        }
    }

}
