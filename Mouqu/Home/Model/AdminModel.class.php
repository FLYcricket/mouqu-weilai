<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/29
 * Time: 16:46
 */
namespace Home\Model;
use Think\Model;
class AdminModel extends Model{
    // 定义自动验证
    protected $_validate  = array(
        array('username', 'require', '请填写用户名'),
    );

    // 定义自动完成
    protected $_auto = array(
        array('created_at', 'getDate', Model::MODEL_INSERT, 'callback'),
        array('created_at', 'getDate', Model::MODEL_UPDATE, 'callback'),
        array('login_log', 'getDate', Model::MODEL_UPDATE, 'callback'),
        array('create', 'getDate', Model::MODEL_UPDATE, 'callback'),
    );

    // 获取当前日期时间
    public function getDate()
    {
        return date("Y-m-d H:i:s");
    }
}