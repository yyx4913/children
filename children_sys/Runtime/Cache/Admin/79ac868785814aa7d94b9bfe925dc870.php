<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>用户登录</title>
	<!-- 加载Bootstrap样式表 -->
	<link href="/Public/css/bootstrap.min.css" rel="stylesheet">
	<link href="/Public/css/me.css" rel="stylesheet">
	<!-- 在引入bootstrap.min.js核心库之间加载jquery.min.js -->
	<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
	<title>首页头部</title>
</head>
<body style="background-image:url(/Public/images/header.jpg); background-size:cover;">
	<div class="container-fluid">
		<div class="pull-right" style="margin-top:6em;"><a onClick="return confirm('提示：您确定要退出系统吗？')" href="/index.php/Login/logout" 
 target=_top><button type="submit" class="btn btn-primary">退出>></button></a></div>
	</div>
</body>
</html>