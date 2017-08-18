<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>添加拜访记录</title>
</head>
<body>
<h1>添加拜访记录</h1>
<form action="/index.php?m=Home&amp;c=visit&amp;a=add" method="post">
    <div>
        <label for="intention">意向</label>
        <select name="intention" id="intention">
            <option value="-1">--请选择--</option>
            <option value="0">无意向</option>
            <option value="1">已达成</option>
            <option value="2">未拜访成功</option>
            <option value="3">有意向但未达成</option>
        </select>
    </div>
    <div>
        <label for="custormer_id">客户</label>
        <select name="custormer_id" id="custormer_id">
            <option value="">--请选择--</option>
            <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><option value="<?php echo ($row["id"]); ?>"><?php echo ($row["name"]); ?>(<?php echo ($row["company"]); ?>, <?php echo ($row["title"]); ?>)</option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </div>
    <div>
        <input type="submit" value="提交" />
    </div>
</form>
</body>
</html>