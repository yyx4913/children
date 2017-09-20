<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>查看学生详细信息</title>
<link href="/Public/css/bootstrap.min.css" rel="stylesheet">
	<link href="/Public/css/me.css" rel="stylesheet">
	<!-- 在引入bootstrap.min.js核心库之间加载jquery.min.js -->
	<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
</head>
<body style="background:#F0F2F5;">
	<div class="container">
		<center><h1 class="text-info">&nbsp;学生详细信息</h1></center><br/><br/>
		<div class="all">
			<div class="right_info">
				<img src="<?php echo ($res[0]["stu_pic"]); ?>">
			</div>
			<div class="left_info1">
				<table border="1">
					<tr><td><label >学号：</label></td><td><?php echo ($res[0]["stu_num"]); ?></td>
					<td><label >姓名：</label></td><td><?php echo ($res[0]["stu_name"]); ?></td>
					<td><label >性别：</label></td><td><?php echo ($res[0]["sex"]); ?></td></tr>
					<tr><td><label>班级：</label></td><td colspan="2"><?php echo ($res[0]["class"]); ?></td>
					<td><label >出生年月：</label></td><td colspan="2"><?php echo ($res[0]["brith"]); ?></td></tr>
					<tr><td><label >临床诊断：</label></td><td colspan="2"><?php echo ($res[0]["nation"]); ?></td>
					<td><label >诊断时间：</label></td><td colspan="2"><?php echo ($res[0]["nation_time"]); ?></td></tr>
					<tr><td><label >诊断机构：</label></td><td colspan="2"><?php echo ($res[0]["place"]); ?></td>
					<td><label >入学时间：</label></td><td colspan="2"><?php echo ($res[0]["study"]); ?></td></tr>
					<tr><td><label >户籍所在地：</label></td><td colspan="5"><?php echo ($res[0]["address"]); ?></td></tr>
					<tr><td><label >现居住地址：</label></td><td colspan="3"><?php echo ($res[0]["now_address"]); ?></td>
					<td><label >家庭电话：</label></td><td><?php echo ($res[0]["connect"]); ?></td></tr>
				</table>
				</div>
				</div>
				<div class="last_info1">
				<table border="1">	
					
					<?php if(is_array($res4)): foreach($res4 as $k=>$v): ?><tr><td width="140"><label >&nbsp;&nbsp;<?php echo ($v["p_kind"]); ?>：</label></td>
					<td>&nbsp;&nbsp;姓名: <?php echo ($v["p_name"]); ?></td>
					<td>&nbsp;&nbsp;年龄: <?php echo ($v["p_age"]); ?></td>
					<td>&nbsp;&nbsp;职业: <?php echo ($v["p_job"]); ?></td>
					<td>&nbsp;&nbsp;教育程度:<?php echo ($v["p_edu"]); ?></td>
					<td> &nbsp;&nbsp;联系方式:<?php echo ($v["p_phone"]); ?></td></tr><?php endforeach; endif; ?>
					<tr><td><label >&nbsp;&nbsp;抚养/带教人：</label></td>
					<td colspan="5">&nbsp;&nbsp;<?php echo ($res[0]["p_kind"]); ?></td></tr>
					<tr><td><label>&nbsp;&nbsp;家庭模式：</label></td>
					<td colspan="2">&nbsp;&nbsp;<?php echo ($res[0]["fam_model"]); ?></td>
					<td><label >&nbsp;&nbsp;居住社区：</label></td>
					<td colspan="2">&nbsp;&nbsp;<?php echo ($res[0]["live"]); ?></td></tr>
					<tr><td><label >&nbsp;&nbsp;教养方式：</label></td>
					<td colspan="2">&nbsp;&nbsp;<?php echo ($res[0]["educate"]); ?></td>
					<td><label >&nbsp;&nbsp;语言环境：</label></td>
					<td colspan="2">&nbsp;&nbsp;<?php echo ($res[0]["language"]); ?></td></tr>
					
					<tr><td rowspan="2"><label>&nbsp;&nbsp;妊娠史：</label></td><td>母妊娠年龄:&nbsp;&nbsp;<?php echo ($more[0]["value"]); ?></td> 
					<td colspan="2">胎教情况:&nbsp;&nbsp;<?php echo ($more[1]["value"]); ?></td>
					<td colspan="2">先兆流产:&nbsp;&nbsp;<?php echo ($more[2]["value"]); ?></td></tr>
					<tr><td>心理情况:&nbsp;&nbsp;<?php echo ($more[3]["value"]); ?></td> 
					<td colspan="2">生理情况:&nbsp;&nbsp;<?php echo ($more[4]["value"]); ?></td>
					<td colspan="2">环境情况:&nbsp;&nbsp;<?php echo ($more[5]["value"]); ?></td></tr>
					
					<tr><td rowspan="2"><label>&nbsp;&nbsp;分娩史：</label></td><td>足&nbsp;&nbsp;月:&nbsp;&nbsp;<?php echo ($more[6]["value"]); ?></td> 
					<td colspan="2">产&nbsp;&nbsp;程:&nbsp;&nbsp;<?php echo ($more[7]["value"]); ?></td>
					<td colspan="2">分娩方式:&nbsp;&nbsp;<?php echo ($more[8]["value"]); ?></td></tr>
					<tr><td>早产或过期:&nbsp;&nbsp;<?php echo ($more[9]["value"]); ?></td> 
					<td colspan="2">窒&nbsp;&nbsp;息:<?php echo ($more[10]["value"]); ?></td>
					<td colspan="2">出生体重:&nbsp;&nbsp;<?php echo ($more[11]["value"]); ?></td></tr>
					
					<tr><td rowspan="4"><label>&nbsp;&nbsp;生长发育史：</label></td><td>母乳喂养:&nbsp;&nbsp;<?php echo ($more[12]["value"]); ?></td> 
					<td colspan="2">人工喂养:&nbsp;&nbsp;<?php echo ($more[13]["value"]); ?></td>
					<td colspan="2">高热抽搐:&nbsp;&nbsp;<?php echo ($more[14]["value"]); ?></td></tr>
					<tr><td>会抬头时间:&nbsp;&nbsp;<?php echo ($more[15]["value"]); ?></td> 
					<td colspan="2">会翻身时间:&nbsp;&nbsp;<?php echo ($more[16]["value"]); ?></td>
					<td colspan="2">会爬行时间:<?php echo ($more[17]["value"]); ?></td></tr>
					<tr><td>会笑时间:&nbsp;&nbsp;<?php echo ($more[18]["value"]); ?></td> 
					<td colspan="2">会坐时间:&nbsp;&nbsp;<?php echo ($more[19]["value"]); ?></td>
					<td colspan="2">会走时间:&nbsp;&nbsp;<?php echo ($more[20]["value"]); ?></td></tr>
					<tr><td>会发音时间:&nbsp;&nbsp;<?php echo ($more[21]["value"]); ?></td> 
					<td colspan="2">说单词时间:&nbsp;&nbsp;<?php echo ($more[22]["value"]); ?></td>
					<td colspan="2">说词语时间:&nbsp;&nbsp;<?php echo ($more[23]["value"]); ?></td></tr>
					
					<tr><td><label >&nbsp;&nbsp;障碍类型:</label></td>
					<td colspan="5">&nbsp;&nbsp;<?php echo ($res[0]["barrier_kind"]); ?></td></tr>
					<tr><td><label >&nbsp;&nbsp;障碍程度:</label></td>
					<td colspan="5">&nbsp;&nbsp;<?php echo ($res[0]["b_class"]); ?></td></tr>
					<tr>
					<td><label>&nbsp;&nbsp;特殊的饮食习惯:</label></td>
					<td colspan="2">&nbsp;&nbsp;<?php echo ($more[24]["value"]); ?></td>
					<td width="140"><label>&nbsp;&nbsp;特殊的睡眠时间:</label></td>
					<td colspan="2">&nbsp;&nbsp;<?php echo ($more[25]["value"]); ?></td>
					</tr>
					<tr>
					<td rowspan="2"><label>&nbsp;&nbsp;&nbsp;最喜欢的活动:</label></td>
					<td colspan="2"><label>室内:</label>&nbsp;&nbsp;<?php echo ($more[26]["value"]); ?></td>
					<td colspan="3"><label>&nbsp;&nbsp;最爱看的电视节目:</label>&nbsp;&nbsp;<?php echo ($more[27]["value"]); ?></td>
					</tr>
					<tr><td colspan="2"><label>室外</label>:&nbsp;&nbsp;<?php echo ($more[28]["value"]); ?></td>
					<td colspan="3"><label>&nbsp;&nbsp;最常玩的玩具:</label>&nbsp;&nbsp;<?php echo ($more[29]["value"]); ?></td>
					</tr>
					<tr>
					<tr>
					<td><label>&nbsp;&nbsp;过　敏　史（含药物、食物等）:</label></td>
					<td colspan="5">&nbsp;&nbsp;<?php echo ($res[0]["guoming"]); ?></td></tr>
					<tr>
					<td><label>&nbsp;&nbsp;独处时常做事情:</label></td>
					<td colspan="2">&nbsp;&nbsp;<?php echo ($more[30]["value"]); ?></td>
					<td><label>&nbsp;&nbsp;经常一起的玩伴:</label></td>
					<td colspan="2">&nbsp;&nbsp;<?php echo ($more[31]["value"]); ?></td>
					</tr>
					<tr>
					<td><label>&nbsp;&nbsp;语言表达能力:</label></td>
					<td colspan="2">&nbsp;&nbsp;<?php echo ($more[32]["value"]); ?></td>
					<td><label>&nbsp;&nbsp;认知/认字能力:</label></td>
					<td colspan="2">&nbsp;&nbsp;<?php echo ($more[33]["value"]); ?></td>
					</tr>
					<tr>
					<td><label>&nbsp;&nbsp;数　　　　数:</label></td>
					<td colspan="2">&nbsp;&nbsp;<?php echo ($more[34]["value"]); ?></td>
					<td><label>&nbsp;&nbsp;穿　衣　服:</label></td>
					<td colspan="2">&nbsp;&nbsp;<?php echo ($more[35]["value"]); ?></td>
					</tr>
					<tr>
					<td><label>&nbsp;&nbsp;吃　　　　饭:</label></td>
					<td colspan="2">&nbsp;&nbsp;<?php echo ($more[36]["value"]); ?></td>
					<td><label>&nbsp;&nbsp;大　小　便:</label></td>
					<td colspan="2">&nbsp;&nbsp;<?php echo ($more[37]["value"]); ?></td>
					</tr>
					<tr>
					<td><label>&nbsp;&nbsp;伤害自己/他人:</label></td>
					<td colspan="5">&nbsp;&nbsp;<?php echo ($more[38]["value"]); ?></td></tr>
					<tr>
					<td><label>&nbsp;&nbsp;逃　　　　跑:</label></td>
					<td colspan="5">&nbsp;&nbsp;<?php echo ($more[39]["value"]); ?></td></tr>
					<tr>
					<td><label>&nbsp;&nbsp;家族病史:</label></td>
					<td colspan="5">&nbsp;&nbsp;<?php echo ($res[0]["family_bing"]); ?></td></tr>
					<tr>
					<td><label>&nbsp;&nbsp;主要行为问题:</label></td>
					<td colspan="5">&nbsp;&nbsp;<?php echo ($res[0]["main_problem"]); ?></td></tr>
					<tr><td><label>&nbsp;&nbsp;增强物:</label></td>
					<td colspan="5">&nbsp;&nbsp;<?php echo ($res[0]["contact_with"]); ?></td></tr>
					<tr><td><label>&nbsp;&nbsp;其他:</label></td>
					<td colspan="5">&nbsp;&nbsp;<?php echo ($res[0]["other_info"]); ?></td></tr>
					<tr><td><label>&nbsp;&nbsp;附件:</label></td>
					<td colspan="5">&nbsp;&nbsp;<?php echo ($file); ?></td></tr>
					<tr class="noprint"><td colspan="6" class="text-right"><a href="/index.php/Stu/fam_info?stu_id=<?php echo ($res[0]["stu_id"]); ?>" title="查看更多关于学生的信息">
					<button class="btn btn-primary">了解更多的信息>></button></a>&nbsp;&nbsp;&nbsp;</td></tr>
				</table><br/>
				<center class="noprint"><input type="button" value="打&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;印" class="btn btn-info btn-lg " onclick="window.print()"></center>
			</div>
		</div>
</body>
</html>