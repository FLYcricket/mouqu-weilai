<?php
namespace Home\Controller;

use Think\Controller;
use Think\Image;
use Think\Page;
use Think\Model;
use Think\Upload;
use Think\Verify;

class OrdersController extends Controller
{

    public function orders()
    {
        $data = M("orders");

        if ($_POST) {
            if ($_POST['cat'] == "user.username" || $_POST['cat'] == "orders.content") {
                $cat = $_POST['cat'];
                $condition["{$cat}"] = array('like', "%{$_POST['keywords']}%");
                $amount = $data->field("orders.*,user.username")->join("left JOIN user ON user.id=orders.ad_id ")->where($condition)->count();
                $page_size = 8;
                $page = I('get.p', 1);
                $this->pager = new Page($amount, $page_size);
                $this->pager->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
                $this->pager->setConfig('prev', '上一页');
                $this->pager->setConfig('next', '下一页');

                $this->orders = $data->page("{$page},{$page_size}")->field("orders.*,user.username")->join("left JOIN user ON user.id=orders.ad_id ")->where($condition)->order('orders.create desc,orders.orderstatus')->select();
            } elseif ($_POST['cat'] == "orders.orderid") {
                $amount = $data->where("{$_POST['cat']} = '{$_POST['keywords']}'")->count();
                $page_size = 8;
                $page = I('get.p', 1);
                $this->pager = new Page($amount, $page_size);
                $this->pager->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
                $this->pager->setConfig('prev', '上一页');
                $this->pager->setConfig('next', '下一页');
                $this->orders = $data->page("{$page},{$page_size}")->field("orders.*,user.username")->join("left JOIN user ON user.id=orders.ad_id ")->where("{$_POST['cat']} = '{$_POST['keywords']}'")->order('orders.create desc,orders.orderstatus')->select();
            } else {
                $amount = $data->count();
                $page_size = 8;
                $page = I('get.p', 1);
                $this->pager = new Page($amount, $page_size);
                $this->pager->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
                $this->pager->setConfig('prev', '上一页');
                $this->pager->setConfig('next', '下一页');
                $this->orders = $data->page("{$page},{$page_size}")->field("orders.*,user.username")->join("left JOIN user ON user.id=orders.ad_id ")->order('orders.create desc,orders.orderstatus')->select();
            }
        } else {
            $amount = $data->count();
            $page_size = 8;
            $page = I('get.p', 1);
            $this->pager = new Page($amount, $page_size);
            $this->pager->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
            $this->pager->setConfig('prev', '上一页');
            $this->pager->setConfig('next', '下一页');
            $this->orders = $data->page("{$page},{$page_size}")->field("orders.*,user.username")->join("left JOIN user ON user.id=orders.ad_id ")->order('orders.create desc,orders.orderstatus')->select();
        }
        //echo $data->getLastSql();
        //var_dump($condition);
        $this->display();

    }



    public function edit($id)
    {
        $data = M('orders');
        $this->orders = $data->find($id);
        $this->display();
    }

    public function insert()
    {
        //print_r($_POST);
        // exit;
        $data = M('orders');
        $data->create();
        $result = $data->save(); // 写入删除语句到数据库
        if ($result) {
            $this->success('操作成功！', U('Orders/orders'), 1);
        } else {
            $this->error($data->getError());
        }

    }

    public function delete($id)
    {
        //print_r($id);
        // exit;

        $orders = M('orders');// 实例化news表对象
        $orders->create();// 根据表单提交的POST数据创建数据对象
        $result = $orders->delete($id); // 写入删除语句到数据库
        if ($result) {
            $this->success('操作成功！', U('Orders/orders'), 1);
        } else {
            $this->error('写入错误！');
        }
    }

    //生成订单页面
    public function create()
    {
        //随机生成一个订单号
        $this->orderid = "MQ_" . date('YmdHis') . rand(0, 9999);
        //print_r($this->orderid);
        $this->display();
    }

    //写入订单
    public function order()
    {

        $data = D('orders');
        if ($data->create()) {// 根据表单提交的POST数据创建数据对象
            $data->create = date("Y-m-d H:i:s");
            $data->servicestatus = 0;
            $data->manage = $_SESSION['user_name'];
            $result = $data->add(); // 写入数据到数据库
            if ($result) {
                $this->success('操作成功！', U('Orders/orders'), 1);
            } else {
                $this->error('写入错误！');
            }
        } else {
            $this->error($data->getError());
        }
    }


    //发布
    public function publish($id)
    {
        $data = M('orders');
        $sql = "UPDATE `mouqu`.`orders` SET `orderstatus` = '已发布' WHERE `orders`.`id` = {$id};";

        $result = $data->execute($sql); // 写入删除语句到数据库
        if ($result) {
            $this->success('操作成功！', U('Orders/orders'), 1);
        } else {
            $this->error($data->getError());
        }
    }

}