<?php
namespace Home\Controller;
use Common\Common\Util;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $actions = Util::getActions();
        $this->assign('actions', $actions);
        $this->display();
    }
    function login(){
        if(I('post.')){
            $username = I('post.username');
            $password = I('post.password');
            if(!($username && $password)){
                throw new \Exception('请填写完整');
            }
            $model = M('user');
            $row = $model->where(['username' => $username])->find();
            if(!($row && is_array($row))){
                throw new \Exception('查无此人');
            }
            $password_read = $row['password'];
            $salt = $row['salt'];
            $password_input = Util::password($password, $salt);
            if($password_read !== $password_input){
                throw new \Exception('密码错误');
            }

            session('user', $row);
            $this->success('登录成功', U('index'));
        } else {
            $this->display();
        }
    }
}