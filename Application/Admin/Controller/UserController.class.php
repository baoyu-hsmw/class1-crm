<?php
/**
 * The Ice Toad PHP MVC Framework.<php@icetoad.com>
 * Author: Nemo Ling <nemo@icetoad.com>
 * Copyright (c) 2017 IceToad.com
 */

namespace Admin\Controller;


use Admin\Common\AdminBaseController;
use Common\Common\Util;
use Think\Page;

class UserController extends AdminBaseController {
    function index(){
        $page = I('get.p', 0, 'intval');
        $page_size = 25;
        $model = M('user');
        $result = $model->where(['is_del'=>0])->page("{$page},{$page_size}")->select();

        $count = $model->where(['is_del' => 0])->count();
        $page_obj = new Page($count, $page_size);
        $show = $page_obj->show();

        $this->assign('result', $result);
        $this->assign('show', $show);
        $this->display();
    }
    function add(){
        if(I('post.')){
            $username = I('post.username');
            $password = I('post.password');
            if(!($username && $password)){
                throw new \Exception('请填写完整');
            }

            $salt = Util::salt();
            $pwd = Util::password($password, $salt);

            $data = [
                'username' => $username,
                'password' => $pwd,
                'salt' => $salt,
                'permission' => '',
                'type' => 0,
                'is_del' => 0,
            ];

            $model = M('user');
            if($model->add($data)){
                $this->success('用户添加成功', U('index'));
            } else {
                $this->error('用户添加失败');
            }
        } else {
            $this->display();
        }
    }

    function permission(){
        $id = Util::getID();
        if(!$id){
            throw new \Exception('参数错误');
        }
        if(I('post.')){
            $permissiones = I('post.permission'); //它是一个数组：因为你是多选的
            if(!($permissiones && is_array($permissiones))){
                throw new \Exception('请至少分配一个权限');
            }
            $permission = implode(',', $permissiones); //把数组变成字符串
            //$permission = json_encode($permissiones); //把数组变成json字符串
            $data = [
              'permission' => $permission
            ];
            $model = M('user');
            if($model->where(['id'=>$id])->save($data)){
                $this->success('权限分配成功', U('index'));
            } else {
                $this->error('分配失败');
            }
        } else {
            $model = M('user');
            $permission = $model->field('permission')->where(['id'=>$id])->find();
            $permission = array_pop($permission);
            //$permission = $permission['permission'];
            $permissiones = explode(',', $permission);
            $actions = Util::getActions();
            $this->assign('actions', $actions);
            $this->assign('permissiones', $permissiones);
            $this->display();
        }
    }
}