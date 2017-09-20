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
	.test{ float:left; width:20%;height:850px;margin-left:1.5em;margin-top:1em; background-image:url(/Public<?php echo ($img); ?>) !important;
background-repeat:no-repeat; filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fff5f5f5', endColorstr='#fff9f9f9', GradientType=0);} 
	table{table-layout:fixed;word-wrap:break-word ;}
	table tr td label{width:100%; text-align:center;}
</style>
</head>
<body style="background:#F0F2F5;">
	<div class="container-fluid ">
		<div class="main">
			<center><h1 class="text-info">儿童<?php echo ($kind_name); ?>评估表结果</h1></center>
			<center><h4 class="text-info">&nbsp;&nbsp;&nbsp;&nbsp;学生姓名：<?php echo ($stu_name); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;评估者：<?php echo ($a_er["a_er"]); ?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;评估时间：<?php echo ($a_er["a_time"]); ?></h4></center>
			<div style="float:left; width:75%; text-align:center;">                                              
				<table border="1" style="width:100%; margin-top:1em;"> 
					<tr><th colspan="3">评估值<?php echo ($tide[0]); ?>项</th></tr>
					<?php if(is_array($pValue)): foreach($pValue as $key=>$v): ?><tr>
							<?php if(is_array($v)): foreach($v as $key=>$v1): ?><td><?php echo ($v1); ?></td><?php endforeach; endif; ?>
						</tr><?php endforeach; endif; ?>
				</table><br/>
				<table border="1"  style="width:100%; margin-top:1em;"> 
					<tr><th colspan="3">评估值<?php echo ($tide[1]); ?>项</th></tr>
					<?php if(is_array($eValue)): foreach($eValue as $k=>$v): ?><tr>
							<?php if(is_array($v)): foreach($v as $key=>$v1): ?><td><?php echo ($v1); ?></td><?php endforeach; endif; ?>
						</tr><?php endforeach; endif; ?>
				</table><br/>
				<table border="1" style="width:100%; margin-top:1em;"> 
					<tr><th colspan="3">评估值<?php echo ($tide[2]); ?>项</th></tr>
					<?php if(is_array($fValue)): foreach($fValue as $k=>$v): ?><tr>
							<?php if(is_array($v)): foreach($v as $key=>$v1): ?><td><?php echo ($v1); ?></td><?php endforeach; endif; ?>
						</tr><?php endforeach; endif; ?>
				</table>
			</div>
			<div class="test">
				<img src="<?php echo ($pic); ?>"><br/><br/><br/><br/>
				<div style="width:90%;">
					<div style="float:left;margin-top:-1em;">生理发展年龄:</div><div style="float:right"><hr style="border:1px dotted #0843FF;width:5em;margin-top:-0.5em;"></div>
					<div style="clear:both;"></div>
					<div style="float:left;margin-top:-0.5em;">最近发展区:</div><div style="float:right;margin-top:-1.2em;"><hr style="border:1px dotted red;width:5em;"></div>
					<div style="clear:both;"></div>
					<div style="float:left;margin-top:-0.5em;">实际发展年龄:</div><div style="float:right;margin-top:-1.2em;"><hr style="border:1px dotted black;width:5em;"></div>
				</div>	
			</div>
			<div style="clear:both;"></div><br/>
			<hr style="border:1px dotted #B9D3ED;">
			<center><h3 class="text-info">评估结果分析表</h3></center><br/>
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
			</table><br/><hr style="border:1px dotted #B9D3ED;">
			<center><h3 class="text-info">个别化教育计划</h3></center><br/>
			<table border="1" width="100%" style="text-align:center;">
				<tr><th width="100"><label>康复领域</label></th>
					<th width="100"><label>长期目标</label></th>
					<th><label>短期目标</label></th>
					<th width="100"><label>成功标准</label></th>
					<th width="110"><label>形&nbsp;式</label></th>
					<th width="120"><label>计划时长/天</label></th>
					<th width="110"><label>开始时间</label></th>
					<th width="110"><label>完成时间</label></th>
				</tr>
				<tr><td><label><?php echo ($kind_name); ?></label></td>
					<td colspan="2">
						<table border=1 width="100%" style=" table-layout: fixed; font-size:0.9em;">
							<?php if(is_array($plan)): foreach($plan as $k=>$v): ?><tr>
    						<td style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;width:100px"; ><a href="" title="<?php echo ($v['0']); ?>"><?php echo ($v["0"]); ?></a></td>
    						<td><table border='1' style=" table-layout: fixed; width:100%;font-size:0.8em;">
    							<?php if(is_array($items[$k])): foreach($items[$k] as $key=>$v1): ?><tr>
								<td style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><a href="" title="<?php echo ($v1); ?>"><?php echo ($v1); ?></a></td></tr><?php endforeach; endif; ?></table></td>
    					</tr><?php endforeach; endif; ?></table>
					</td>
					<td><?php echo ($standard); ?></td>
					<td><?php echo ($form); ?></td>
					<td><?php echo ($longer); ?></td>
					<td><?php echo ($start); ?></td>
					<td><?php echo ($end); ?></td>
				</tr>
			</table><br/><br/>
			<center class="noprint"><a href="/index.php/Record/all_kind"><input  type="button" value="查看全部评估记录" class="btn btn-info btn-lg " ></a>&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="打&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;印" class="btn btn-primary btn-lg " onclick="window.print()"></center>
		</div>
	</div>
</body>
</html>