<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>信息表格</title>
	<link href="/Public/css/bootstrap.min.css" rel="stylesheet">
	<link href="/Public/css/me.css" rel="stylesheet">
	<!-- 在引入bootstrap.min.js核心库之间加载jquery.min.js -->
	<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/Public/js/checkPw.js"></script>
	<script type="text/javascript" src="/Public/js/Chart.min.js"></script>
	<style>
		.kong {display:inline;background:#CBDDE6;border:1px solid #759FB7;}
		.kong1 {display:inline;background:#FB9684;border:1px solid red;}
		.kong2 {display:inline;background:#8E84FB;border:1px solid #5B487D;}
	</style>
</head>
<body>
<h1 class="text-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($kind_name); ?>数据分析图表</h1><h4 class="text-right text-info" style="margin-right:8em;">学生姓名：<?php echo ($stu_name); ?></h4>
	<hr style=" width:90%;margin-top:0em;border:2px solid #4D9DE3;" />
		<br/><br/>

	<div class="container ">
		<div class="chance">
			<ul class="noprint" id="nav">
				<?php if(is_array($res1)): foreach($res1 as $key=>$v1): ?><li><a href="/index.php/Record/chart?kind_id=<?php echo ($v1["kind_id"]); ?>"><?php echo ($v1["kind_name"]); ?></a></li><?php endforeach; endif; ?>
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
			
			<!--  center><h3 class="text-info">评估记录结果表</h3>
			<div class="kong">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div> P的个数&nbsp;&nbsp;
			<div class="kong1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div> E的个数&nbsp;&nbsp;
			<div class="kong2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div> F的个数</center>
			<canvas id="line1" width="750" height="350" style="margin:0em 4em 2em 4em;"></canvas>
			<script type="text/javascript">
			var line1 =document.getElementById('line1').getContext('2d');
			var lineChart= new Chart(line1); 
			var arr = new Array();
			arr = <?php echo ($arr2); ?>;
			var data = arr ;
			lineChart.Bar(data,{
				 scaleBeginAtZero : true,
				 scaleShowGridLines : true,
			});
			</script>

			<br/><hr-->
			
			<center><h3 class="text-info">康复效果折线图</h3></center>
			<canvas id="line" width="750" height="350" style="margin:0em 4em 2em 4em;"></canvas>
			<script type="text/javascript">
			var line =document.getElementById('line').getContext('2d');
			var lineChart= new Chart(line); 
			var arr = new Array();
			arr = <?php echo ($arr1); ?>;
			//console.log(arr.labels);
			var data = arr ;
			lineChart.Line(data,{
					bezierCurve : false,
					
			});
			</script>
			
			<!-- 测试开始
			<center><h3 class="text-info">测试</h3></center>
			<div style="margin-left:3em; width:750px; height:743px; 
			background-image:url(/Public/images/tu.png);">
			<canvas id="line2" width="557px" height="710" style="margin:2em 4em 0em 5.4em;"></canvas></div>
			<script type="text/javascript">
			var line =document.getElementById('line2').getContext('2d');
			var lineChart= new Chart(line); 
			var data = <?php echo ($arr); ?>
			lineChart.Line(data,{
				 scaleOverride: true, //是否用硬编码重写y轴网格线
	                scaleSteps: 7.65, //y轴刻度的个数
	                scaleStepWidth: 19, //y轴每个刻度的宽度
	                scaleStartValue: 0, //y轴的起始值
	                pointDot: true, //是否显示点
	                pointDotRadius: 3, //点的半径
	                pointDotStrokeWidth: 2, //点的线宽
	                datasetStrokeWidth: 1, //数据线的线宽
	                animation: true, //是否有动画效果
	                scaleLineWidth : 1,
	                bezierCurve: false,
	                scaleShowGridLines : false,
	                // Y/X轴的颜色
	                scaleLineColor : '#686665',
	                scaleGridLineColor : "#686665",
	                scaleFontSize : 12,
	                scaleFontColor : "#686665",
					
	                
			});
			</script>
			<!-- 测试结束 -->
		</div><br/>
			<center class="noprint"><!-- a href="/index.php/Record/all_kind"><input type="button" value="查看更多" class="btn btn-info btn-lg"></a -->
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="打&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;印" class="btn btn-primary btn-lg " onclick="window.print()"></center><br/><br/>
	</div>
</body>
</html>