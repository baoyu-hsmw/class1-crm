<?php
/**
 * The Ice Toad PHP MVC Framework.<php@icetoad.com>
 * Author: Nemo Ling <nemo@icetoad.com>
 * Copyright (c) 2017 IceToad.com
 */

namespace Home\Controller;

use \Common\Common\Util;
use \Home\Common\HomeBaseController;
use Think\Page;

/**
 * 客户管理（销售代表）
 * @package Home\Controller
 */
class CustomerController extends HomeBaseController {
    function index(){
        //这里显示的是当前登录用户的客户列表
//        $page = intval(I('get.p'));
//        $page_size = 2;
//        $model = M('custormer');
//        $result = $model->where(['user_id'=> $this->getUserID()])->order('`id` DESC')->page("{$page},{$page_size}")->select();
//
//        $count = $model->where(['user_id'=> $this->getUserID()])->count();
//        $page_obj = new Page($count, $page_size);
//        $show = $page_obj->show();
        $p = Util::page('custormer',['user_id'=> $this->getUserID()],'`id` DESC');
        $result = $p[0];
        $show=$p[1];
        $this->assign('result', $result);
        $this->assign('show', $show);
        $this->display();
    }
    function add(){
        if(I('post.')){ //$_POST
            $name = I('post.name');
            $mobile = I('post.mobile');
            $company = I('post.company');
            $address = I('post.address');
            $email = I('post.email');
            $title = I('post.title');
            if(!($name && $mobile && $company && $address && $email && $title)){
                throw new \Exception('请填写完整');
            }
            //使用正则表达式来判断手机号码是否合法
            //手机号码的规则：11位的数字；以1开头；第2位可以是：3578；第3位开始是0-9
            if(!Util::checkMobile($mobile)){
                throw new \Exception('手机号码不正确');
            }
            //使用正则表达式来判断email是否合法
            // zhangsan@163.com
            // li-si@sina.com.cn
            // wang5@qq.com
            // wu.wang@gmail.com
            // 212213@qq.com
            // 212323@vip.qq.com
            if(!Util::checkEmail($email)){
                throw new \Exception('邮箱地址非法');
            }

            $data = [
                'name' => $name,
                'mobile' => $mobile,
                'company' => $company,
                'address' => $address,
                'email' => $email,
                'title' => $title,
                'dateline' => time(),
                'user_id' => $this->getUserID(),
            ];
            $model = M('custormer');
            if($model->add($data)){
                $this->success('添加成功', U('index'));
            } else {
                $this->error('添加失败');
            }
        } else {
            $this->display();
        }
    }
    function edit(){
        $id = Util::getID();
        if(!$id){
            throw new \Exception('参数错误');
        }
        if(I('post.')){
            $name = I('post.name');
            $mobile = I('post.mobile');
            $company = I('post.company');
            $address = I('post.address');
            $email = I('post.email');
            $title = I('post.title');
            if(!($name && $mobile && $company && $address && $email && $title)){
                throw new \Exception('请填写完整');
            }
            //使用正则表达式来判断手机号码是否合法
            //手机号码的规则：11位的数字；以1开头；第2位可以是：3578；第3位开始是0-9
            if(!Util::checkMobile($mobile)){
                throw new \Exception('手机号码不正确');
            }
            //使用正则表达式来判断email是否合法
            // zhangsan@163.com
            // li-si@sina.com.cn
            // wang5@qq.com
            // wu.wang@gmail.com
            // 212213@qq.com
            // 212323@vip.qq.com
            if(!Util::checkEmail($email)){
                throw new \Exception('邮箱地址非法');
            }
            $data = [
                'name' => $name,
                'mobile' => $mobile,
                'company' => $company,
                'address' => $address,
                'email' => $email,
                'title' => $title,
                'dateline' => time(),
                'user_id' => $this->getUserID(),
            ];
            $model = M('custormer');
            if($model->where("`id`={$id}")->save($data)){
                $this->success('修改成功', U('index'));
            } else {
                $this->error('修改失败');
            }
        } else {
            $model = M('custormer');
            $result = $model->where("`id`={$id}")->find();
            unset($model);
            if(!$result){
                throw new \Exception('不存在的记录');
            }
            $this->assign('result', $result);
            $this->display();
        }
    }
    function delete(){
        $id = I('get.id');
        $id = intval($id);
        if(!$id){
            throw new \Exception('参数错误');
        }
        $model =  M('custormer');
        if($model->where("`id`={$id}")->delete()){
            $this->success('删除成功', U('index'));
        } else {
            $this->error('删除失败');
        }
    }
}