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
	.test{ float:left; width:20%;height:730px;margin-left:1.5em;margin-top:1em; background-image:url(/Public<?php echo ($img); ?>) !important;
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
			<div style="float:left; width:75%;">                                              
				<table class="table-bordered" style="width:100%; margin-top:1em;"> 
					<tr><th colspan="3">评估值<?php echo ($tide[0]); ?>项</th></tr>
					<?php if(is_array($pValue)): foreach($pValue as $key=>$v): ?><tr>
							<?php if(is_array($v)): foreach($v as $key=>$v1): ?><td><?php echo ($v1); ?></td><?php endforeach; endif; ?>
						</tr><?php endforeach; endif; ?>
				</table><br/>
				<table class="table-bordered"  style="width:100%; margin-top:1em;"> 
					<tr><th colspan="3">评估值<?php echo ($tide[1]); ?>项</th></tr>
					<?php if(is_array($eValue)): foreach($eValue as $k=>$v): ?><tr>
							<?php if(is_array($v)): foreach($v as $key=>$v1): ?><td><?php echo ($v1); ?></td><?php endforeach; endif; ?>
						</tr><?php endforeach; endif; ?>
				</table><br/>
				<table class="table-bordered" style="width:100%; margin-top:1em;"> 
					<tr><th colspan="3">评估值<?php echo ($tide[2]); ?>项</th></tr>
					<?php if(is_array($fValue)): foreach($fValue as $k=>$v): ?><tr>
							<?php if(is_array($v)): foreach($v as $key=>$v1): ?><td><?php echo ($v1); ?></td><?php endforeach; endif; ?>
						</tr><?php endforeach; endif; ?>
				</table>
			</div>
			<div class="test">
				<img src="<?php echo ($pic); ?>">
			</div>
			<div style=" clear:both;"></div><br/>
			<form action="/index.php/Sheet/index" method="post">
			<br/><hr style="border:1px dotted #B9D3ED;">
			<center><h3 class="text-info">评估结果分析表</h3></center><br/>
			<table border="1" width="100%" style=" font-size:0.7em;">
				<tr><th width="10%"><label>领域</label></th>
					<th width="30%"><label>能力现状分析</label></th>
					<th width="30%"><label>优弱势分析</label></th>
					<th width="30%"><label>训练目标</label></th>
				</tr>
				<tr><td><label><input type="hidden" name="kind_id" value="<?php echo ($kind_id); ?>">
				<input type="hidden" name="a_id" value="<?php echo ($a_id); ?>">
				<?php echo ($kind_name); ?></label></td>
					<td>
					<?php if(is_array($power)): foreach($power as $key=>$v): ?><textarea rows="4" class="form-control" placeholder="<?php echo ($v); ?>" name="arr[]"><?php echo ($v); ?></textarea><?php endforeach; endif; ?></td>
					<td>
						<div>&nbsp;<textarea rows="5" cols="36" class="form-control" placeholder="优势" name="arr1[]"><?php echo ($status[0]); ?></textarea></div>
						<div>&nbsp;<textarea rows="5" cols="36" class="form-control"  placeholder="劣势" name="arr1[]"><?php echo ($status[1]); ?></textarea></div>
					</td>
					<td><textarea name="aim" rows="8" cols="36">&nbsp;<?php echo ($aim); ?></textarea></td>
				</tr>
			</table>
			<br/><hr style="border:1px dotted #B9D3ED;">
			<center><h3 class="text-info">教育计划</h3></center><br/>
			<table border="1" width="100%" style="text-align:center;font-size:0.7em;">
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
    						<td style="overflow: hidden; white-space: nowrap;text-overflow: ellipsis;width:100px;" ><a href="" title="<?php echo ($v['0']); ?>"><?php echo ($v["0"]); ?></a></td>
    						<td><table border='1' style=" table-layout: fixed; width:100%;font-size:0.8em;">
    							<?php if(is_array($items[$k])): foreach($items[$k] as $key=>$v1): ?><tr>
								<td style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><a href="" title="<?php echo ($v1); ?>"><?php echo ($v1); ?></a></td></tr><?php endforeach; endif; ?></table></td>
    					</tr><?php endforeach; endif; ?></table>	
					</td>
					<td><select name="standard" style="height:2.2em;"><option>2/3</option><option>3/4</option><option>4/5</option></select></td>
					<td><select name="form" style="height:2.2em;"><option>个别训练</option><option>个别工作</option><option>家居训练</option><option>小组学习</option></select></td>
					<td><input type="text" name="longer" placeholder="*天" value="<?php echo ($longer); ?>" style="height:2.2em;"></td>
					<td><input type="text" name="start" placeholder="*年*月*日" value="<?php echo ($start); ?>" style="height:2.2em;"></td>
					<td><input type="text" name="end" placeholder="*年*月*日" value="<?php echo ($end); ?>" style="height:2.2em;"></td>
				</tr>
			</table><br/>
			<center class="noprint"><input type="submit" value="提交表格信息" class="btn btn-info btn-lg " ></center>
		</form>
			
		</div>
	</div>
</body>
</html>