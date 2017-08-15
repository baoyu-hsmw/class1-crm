<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>分配权限</title>
</head>
<body>
<h1>分配权限</h1>
<form action="/index.php?m=Admin&amp;c=User&amp;a=permission&amp;id=2" method="post">
    <ul style="list-style: none;">
        <?php if(is_array($actions)): foreach($actions as $ctrl_name=>$ctrl): if(is_array($ctrl)): $i = 0; $__LIST__ = $ctrl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$action): $mod = ($i % 2 );++$i;?><li>
                    <?php $checked = in_array("$ctrl_name/$action", $permissiones); ?>
                    <?php if($checked): ?><input type="checkbox" name="permission[]" id="permission_<?php echo ($ctrl_name); ?>_<?php echo ($action); ?>" value="<?php echo ($ctrl_name); ?>/<?php echo ($action); ?>" checked="checked" /> <label for="permission_<?php echo ($ctrl_name); ?>_<?php echo ($action); ?>"><?php echo ($ctrl_name); ?>/<?php echo ($action); ?></label>
                        <?php else: ?>
                        <input type="checkbox" name="permission[]" id="permission_<?php echo ($ctrl_name); ?>_<?php echo ($action); ?>" value="<?php echo ($ctrl_name); ?>/<?php echo ($action); ?>" /> <label for="permission_<?php echo ($ctrl_name); ?>_<?php echo ($action); ?>"><?php echo ($ctrl_name); ?>/<?php echo ($action); ?></label><?php endif; ?>
                </li><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; ?>
    </ul>
    <div>
        <input type="submit" value="确定" name="submit" />
    </div>
</form>
</body>
</html>