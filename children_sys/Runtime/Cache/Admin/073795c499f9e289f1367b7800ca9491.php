<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>系统激活</title>
</head>
<body>
	<form action="/index.php/Login/jihuo" method="post">
	<div style="margin-left:25%;width:50%;border:1px solid #C4C4C4; text-align:center;margin-top:8%;" >
		<h1 style="font-size:3.5em; color:red;">系统激活</h1>
		<h2>生成码为:<?php echo ($r); ?></h2>
		<h3>序列号：<input type="text" name="code" style="font-size:1em;"> &nbsp;&nbsp;<input type="submit" name="submit" value="提&nbsp;交"></h3>
		<h4 style="color:red">请联系系统供应商，获取序列号！！</h4><br/>
	</div>
	</form>
</body>
</html>