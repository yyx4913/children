<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>康复转衔列表</title>
<link href="/Public/css/bootstrap.min.css" rel="stylesheet">
	<link href="/Public/css/me.css" rel="stylesheet">
	<!-- 在引入bootstrap.min.js核心库之间加载jquery.min.js -->
	<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
</head>
<body style="background:#F0F2F5;">
	<div class="container-fluid ">
		<div class="main" style="margin-top:1em;">
			<center><h1 class="text-info">后续跟踪调查表汇总</h1></center>
			<hr style="border:1px solid #A7B9CB;">
			<ul style="font-size:1.5em;">
				<?php if(is_array($num)): foreach($num as $key=>$v): ?><li><?php echo ($v); ?></li>
				<hr style="border:1px dotted #A7B9CB;margin:0.2em auto 0.5em auto;"><?php endforeach; endif; ?>
			</ul><br/><br/>
			<center><a href="/index.php/Direction/add_dir"><button class="btn btn-info btn-lg " >添&nbsp;&nbsp;&nbsp;&nbsp;加</button></a></center>
		</div>		
	</div>
</body>
</html>