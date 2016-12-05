<?php
namespace Home\Controller;
use Think\Controller;
use Think\Image;
use Think\Page;
use Think\Model;
use Think\Upload;
use Think\Verify;
class AddressController extends Controller {

    public function address(){
        $data=M("address");
        $amount = $data->count();
        $page_size = 8;
        $page = I('get.p', 1);
        $this->pager = new Page($amount, $page_size);
        $this->pager->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $this->pager->setConfig('prev', '上一页');
        $this->pager->setConfig('next', '下一页');
        $this->address = $data->page("{$page},{$page_size}")->select();
        $this->display();

    }

    public function edit($id){
        $data=M('address');
        $this->address= $data->find($id);
        $this->display();
    }

    public  function insert(){
        //print_r($_POST);
        // exit;
        $data = M('address');
        $data->create();
        $result = $data->save(); // 写入删除语句到数据库
        if ($result) {
            $this->success('操作成功！', U('address/address'), 1);
        } else {
            $this->error($data->getError());
        }

    }

    public function delete($id)
    {
        //print_r($id);
        // exit;

        $address = M('address');// 实例化news表对象
        $address->create();// 根据表单提交的POST数据创建数据对象
        $result = $address->delete($id); // 写入删除语句到数据库
        if ($result) {
            $this->success('操作成功！',  U('address/address'), 1);
        } else {
            $this->error('写入错误！');
        }
    }





}