<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>测试记录表</title>
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
	<h1 class="text-primary">&nbsp;&nbsp;&nbsp;&nbsp;评估记录表</h1>
	<hr style=" width:94%;margin-top:0em;border:2px solid #4D9DE3;" /><br/><br/>
	<div class="container ">
		<div class="chance">
			<ul id="nav">
				<?php if(is_array($res1)): foreach($res1 as $key=>$v1): ?><li><a href="/index.php/Record/show_record?kind_id=<?php echo ($v1["kind_id"]); ?>"><?php echo ($v1["kind_name"]); ?></a></li><?php endforeach; endif; ?>
				<!--  li><a href="/index.php/Record/other_scale_list">其他量表</a></li-->
			</ul>
		</div>
		<script type="text/javascript">
      	  var urlstr = location.href;
	      var urlstatus=false;
	      $("#nav a").each(function () {  
	        if ((urlstr + '/').indexOf($(this).attr('href')) > -1&&$(this).attr('href')!='') {
	          $(this).addClass('curument'); urlstatus = true;
	        } else {
	          $(this).removeClass('curument');
	        }
	      });
	      if (!urlstatus) {$("#nav a").eq(0).addClass('curument'); }
    	</script>
		<div class="clear"></div>
		<div class="main">
			<center><h1 class="text-info">儿童<?php echo ($kind_name); ?>评估表</h1></center>
			<h4 class="text-right text-info">学生姓名：<?php echo ($stu_name); ?>&nbsp;&nbsp;</h4>
			<table class="table-bordered" id="mytable" style="width:100%;text-align:center; margin-top:1em;">
				<tr ><th>评估次数</th><th>学生年龄</th><th>评估人员</th><th>评估时间</th><th>操作</th></tr>
				<?php if(is_array($res)): foreach($res as $k=>$v): ?><tr> 
				  <td>第<?php echo ($k+1); ?>次</td>
				  <td><?php echo ($v["a_age"]); ?></td>
				  <td><?php echo ($v["a_er"]); ?></td>
				  <td><?php echo ($v["a_time"]); ?></td>
				  <td><a href='/index.php/Record/see_record/kind_id/<?php echo ($v["kind_id"]); ?>/a_id/<?php echo ($v["a_id"]); ?>' title="查看评估信息"><div class="glyphicon glyphicon-search"></div></a>
				   &nbsp;/ &nbsp;<a href='/index.php/Record/all_info1?kind_id=<?php echo ($v["kind_id"]); ?>&a_id=<?php echo ($v["a_id"]); ?>&total=<?php echo ($v["total"]); ?>&num=<?php echo ($v["nums"]); ?>' title="查看评估结果分析"><div class="glyphicon glyphicon-duplicate"></div></a>
				   &nbsp;/ &nbsp;<a href='/index.php/Record/edit_record?kind_id=<?php echo ($v["kind_id"]); ?>&a_id=<?php echo ($v["a_id"]); ?>&b=1' title="修改评估数据"><div class="glyphicon glyphicon-edit"></div></a>
				   &nbsp;/ &nbsp;<a href='/index.php/Record/all_info?kind_id=<?php echo ($v["kind_id"]); ?>&a_id=<?php echo ($v["a_id"]); ?>&total=<?php echo ($v["total"]); ?>&num=<?php echo ($v["nums"]); ?>' title="修改评估分析表及个别化计划">
				  <div class="glyphicon glyphicon-edit"></div></a>
				   &nbsp;/ &nbsp;<a onClick="return confirm('提示：您确定要删除该信息吗？')"  href='/index.php/Record/delRecord/kind_id/<?php echo ($v["kind_id"]); ?>/a_id/<?php echo ($v["a_id"]); ?>' title="删除评估详记录"><div class="glyphicon glyphicon-trash"></div></a></td>
				</tr><?php endforeach; endif; ?>
			</table>
			<center><h4><?php echo ($pagelist); ?></h4></center>
		</div>
	</div>
</body>
</html>