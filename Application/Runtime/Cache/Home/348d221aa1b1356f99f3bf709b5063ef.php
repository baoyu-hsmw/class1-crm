<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>修改客户</title>
</head>
<body>
<h1>修改客户</h1>
<form action="/index.php?m=Home&amp;c=Customer&amp;a=edit&amp;id=9" method="post">
    <div>
        <label for="name">客户姓名：</label>
        <input type="text" name="name" id="name" value="<?php echo ($result["name"]); ?>" />
    </div>
    <div>
        <label for="mobile">手机号码：</label>
        <input type="text" name="mobile" id="mobile" value="<?php echo ($result["mobile"]); ?>" />
    </div>
    <div>
        <label for="company">公司名称：</label>
        <input type="text" name="company" id="company" value="<?php echo ($result["company"]); ?>" />
    </div>
    <div>
        <label for="address">地址：</label>
        <input type="text" name="address" id="address" value="<?php echo ($result["address"]); ?>" />
    </div>
    <div>
        <label for="email">邮箱：</label>
        <input type="text" name="email" id="email" value="<?php echo ($result["email"]); ?>" />
    </div>
    <div>
        <label for="title">头衔：</label>
        <input type="text" name="title" id="title" value="<?php echo ($result["title"]); ?>" />
    </div>
    <div>
        <input type="submit" value="提交" />
    </div>
</form>
</body>
</html>