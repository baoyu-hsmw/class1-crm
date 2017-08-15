<?php
/**
 * The Ice Toad PHP MVC Framework.<php@icetoad.com>
 * Author: Nemo Ling <nemo@icetoad.com>
 * Copyright (c) 2017 IceToad.com
 */

namespace Home\Controller;


use Home\Common\HomeBaseController;
use Think\Model;

class ReportController extends HomeBaseController {
    function index(){
        $model = new Model();
        $sql = "SELECT COUNT(*) AS `count` FROM `visit` WHERE `intention`=0 AND `user_id`={$this->getUserID()}
UNION ALL
SELECT COUNT(*) AS `count` FROM `visit` WHERE `intention`=1 AND `user_id`={$this->getUserID()}
UNION ALL
SELECT COUNT(*) AS `count` FROM `visit` WHERE `intention`=2 AND `user_id`={$this->getUserID()}
UNION ALL
SELECT COUNT(*) AS `count` FROM `visit` WHERE `intention`=3 AND `user_id`={$this->getUserID()}";
        $result = $model->query($sql);
        $this->assign('result', $result);
        $this->display();
    }
    function all(){
        $model = new Model();
        $sql = "SELECT COUNT(*) AS `count` FROM `visit` WHERE `intention`=0 
UNION ALL
SELECT COUNT(*) AS `count` FROM `visit` WHERE `intention`=1 
UNION ALL
SELECT COUNT(*) AS `count` FROM `visit` WHERE `intention`=2 
UNION ALL
SELECT COUNT(*) AS `count` FROM `visit` WHERE `intention`=3";
        $result = $model->query($sql);
        $this->assign('result', $result);
        $this->display();
    }
    function index1(){
        $model = M('visit');
        $count_0 = $model->where(['intention' => 0, 'user_id'=>$this->getUserID()])->count();
        $count_1 = $model->where(['intention' => 1, 'user_id'=>$this->getUserID()])->count();
        $count_2 = $model->where(['intention' => 2, 'user_id'=>$this->getUserID()])->count();
        $count_3 = $model->where(['intention' => 3, 'user_id'=>$this->getUserID()])->count();

        $this->assign('count_0', $count_0);
        $this->assign('count_1', $count_1);
        $this->assign('count_2', $count_2);
        $this->assign('count_3', $count_3);
        $this->display();
    }
}