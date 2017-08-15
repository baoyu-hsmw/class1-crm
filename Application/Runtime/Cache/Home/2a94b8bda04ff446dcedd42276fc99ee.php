<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>用户首页</title>
</head>
<body>
<h1>用户首页</h1>
<?php if(is_array($actions)): foreach($actions as $ctrl_name=>$ctrl): if(is_array($ctrl)): $i = 0; $__LIST__ = $ctrl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$action): $mod = ($i % 2 );++$i;?><a href="/index.php?c=<?php echo ($ctrl_name); ?>&a=<?php echo ($action); ?>"><?php echo ($ctrl_name); ?>/<?php echo ($action); ?></a> <br><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; ?>
</body>
</html>