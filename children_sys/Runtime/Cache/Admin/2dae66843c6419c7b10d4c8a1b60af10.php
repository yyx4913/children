<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>教师团队成员信息管理</title>
<link href="/Public/css/bootstrap.min.css" rel="stylesheet">
	<link href="/Public/css/me.css" rel="stylesheet">
	<!-- 在引入bootstrap.min.js核心库之间加载jquery.min.js -->
	<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
	<script language="javascript">
	window.onload=function showtable(){
	var tablename=document.getElementById("mytable");
	var li=tablename.getElementsByTagName("tr");
	for (var i=0;i<=li.length;i++){
		if(i%2==0)
		{
			li[i].style.backgroundColor="#DBF0FA";
		}else{
			li[i].style.backgroundColor ="#FAF7F7";
		}
	}
}
</script>
</head>
<body style="background:#F0F2F5;">
	<div class="container">
		<center><h1 class="text-info">教师团队成员信息</h1></center>
		<table class="table-bordered" id="mytable" style="width:100%;text-align:center; margin-top:2.5em;">
			<tr ><th>班级名称</th><th>教师团队</th>
			<th>操作</th></tr>
			<?php if(is_array($res)): foreach($res as $k=>$v): ?><tr> 
			  <td><?php echo ($v["c_name"]); ?></td>
			  <td><?php if(is_array($arr[$k])): foreach($arr[$k] as $key=>$v1): echo ($v1["t_name"]); ?>&nbsp;/&nbsp;<?php endforeach; endif; ?></td>
			  <td><a href='/index.php/Team/edit_team/c_id/<?php echo ($v["c_id"]); ?>' title="编辑教师团队信息"><div class="glyphicon glyphicon-edit"></div></a>
			  &nbsp;&nbsp; /
			  &nbsp;&nbsp;<a href='/index.php/Team/add_team/c_id/<?php echo ($v["c_id"]); ?>' title="添加团队成员"><div class="glyphicon glyphicon-user"></div></a></td>
			</tr><?php endforeach; endif; ?>
			<tr><td colspan="4"><?php echo ($pagelist); ?></td></tr>
		</table>
	</div>
</body>
</html>