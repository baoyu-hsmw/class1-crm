<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>个人业绩报表</title>
</head>
<body>
<h1>个人业绩报表</h1>
<table border="1" width="100%">
    <tr>
        <th>没有意向</th>
        <td> <?php echo ($result["0"]["count"]); ?> 个</td>
    </tr>
    <tr>
        <th>达成意向</th>
        <td> <?php echo ($result["1"]["count"]); ?> 个</td>
    </tr>
    <tr>
        <th>未拜访成功</th>
        <td> <?php echo ($result["2"]["count"]); ?> 个</td>
    </tr>
    <tr>
        <th>有意向未达成</th>
        <td> <?php echo ($result["3"]["count"]); ?> 个</td>
    </tr>
</table>
</body>
</html>