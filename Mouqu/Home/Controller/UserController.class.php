<?php
namespace Home\Controller;
use Think\Controller;
use Think\Image;
use Think\Page;
use Think\Model;
use Think\Upload;
use Think\Verify;
class UserController extends Controller {
    public function user(){
        $data=M("user");
        $amount = $data->count();
        $page_size = 8;
        $page = I('get.p', 1);
        $this->pager = new Page($amount, $page_size);
        $this->pager->setConfig('theme', '%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        $this->pager->setConfig('prev', '上一页');
        $this->pager->setConfig('next', '下一页');
        $this->users = $data->page("{$page},{$page_size}")->field("username,created,sex,age,tag,location,hometown,phone,info")->select();
        $this->display();
    }
}