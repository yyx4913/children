<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>系统信息</title>
<link href="/Public/css/bootstrap.min.css" rel="stylesheet">
	<link href="/Public/css/me.css" rel="stylesheet">
	<!-- 在引入bootstrap.min.js核心库之间加载jquery.min.js -->
	<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
</head>
<body style="background:#F0F2F5;">
	<div class="container">
		<center><h1 class="text-info">&nbsp;系统信息</h1></center>
		<br/><br/>
		<div class="save"></div>
		<div class="main" style="font-size:1.5em;">
			<b>单位机构名称</b>：　<input type="text" id="units" value="<?php echo ($footer[0]["conf_name"]); ?>">
			<a title="修改名称" id="change">&nbsp;&nbsp;<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
			<br/><br/>
			<b>系统主机网址</b>：　<?php echo ($_SERVER['SERVER_NAME']); ?><br/><br/>
			<b>系统开发方</b>　：　<?php echo ($footer[1]["conf_name"]); ?> <br/><br/>
			<b>系统版本</b>　　：　<?php echo ($footer[2]["conf_name"]); ?><br/><br/>
		</div>
	</div>
</body>
<script>
	$("#change").click(function(){
		var unit = document.getElementById('units').value;
		var data={'unit':unit};
		var url = "config";
		$.post(url,data,function(res){
			$('.save').show();
			$('.save').html(res.message);
			setTimeout(function() {$('.save').hide();}, 2000);
	    },"JSON");
	});
</script>
</html>