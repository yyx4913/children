<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>训练建议</title>
<link href="/Public/css/bootstrap.min.css" rel="stylesheet">
	<link href="/Public/css/me.css" rel="stylesheet">
	<!-- 在引入bootstrap.min.js核心库之间加载jquery.min.js -->
	<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/Public/js/checkPw.js"></script>
	<script type="text/javascript" src="/Public/js/print.js"></script>
	<script type="text/javascript" src="/Public/js/jquery.jqprint-0.3.js"></script>
	
</head>
<body style="background:#F0F2F5;margin-top:1.5em;">
	<div class="container ">
		<div class="chance">
			<ul>
				<?php if(is_array($res1)): foreach($res1 as $key=>$v1): ?><li><a href="/index.php/Check/info?kind_id=<?php echo ($v1["kind_id"]); ?>"><?php echo ($v1["kind_name"]); ?></a></li><?php endforeach; endif; ?>
			</ul>
		</div>
		<div class="clear"></div>
		<div class="main" id="ddd">
		<center><h2 class="text-primary"><?php echo ($kind_name); ?>训练建议</h2>	</center>
		<h4 class="text-right text-info">学生：<?php echo ($stu_name); ?></h4>
		<hr style=" width:100%;margin-top:0em;border:2px solid #4D9DE3; " />
		<table border="1" style="width:930px;text-align:center; margin-bottom:3em;table-layout:fixed;">
			<tr><th width="5%">编号</th><th width="46%">中间E项</th><th>训练建议</th></tr>
			
			<?php if(is_array($info)): foreach($info as $k=>$v): ?><tr><td><?php echo ($k+1); ?></td><td><?php echo ($v); ?></td><td><?php echo ($info1[$k]); ?></td></tr><?php endforeach; endif; ?>
		</table>
		</div><br/>
		<center><input type="button" onclick=" a()" value="打&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;印" class="btn btn-info btn-lg " ></center>
		<script>  
		function  a(){
	        $("#ddd").jqprint();
	    }
		</script> 
	</div>
	
</body>
</html>