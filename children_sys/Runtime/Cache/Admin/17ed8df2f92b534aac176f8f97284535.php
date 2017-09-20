<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>学生信息汇总</title>
<link href="/Public/css/bootstrap.min.css" rel="stylesheet">
	<link href="/Public/css/me.css" rel="stylesheet">
	<!-- 在引入bootstrap.min.js核心库之间加载jquery.min.js -->
	<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/Public/js/Chart.min.js"></script>
	<style>
		.kong {display:inline;background:#CBDDE6;border:1px solid #759FB7;}
		.kong1 {display:inline;background:#FB9684;border:1px solid red;}
		.kong2 {display:inline;background:#8E84FB;border:1px solid #5B487D;}	
		.test{margin-left:10%;background:url(/Public/images/tu.png) !important ; width:750px; height:743px;}
        .test1{width:650px;margin-left:10em;margin-top:3em; height:620px; background-image:url(/Public/images/tu2.png) !important;background-repeat:no-repeat;}

</style>
</head>
<body style="background:#F0F2F5;">
	<div class="container">
		<center><h1 class="text-info">&nbsp;学生信息汇总</h1></center><br/><br/>
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
					<tr><td><label >&nbsp;&nbsp;家庭模式：</label></td>
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
					<tr class="noprint"><td><label>&nbsp;&nbsp;附件:</label></td>
					<td colspan="5">&nbsp;&nbsp;<a href="/index.php/Stu/downfile?up=<?php echo ($res[0]["upfile"]); ?>&old=<?php echo ($res[0]["old_name"]); ?>" style="text-decoration:none;">点击下载：
					<img src="/Public/images/rar.png"></a></td></tr>
				</table><br/><br/>
				
			<center><h1 class="text-info">评估记录得分雷达图</h1></center><br/>
			<canvas id="line2" width="780" height="400" style="margin:0em 4em 2em 4em;padding:0.5em;"></canvas>
			<script type="text/javascript">
			var line2 =document.getElementById('line2').getContext('2d');
			var lineChart= new Chart(line2); 
			var arr = new Array();
			arr = <?php echo ($arr1); ?>;
			var data = arr ;
			lineChart.Radar(data,{
				scaleBeginAtZero : true,
				 scaleShowGridLines : true,
			});
			</script><br/>
				<center><h1 class="text-info">儿童发展剖面图</h1></center><br/>
				<div style="float:left;margin-left:8em;">生理发展年龄：</div><div style="float:left"><hr style="border:1px dotted #0843FF;width:5em;"></div>
				<div style="float:left;margin-left:8em;">期望发展年龄：</div><div style="float:left"><hr style="border:1px solid red;width:5em;"></div>	
				<div style="float:left;margin-left:8em;">实际发展年龄：</div><div style="float:left"><hr style="border:1px solid black;width:5em;"></div>
				<br/><br/>
			<div class="test" >
				<img src="<?php echo ($img); ?>">
			</div><br/>
		<div class="rec" style="margin-left:17.5%;">
				<strong><span style="float:left;">P</span></strong>
				<?php if(is_array($p)): foreach($p as $key=>$v): ?><input type="text" value="<?php echo ($v); ?>"><?php endforeach; endif; ?>
		</div><br/>
		<div class="rec" style="margin-left:17.5%;">
				<strong><span style="float:left;">E</span></strong>
				<?php if(is_array($e)): foreach($e as $key=>$v): ?><input type="text" value="<?php echo ($v); ?>"><?php endforeach; endif; ?>
		</div><br/><br/>
		
		<center><h1 class="text-info">儿童情绪行为表现图</h1></center>
		<div class="test1">
			<img src="<?php echo ($img1); ?>">
		</div>
		<br/><br/>
		<center><h1 class="text-info">自闭症儿童评估结果分析表</h1></center>
			<div style="font-size:1.5em;line-height:2em;">
				　　　　　儿童姓名：<?php echo ($res[0]['stu_name']); ?>　　　　　　　　性别：<?php echo ($res[0]['sex']); ?>　　　　　
				　　出生日期：<?php echo ($res[0]['brith']); ?><br/>
				　　　　　教育诊断人：<?php echo ($ass["a_er"]); ?>　　　　　　　　教育诊断时期:　<?php echo ($ass["a_time"]); ?>
			</div><br/><br/>
			<table border="1" width="100%" style="margin-top:-2.2em; ">
				<tr><th width="10%"><label>领域</label></th>
					<th width="30%"><label>能力现状分析</label></th>
					<th width="30%"><label>优弱势分析</label></th>
					<th width="30%"><label>训练目标</label></th>
				</tr>
				<tr><td><label>感知觉</label></td>
					<td>
						视觉：<?php echo ($power[0][0]); ?><br/>
						听觉：<?php echo ($power[0][1]); ?><br/>
						触觉：<?php echo ($power[0][2]); ?><br/>
						味觉：<?php echo ($power[0][3]); ?><br/>触觉:<?php echo ($power[0][4]); ?>
					</td>
					<td>
						优势：<?php echo ($status[0][0]); ?><br/>
						劣势：<?php echo ($status[0][1]); ?>
					</td>
					<td><?php echo ($aim[0]); ?></td>
				</tr>
				<tr><td><label>粗大动作</label></td>
					<td>
						操作活动：<?php echo ($power[1][0]); ?><br/>
					</td>
					<td>
						优势：<?php echo ($status[1][0]); ?><br/>
						劣势：<?php echo ($status[1][1]); ?>
					</td>
					<td><?php echo ($aim[1]); ?></td>
				</tr>
				<tr><td><label>精细动作</label></td>
					<td>
						基本操作能力：<?php echo ($power[2][0]); ?><br/>
						手眼协调：<?php echo ($power[2][1]); ?><br/>
						握笔写画：<?php echo ($power[2][2]); ?>
					</td>
					<td>
						优势：<?php echo ($status[2][0]); ?><br/>
						劣势：<?php echo ($status[2][1]); ?>
					</td>
					<td><?php echo ($aim[2]); ?></td>
				</tr>
				<tr><td><label>语言与沟通</label></td>
					<td>
						语言模仿：<?php echo ($power[3][0]); ?><br/>
						语言理解：<?php echo ($power[3][1]); ?><br/>
						语言表达：<?php echo ($power[3][2]); ?>
					</td>
					<td>
						优势：<?php echo ($status[3][0]); ?><br/>
						劣势：<?php echo ($status[3][1]); ?>
					</td>
					<td><?php echo ($aim[3]); ?></td>
				</tr>
				<tr><td><label>认知</label></td>
					<td>
						经验与表征：<?php echo ($power[4][0]); ?><br/>
						因果关系和概念形成：<?php echo ($power[4][1]); ?>
					</td>
					<td>
						优势：<?php echo ($status[4][0]); ?><br/>
						劣势：<?php echo ($status[4][1]); ?>
					</td>
					<td><?php echo ($aim[4]); ?></td>
				</tr>
				<tr><td><label>社会交往</label></td>
					<td>
						社交前基本能力：<?php echo ($power[5][0]); ?><br/>
						社交技巧：<?php echo ($power[5][1]); ?>
					</td>
					<td>
						优势：<?php echo ($status[5][0]); ?><br/>
						劣势：<?php echo ($status[5][1]); ?>
					</td>
					<td><?php echo ($aim[5]); ?></td>
				</tr>
				<tr><td><label>生活自理</label></td>
					<td>
						进食：<?php echo ($power[6][0]); ?><br/>
						穿衣：<?php echo ($power[6][1]); ?><br/>
						梳洗：<?php echo ($power[6][2]); ?><br/>
						如厕：<?php echo ($power[6][3]); ?>
					</td>
					<td>
						优势：<?php echo ($status[6][0]); ?><br/>
						劣势：<?php echo ($status[6][1]); ?>
					</td>
					<td><?php echo ($aim[6]); ?></td>
				</tr>
				<tr><td><label>情绪与行为</label></td>
					<td>
						情绪表达与调节：<?php echo ($power[7][0]); ?><br/>
						特殊行为：<?php echo ($power[7][1]); ?>
					</td>
					<td>
						优势：<?php echo ($status[7][0]); ?><br/>
						劣势：<?php echo ($status[7][1]); ?>
					</td>
					<td><?php echo ($aim[7]); ?></td>
				</tr>
			</table><br/><br/>
			
			<center><h1 class="text-info">个别化教育计划</h1></center><br/>
			<table border="1" width="100%" style="text-align:center;">
				<tr><th width="120"><label>康复领域</label></th>
					<th width="120"><label>长期目标</label></th>
					<th ><label>短期目标</label></th>
					<th width="50"><label>成功标准</label></th>
					<th width="110"><label>形&nbsp;式</label></th>
					<th width="80"><label>计划时长/天</label></th>
					<th width="100"><label>开始时间</label></th>
					<th width="100"><label>完成时间</label></th>
				</tr>
				<tr><td colspan="8"><table border=1 width="100%"  style=" table-layout: fixed; ">
					<?php if(is_array($plan[0])): foreach($plan[0] as $k=>$v): ?><tr><td width="118"><label><?php echo ($v); ?></label></td>
					<td colspan="2">
						<table border=1 width="100%" style="font-size:0.6em;table-layout: fixed;" >
							<?php if(is_array($plan[1][$k])): foreach($plan[1][$k] as $k1=>$v1): ?><tr>
    						<td style="font-size:1.5em; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;width:120px"><a href="" title="<?php echo ($v1); ?>"><?php echo ($v1); ?></a></td>
    						<td>
								<table border=1 style="table-layout: fixed;">
									<?php if(is_array($plan[2][$k][$k1])): foreach($plan[2][$k][$k1] as $key=>$v2): ?><tr>
    								<td style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><a href="" title="<?php echo ($v2); ?>"><?php echo ($v2); ?></a></td></tr><?php endforeach; endif; ?></table>
    						</td>
    					</tr><?php endforeach; endif; ?></table>
					</td>
					<td width="50"><?php echo ($plan[3][$k]["standard"]); ?></td>
					<td width="110"><?php echo ($plan[3][$k]["form"]); ?></td>
					<td width="80"><?php echo ($plan[3][$k]["longer"]); ?></td>
					<td width="100"><?php echo ($plan[3][$k]["start"]); ?></td>
					<td width="99"><?php echo ($plan[3][$k]["end"]); ?></td>
				</tr><?php endforeach; endif; ?>
			</table></td>
				
			</tr>
			<tr><td width="100" style="font-size:0.85em;"><label>制定人</label></td>
					<td colspan="2"><?php echo ($ass["a_er"]); ?></td>
					<td colspan="2">计划制定时间</td>
					<td colspan="3"><?php echo ($ass["a_time"]); ?></td>
			</tr>
			</table><br/>
		<br/>		
				<center class="noprint"><input type="button" value="打&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;印" class="btn btn-info btn-lg " onclick="window.print()"></center>
		</div><br/><br/>
</body>
</html>