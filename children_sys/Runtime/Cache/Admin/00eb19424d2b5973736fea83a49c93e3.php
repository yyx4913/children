<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>评估之后生成信息</title>
<link href="/Public/css/bootstrap.min.css" rel="stylesheet">
	<link href="/Public/css/me.css" rel="stylesheet">
	<!-- 在引入bootstrap.min.js核心库之间加载jquery.min.js -->
	<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
<style>
	.test{ float:left; width:20%;height:730px;margin-left:1.5em;margin-top:1em; background-image:url(/Public<?php echo ($img); ?>) !important;
background-repeat:no-repeat; filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fff5f5f5', endColorstr='#fff9f9f9', GradientType=0);} 
	table{table-layout:fixed;word-wrap:break-word ;}
	table tr td label{width:100%; text-align:center;}
</style>
</head>
<body style="background:#F0F2F5;">
	<div class="container-fluid ">
	<br/>
		<div class="main">
			<center><h1 class="text-info">评估结果分析表</h1></center><br/>
			<table border="1" width="100%" style="table-layout:fixed;word-wrap:break-word ; ">
				<tr><th width="10%"><label>领域</label></th>
					<th width="30%"><label>能力现状分析</label></th>
					<th width="30%"><label>优弱势分析</label></th>
					<th width="30%"><label>训练目标</label></th>
				</tr>
				<tr><td><label><?php echo ($kind_name); ?></label></td>
					<td>
					<?php if(is_array($power)): foreach($power as $key=>$v): echo ($v); endforeach; endif; ?></td>
					<td>
						<div>优势：&nbsp;<?php echo ($status[0]); ?></div>
						<div>劣势：&nbsp;<?php echo ($status[1]); ?></div>
					</td>
					<td>&nbsp;<?php echo ($aim); ?></td>
				</tr>
			</table><br/>
			<center class="noprint">
			<input type="button" value="打&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;印" class="btn btn-primary btn-lg " onclick="window.print()"></center>
		</div>
	</div>
</body>
</html>