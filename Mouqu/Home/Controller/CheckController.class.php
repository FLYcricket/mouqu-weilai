<?php
namespace Home\Controller;

use Think\Controller;
use Think\Image;
use Think\Page;
use Think\Model;
use Think\Upload;
use Think\Verify;

class CheckController extends Controller
{

    public function check()
    {
        $data = M("check_info");
        $amount = $data->count();
        $page_size = 8;
        $page = I('get.p', 1);
        $this->pager = new Page($amount, $page_size);
        $this->pager->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $this->pager->setConfig('prev', '上一页');
        $this->pager->setConfig('next', '下一页');
        $this->check = $data->page("{$page},{$page_size}")->field("check_info.id,check_info.name,check_info.remarks,check_info.status,user.username")->join("left JOIN user ON user.id=check_info.userid ")->select();
        $this->display();

    }

    public function info($id)
    {
        $data = M("check_info");
        $this->info = $data->find($id);
        $this->display();

    }

    public function insert()
    {
        //print_r($_POST);
        // exit;
        $data = M('check_info');
        $data->create();
        $result = $data->save(); // 写入删除语句到数据库
        if ($result) {
            $this->success('操作成功！', U('Check/check'), 1);
        } else {
            $this->error($data->getError());
        }

    }


}