<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>销售代表管理</title>
</head>
<body>
<h1>销售代表管理</h1>
<table width="100%" border="1">
    <tr>
        <th>销售代表</th>
        <th>操作</th>
    </tr>
    <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr>
        <td><?php echo ($row["username"]); ?></td>
        <td>
            <a href="<?php echo U('delete', ['id' => $row['id']]);?>">删除</a>
        </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<div><?php echo ($show); ?></div>
</body>
</html>