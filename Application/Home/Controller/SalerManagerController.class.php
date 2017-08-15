<?php
/**
 * The Ice Toad PHP MVC Framework.<php@icetoad.com>
 * Author: Nemo Ling <nemo@icetoad.com>
 * Copyright (c) 2017 IceToad.com
 */

namespace Home\Controller;


use Common\Common\Util;
use Home\Common\HomeBaseController;
use Think\Page;

class SalerManagerController extends HomeBaseController {
    function index(){
        $page = I('get.p', 0, 'intval');
        $page_size = 25;
        $where = ['is_del'=>0,'type'=>0];
        $model = M('user');
        $result = $model->where($where)->page("{$page},{$page_size}")->select();

        $count = $model->where($where)->count();
        $page_obj = new Page($count, $page_size);
        $show = $page_obj->show();

        $this->assign('result', $result);
        $this->assign('show', $show);

        $this->display();
    }

    function delete(){
        $id = Util::getID();
        if(!$id){
            throw new \Exception('参数错误');
        }

        $data = [
            'is_del' => 1
        ];

        $model = M('user');
        if($model->where(['id'=>$id])->save($data)){
            $this->success('操作成功', U('index'));
        } else {
            $this->error('操作失败');
        }
    }

}