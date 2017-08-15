<?php
/**
 * The Ice Toad PHP MVC Framework.<php@icetoad.com>
 * Author: Nemo Ling <nemo@icetoad.com>
 * Copyright (c) 2017 IceToad.com
 */

namespace Home\Controller;


use Home\Common\HomeBaseController;
use Think\Page;

class VisitController extends HomeBaseController {
    function index(){
        $page = I('get.p', 0, 'intval');
        $page_size = 25;
        $model = M('v_visit');
        $result = $model->where(['user_id'=>$this->getUserID()])->page("{$page},{$page_size}")->select();
        $count = $model->where(['user_id'=>$this->getUserID()])->count();
        $page_obj = new Page($count, $page_size);
        $show = $page_obj->show();

        $this->assign('result', $result);
        $this->assign('show', $show);
        $this->display();

    }

    function add(){
        if(I('post.')){
            $intention = I('post.intention', -1, 'intval');
            $custormer_id = I('post.custormer_id', 0, 'intval');
            if(!($intention >= 0 && $custormer_id)){
                throw new \Exception('请填写完整');
            }
            $model = M('visit');
            $data = [
                'dateline' => time(),
                'intention' => $intention,
                'user_id' => $this->getUserID(),
                'custormer_id' => $custormer_id,
            ];
            if($model->add($data)){
                $this->success('添加成功', U('index'));
            } else {
                $this->error('添加失败');
            }
        } else {
            //0：没意向；1：达成意向；2：未拜访成功；3：有意向未达成
            $cus_model = M('custormer');
            $result = $cus_model->where(['user_id'=> $this->getUserID()])->order('`id` DESC')->select();
            $this->assign('result', $result);
            $this->display();
        }
    }
}