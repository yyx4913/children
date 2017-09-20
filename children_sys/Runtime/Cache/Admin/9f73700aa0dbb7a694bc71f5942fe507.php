<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>添加测试记录</title>
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
	<h1 class="text-primary">&nbsp;&nbsp;&nbsp;&nbsp;添加评估记录表</h1>
	<hr style=" width:94%;margin-top:0em;border:2px solid #4D9DE3;" /><br/><br/>
	<div class="container ">
		<div class="chance">
			<ul id="nav"> 
				<?php if(is_array($res1)): foreach($res1 as $key=>$v1): ?><li><a href="/index.php/Record/add_record?kind_id=<?php echo ($v1["kind_id"]); ?>"><?php echo ($v1["kind_name"]); ?></a></li><?php endforeach; endif; ?>
				<!--  li><a href="/index.php/Record/other_scale_list">其他量表</a></li-->
			</ul>
		</div>
		<script type="text/javascript">
		  var kind = "<?php echo ($kind_id); ?>"
      	  var urlstr = location.href;
	      var urlstatus=false;
	      $("#nav a").each(function () {  
	        if ((urlstr + '/').indexOf($(this).attr('href')) > -1&&$(this).attr('href')!='') {
	          $(this).addClass('curument'); urlstatus = true;
	        } else {
	          $(this).removeClass('curument');
	        }
	      });
	      if (!urlstatus) {$("#nav a").eq(kind-1).addClass('curument'); }
    	</script>
		<div class="clear"></div>
		<div class="main">
			<center><h1 class="text-info">儿童<?php echo ($kind_name); ?>评估表</h1></center>
			<h4 class="text-right text-info">学生姓名：<?php echo ($stu_name); ?>&nbsp;&nbsp;</h4>
			<table class="table-bordered" id="mytable" style="width:100%;text-align:center; margin-top:1em;">
				<tr ><th>评估次数</th><th>学生年龄</th><th>评估人员</th><th>评估时间</th><th>评估状态</th><th>操作</th></tr>
				<?php if(is_array($res)): foreach($res as $k=>$v): ?><tr> 
				  <td>第<?php echo ($k+1); ?>次</td>
				  <td><?php echo ($v["a_age"]); ?></td>
				  <td><?php echo ($v["a_er"]); ?></td>
				  <td><?php echo ($v["a_time"]); ?></td>
				  <td id="t_<?php echo ($k); ?>" ><?php echo (type($v["type"])); ?></td>		  
				  <input type="hidden" id="u_<?php echo ($k); ?>" value="/index.php/Record/edit_record?kind_id=<?php echo ($v["kind_id"]); ?>&a_id=<?php echo ($v["a_id"]); ?>&b=1">
				  <td><a href='/index.php/Record/see_record/kind_id/<?php echo ($kind_id); ?>/a_id/<?php echo ($v["a_id"]); ?>' title="查看学生详细信息"><div class="glyphicon glyphicon-search"></div></a>
				  &nbsp;/ &nbsp;<a href='/index.php/Record/all_info1?kind_id=<?php echo ($v["kind_id"]); ?>&a_id=<?php echo ($v["a_id"]); ?>&total=<?php echo ($v["total"]); ?>&num=<?php echo ($v["nums"]); ?>' title="查看评估结果分析">
				  <div class="glyphicon glyphicon-duplicate"></div></a>
				  &nbsp;/ &nbsp;<a href='/index.php/Record/all_info?kind_id=<?php echo ($v["kind_id"]); ?>&a_id=<?php echo ($v["a_id"]); ?>&total=<?php echo ($v["total"]); ?>&num=<?php echo ($v["nums"]); ?>' title="修改评估分析表及个别化计划">
				  <div class="glyphicon glyphicon-edit"></div></a></td>
				</tr><?php endforeach; endif; ?>
				
			</table>
			<center><form action="/index.php/Record/add_record/stu_id/" method="post" > 
			<input name="kind_id" type="hidden" value="<?php echo ($kind_id); ?>">
			<input name="submit" type="submit" value="进入评估" class="btn btn-info btn-lg " ></form></center>
		</div>
	</div>
</body>
<script type="text/javascript">
	var table =document.getElementById("mytable");
	var rows = table.rows.length;
	for(var i=0;i<rows-1;i++){
		td =document.getElementById("t_"+i).innerHTML;
		url =document.getElementById("u_"+i).value;
		if(td =='未完成'){
			document.getElementById("t_"+i).innerHTML="<a href="+url+" title='可继续完成评估'>未完成</a>"
		}
	}
</script>

</html>