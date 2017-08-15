<?php
/**
 * The Ice Toad PHP MVC Framework.<php@icetoad.com>
 * Author: Nemo Ling <nemo@icetoad.com>
 * Copyright (c) 2017 IceToad.com
 */

namespace Common\Common;
use Think\Page;


/**
 * 工具类
 * @package Common
 */
class Util {
    /**
     * 检测手机号码是否正确
     * @param string $mobile 手机号码
     * @return int|FALSE
     */
    static public function checkMobile($mobile){
        $mobile_patt = '/^1[3578][0-9]{9}$/';
        return preg_match($mobile_patt, $mobile);
    }

    /**
     * 检测email是否正确
     * @param string $email email地址
     * @return int|false
     */
    static function checkEmail($email){
        $email_patt = '/^[a-zA-Z0-9\.\-]+@\w+\.*[a-zA-Z]*\.[a-zA-Z]+$/';
        return preg_match($email_patt, $email);
    }

    static function getID(){
        $id = I('get.id');
        $id = intval($id);
        return $id;
    }

    static function salt($len = 6){
        return substr(md5(time()), 0, $len);
    }
    static function password($str, $salt){
        $pwd = md5($str);
        return md5($pwd . $salt);
    }
    static function getActions(){
        return [
            'customer' => [
                'index', 'add', 'edit', 'delete'
            ],
            'report' => [
                'index','all'
            ],
            'salermanager' => [
                'index','delete'
            ],
            'visit' => [
                'index', 'add'
            ]
        ];
    }
    static function page($table_name, $where, $order=null){
        $page = I('get.p', 0, 'intval');
        $page_size = 25;
        $model = M($table_name);
        if(!$order) {
            $result = $model->where($where)->page("{$page},{$page_size}")->select();
        } else {
            $result = $model->where($where)->page("{$page},{$page_size}")->order($order)->select();
        }

        $count= $model->where($where)->count();
        $page_obj = new Page($count, $page_size);
        $show = $page_obj->show();

        return [$result, $show];
    }
}