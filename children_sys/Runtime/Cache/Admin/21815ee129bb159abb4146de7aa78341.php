<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>学生信息列表</title>
	<link href="/Public/css/bootstrap.min.css" rel="stylesheet">
	<link href="/Public/css/me.css" rel="stylesheet">
	<!-- 在引入bootstrap.min.js核心库之间加载jquery.min.js -->
	<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/Public/js/checkPw.js"></script>
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
	<div class="container ">
		<center><h1 class="text-info">学生信息列表(班主任)</h1></center>

		<div class="text-right"><form action="/index.php/Stu/stu_list" method="post" class="noprint"><input type="submit" name="submit" value="搜索" style="float:right;margin-left:1.5em;" >
			&nbsp;&nbsp;<input type="text" name="stu_num"  placeholder="请输入学生学号或姓名" ></form></div>
			
		<table class="table-bordered" id="mytable" style="width:100%;text-align:center; margin-top:1em;">
			<tr><th class="noprint">选定</th><th>学号</th><th>班级</th><th>学生姓名</th><th>性别</th>
			<th class="noprint">操作</th></tr>
			<?php if(is_array($res)): foreach($res as $k=>$v): ?><tr> 
			  <td class="noprint"><a href="/index.php/Record/add_record/stu_id/<?php echo ($v["stu_id"]); ?>"><div class="glyphicon glyphicon-saved"></div></a></td>
			  <td><?php echo ($v["stu_num"]); ?></td>
			  <td><?php echo ($v["class"]); ?></td>
			  <td><?php echo ($v["stu_name"]); ?></td>
			  <td><?php echo ($v["sex"]); ?></td>
			  <td class="noprint"><a href='/index.php/Stu/see_stu/stu_id/<?php echo ($v["stu_id"]); ?>' title="查看学生详细信息"><div class="glyphicon glyphicon-search"></div></a>&nbsp;&nbsp; /
			  &nbsp;&nbsp;
			  <a href='/index.php/Stu/edit_stu/stu_id/<?php echo ($v["stu_id"]); ?>' title="编辑学生信息"><div class="glyphicon glyphicon-edit"></div></a>&nbsp;&nbsp; /
			  &nbsp;&nbsp;<a href='/index.php/Stu/more/stu_id/<?php echo ($v["stu_id"]); ?>' title="添加学生更多信息"><div class="glyphicon glyphicon-pencil"></div></a>&nbsp;&nbsp; /
			  &nbsp;&nbsp;<a onClick="return confirm('提示：您确定要删除该信息吗？')" 
			  href='/index.php/Stu/del_stu/stu_id/<?php echo ($v["stu_id"]); ?>' title="删除该学生信息"><div class="glyphicon glyphicon-trash"></div></a></td>
			</tr><?php endforeach; endif; ?>
			<tr class="noprint"><td colspan="6"><?php echo ($pagelist); ?></td></tr>
		</table><br/>
		<center class="noprint"><a href="/index.php/Stu/add_stu"><button class="btn btn-info  btn-lg">添加学生</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="button" value="打&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;印" class="btn btn-info btn-lg " onclick="window.print()"></center>
	</div>
</body>
</html>