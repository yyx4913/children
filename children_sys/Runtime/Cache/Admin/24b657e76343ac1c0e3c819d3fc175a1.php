<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>脚部</title>
	<link href="/Public/css/bootstrap.min.css" rel="stylesheet">
	<link href="/Public/css/me.css" rel="stylesheet">
	<!-- 在引入bootstrap.min.js核心库之间加载jquery.min.js -->
	<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
</head>
<body style="background:#3B3B3B;color:white; padding-top:0.5em;">
	<h4 >
   		<center>单位名称：<?php echo ($footer[0]["conf_name"]); ?>　　　　　&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;　　当前操作人员：<?php echo session(admin_name),session(u_name) ?>
   			　　　&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;　　　技术支持：<?php echo ($footer[3]["conf_name"]); ?>
   		</center>
   </h4>

</body>
</html>