<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>拜访列表</title>
</head>
<body>
<h1>拜访列表</h1>
<table border="1" width="100%">
    <tr>
        <th>客户</th>
        <th>时间</th>
        <th>意向</th>
    </tr>
    <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr>
        <td><?php echo ($row["cus_name"]); ?> <small><?php echo ($row["company"]); ?>(<?php echo ($row["title"]); ?>)</small></td>
        <td><?php echo (date('Y/m/d H:i:s',$row["dateline"])); ?></td>
        <td>
        <?php switch($row["intention"]): case "0": ?>没有意向<?php break;?>
            <?php case "1": ?>达成意向<?php break;?>
            <?php case "2": ?>未拜访成功<?php break;?>
            <?php case "3": ?>有意向未达成<?php break;?>
            <?php default: ?>错误的类型<?php endswitch;?>
        </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<div>
    <?php echo ($show); ?>
</div>
</body>
</html>