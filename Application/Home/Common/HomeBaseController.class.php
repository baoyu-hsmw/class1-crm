<?php
/**
 * The Ice Toad PHP MVC Framework.<php@icetoad.com>
 * Author: Nemo Ling <nemo@icetoad.com>
 * Copyright (c) 2017 IceToad.com
 */

namespace Home\Common;


use Think\Controller;

class HomeBaseController extends Controller {
    //这个方法会自动调用，而且是在所有你写的方法之前
    protected function _initialize(){

       $this->checkLogin();
       $this->checkPermission();
    }
    function getUserID(){
        return session('user.id');
    }
    function checkPermission(){
        $permission = session('user.permission'); //session('user')['permission']
        if(!$permission){
            $this->error('你没有任何权限', U('index/login'));
        }
        $permissiones = explode(',', $permission);
        //你要拿到用户当前在哪个控制器和方法里
        $current_url = strtolower(CONTROLLER_NAME . '/' . ACTION_NAME);
        if(!in_array($current_url, $permissiones)){
            $this->error('你没有访问该页面的权限', U('index/index'));
        }
    }
    function checkLogin(){
        if(!session('user')){
            $this->error('请登录', U('index/login'));
        }
    }
}