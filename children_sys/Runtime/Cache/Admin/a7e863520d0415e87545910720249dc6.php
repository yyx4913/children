<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>全部班级信息列表</title>
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
	<div class="container-fluid">
		<center><h1 class="text-info">班级信息列表</h1></center>
		<table class="table-bordered" id="mytable" style="width:100%;text-align:center; margin-top:2.5em;">
			<tr ><th>编号</th><th>班级名称</th><th>学生人数&nbsp;/&nbsp;个</th><th>班主任</th><th>教师团队</th>
			<th>操作</th></tr>
			<?php if(is_array($res)): foreach($res as $k=>$v): ?><tr> 
			  <td><?php echo ($k+1); ?></td>
			  <td><?php echo ($v["c_name"]); ?></td>
			  <td><?php echo ($num[$k][0]["count(c_id)"]); ?></td>
			  <td><?php echo ($u_name[$k][0]["u_name"]); ?></td>
			  <td><?php if(is_array($arr[$k])): foreach($arr[$k] as $key=>$v1): echo ($v1["t_name"]); ?>&nbsp;/&nbsp;<?php endforeach; endif; ?></td>
			  <td><a href='/index.php/Class/all_info/c_id/<?php echo ($v["c_id"]); ?>' title="查看班级详细信息"><div class="glyphicon glyphicon-search"></div></a>&nbsp;&nbsp; /
			  &nbsp;&nbsp;
			  <a href='/index.php/Stu/add_stu1/c_id/<?php echo ($v["c_id"]); ?>' title="添加学生"><div class="glyphicon glyphicon-plus"></div></a>&nbsp;&nbsp; /
			  &nbsp;&nbsp;<a href='/index.php/Team/add_team/c_id/<?php echo ($v["c_id"]); ?>' title="组建教师团队"><div class="glyphicon glyphicon-user"></div></a>
			  &nbsp;&nbsp; / &nbsp;&nbsp;<a href='/index.php/Class/edit_class/c_id/<?php echo ($v["c_id"]); ?>' title="编辑班主任信息"><div class="glyphicon glyphicon-edit"></div></a>
			  &nbsp;&nbsp; / &nbsp;&nbsp;<a href='/index.php/Team/edit_team/c_id/<?php echo ($v["c_id"]); ?>' title="编辑教师团队信息"><div class="glyphicon glyphicon-edit"></div></a></td>
			</tr><?php endforeach; endif; ?>
			<tr><td colspan="6"><?php echo ($pagelist); ?></td></tr>
		</table><br/>
		<center><a href="/index.php/Class/add_class1"><button class="btn btn-info  btn-lg">添加信息</button></a></center>
	</div>
</body>
</html>