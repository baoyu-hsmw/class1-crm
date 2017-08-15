<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>登录</title>
</head>
<body>
<h1>登录</h1>
<form action="/index.php?m=Home&amp;c=index&amp;a=login" method="post">
    <div>
        <label for="username">用户名</label>
        <input type="text" name="username" id="username" />
    </div>
    <div>
        <label for="password">密码</label>
        <input type="password" name="password" id="password" />
    </div>
    <div>
        <input type="submit" name="登录" />
    </div>
</form>
</body>
</html>