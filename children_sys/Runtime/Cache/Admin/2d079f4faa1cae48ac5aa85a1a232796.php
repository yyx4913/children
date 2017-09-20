<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>评估结果分析表汇总</title>
<link href="/Public/css/bootstrap.min.css" rel="stylesheet">
	<link href="/Public/css/me.css" rel="stylesheet">
	<!-- 在引入bootstrap.min.js核心库之间加载jquery.min.js -->
	<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
</head>
<body style="background:#F0F2F5;">
	<div class="container-fluid ">
		<div class="main" style="margin-top:1em;">
			<center><h1 class="text-info">评估结果分析表汇总</h1></center>
			<hr style="border:1px solid #A7B9CB;">
			<?php if(is_array($kind)): foreach($kind as $k=>$v): ?><table border="1" width="100%">
				<tr><td style="text-align:center; width:100px;"><b><?php echo ($v); ?></b></td>
				<td width="500"><table border="1">
					<?php if(is_array($arr[$k])): foreach($arr[$k] as $key=>$v1): ?><tr><td style="padding-left:1em;width:800px;">
					<?php echo ($v1); ?></td></tr><?php endforeach; endif; ?></table>
				</td></tr>
			</table><?php endforeach; endif; ?>
		</div>		
	</div>
</body>
</html>