<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>儿童发展情况剖面图</title>
<link href="/Public/css/bootstrap.min.css" rel="stylesheet">
	<link href="/Public/css/me.css" rel="stylesheet">
	<!-- 在引入bootstrap.min.js核心库之间加载jquery.min.js -->
	<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/Public/js/Chart.min.js"></script>
<style>
	.test{background:url(/Public/images/tu.png) !important ; width:750px; height:743px;}
</style>
</head>
<body>
<div class="container">
	<div class="main" style="padding-left:5.5em;height:100%;">
		<center><h1 class="text-info">儿童发展情况剖面图</h1></center>
			<h4 class="text-right text-info">学生姓名：<?php echo ($stu_name); ?>&nbsp;&nbsp;</h4>
			<hr style="border:1px dotted #31708F;"><br/>
			<div style="padding-right:260px;">
				<div style="width:300;float:right;">
					<div style="float:left;margin-top:-1em;">生理发展年龄:</div><div style="float:right"><hr style="border:1px dotted #0843FF;width:5em;margin-top:-0.5em;"></div>
					<div style="clear:both;"></div>
					<div style="float:left;margin-top:-0.5em;">最近发展区:</div><div style="float:right;margin-top:-1.2em;"><hr style="border:1px dotted red;width:5em;"></div>
					<div style="clear:both;"></div>
					<div style="float:left;margin-top:-0.5em;">实际发展年龄:</div><div style="float:right;margin-top:-1.2em;"><hr style="border:1px dotted black;width:5em;"></div>
				</div>
				<div>
					<table class="table-bordered noprint" id="mytable" style="width:30%;text-align:center;">
						<tr><th class="noprint">选定</th><th>评估次数</th></tr>
						<?php if(is_array($res)): foreach($res as $k=>$v): ?><tr> 
						  <td class="noprint"><a href="/index.php/Record/active/times/<?php echo ($k); ?>"><div class="glyphicon glyphicon-saved"></div></a></td>
						  <td>第<?php echo ($k+1); ?>次</td>
						</tr><?php endforeach; endif; ?>
					</table>
				</div>	
			</div>
			<br/>
		<div class="test" >
			<img src="<?php echo ($img); ?>">
		</div>
		<div class="rec">
				<strong><span style="float:left;">P</span></strong>
				<?php if(is_array($p)): foreach($p as $key=>$v): ?><input type="text" value="<?php echo ($v); ?>"><?php endforeach; endif; ?>
		</div><br/>
		<div class="rec" >
				<strong><span style="float:left;">E</span></strong>
				<?php if(is_array($e)): foreach($e as $key=>$v): ?><input type="text" value="<?php echo ($v); ?>"><?php endforeach; endif; ?>
		</div><br/>
		<center class="noprint">&nbsp;&nbsp;&nbsp;<input type="button" value="打&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;印" class="btn btn-primary btn-lg " onclick="window.print()"></center>
	</div>
</div>
</body>
</html>