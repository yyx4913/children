<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>编辑学生的详细信息</title>
<link href="/Public/css/bootstrap.min.css" rel="stylesheet">
	<link href="/Public/css/me.css" rel="stylesheet">
	<!-- 在引入bootstrap.min.js核心库之间加载jquery.min.js -->
	<link rel="stylesheet" type="text/css" href="/Public/uploadify/uploadify.css">
	<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/Public/js/checkPw.js"></script>
	<script type="text/javascript" src="/Public/laydate/laydate.js"></script>
	<script type="text/javascript" src="/Public/uploadify/jquery.uploadify.js"></script>
	<script type="text/javascript">
	var pub ="/Public";
	window.onload =function()
	{
		var type = "<?php echo ($role); ?>";
		var arr2=["<?php echo ($arr[0]); ?>","<?php echo ($arr[1]); ?>","<?php echo ($arr[2]); ?>","<?php echo ($arr[3]); ?>","<?php echo ($arr[4]); ?>"];
		var bar = "<?php echo ($barriers); ?>";
		var ba =bar.split("、");  //将字符串分解为数组
		var arr =document.getElementsByName("level");  //障碍等级
		var info=document.getElementsByName("fam_model");  //家庭模式
		var info1=document.getElementsByName("live");  //生活
		var info2=document.getElementsByName("educate");  //教养
		var info3=document.getElementsByName("language");  //语言
		var info4=document.getElementsByName("p_kind");  //监护人
		var arr1 = document.getElementsByName("barriers[]"); //障碍种类
		for(var i=0;i<arr.length;i++){
			if(arr[i].value==type)
			{
				arr[i].checked=true;
			}}
		for(var i=0;i<info.length;i++){
			if(info[i].value==arr2[0])
			{
				info[i].checked=true;
			}}
		for(var i=0;i<info1.length;i++){
			if(info1[i].value==arr2[1])
			{
				info1[i].checked=true;
			}}
		for(var i=0;i<info2.length;i++){
			if(info2[i].value==arr2[2])
			{
				info2[i].checked=true;
			}}
		for(var i=0;i<info3.length;i++){
			if(info3[i].value==arr2[3])
			{
				info3[i].checked=true;
			}}
		for(var i=0;i<info4.length;i++){
			if(info4[i].value==arr2[4])
			{
				info4[i].checked=true;
			}}
		var m =0;
		for(var j=0;j<ba.length;j++){
			for(var z=m;z<arr1.length;z++){
				if(arr1[z].value==ba[j]){
					arr1[z].checked=true;
					m=z;
					continue;
				}}} 
	}
	
	
	</script>
</head>
<body style="background:#F0F2F5;">
	<div class="container">
		<center><h1 class="text-info">&nbsp;学生基本信息</h1></center>
		<form action="/index.php/Stu/edit_info" method="post" class="form-inline" enctype="multipart/form-data" >
			<div class="right">
				<div class="right_info">
					<img id="im" src="<?php echo ($res[0]["stu_pic"]); ?>">
				</div>
				<div style="float:left; width:12em;margin-left:3.5em; font-size:0.6em; color:red;">
					<input type="file" id="file_upload"  multiple="true" style="width:12em;">头像图片格式为JPG(JPEG)、PNG,大小为130×160像素
					<input id="file_upload_image" name="pic" type="hidden" multiple="true" value="">
				</div>
			</div>
			
			<div class="left_info">
				<table>
					<tr><td><label >学号：</label></td><td><input type="text" name="stu_num" class="form-control" placeholder="请输入学生学号" value="<?php echo ($res[0]["stu_num"]); ?>"></td>
					<td colspan="3" id="num" style="color:red">&nbsp;&nbsp;*&nbsp;&nbsp;</td></tr>
					<tr><td><label >姓名：</label></td><td><input type="hidden" name="stu_id" value="<?php echo ($res[0]["stu_id"]); ?>">
					<input type="text" name="stu_Nm" class="form-control" placeholder="请输入学生姓名" value="<?php echo ($res[0]["stu_name"]); ?>"></td>
					<td colspan="2" style="color:red">&nbsp;&nbsp;*</td></tr>
					<tr><td><label >班级：</label></td><td>
					 <select name="class" ><option value="<?php echo ($res[0]["c_id"]); ?>" selected = "selected"><?php echo ($res[0]["class"]); ?></option>
					 </select><span style="color:red">&nbsp;&nbsp;*</span></td> <td>&nbsp;</td><td><label >性别：</label>
					<select name="sex" onblur="change_img(this.value)"><option value="<?php echo ($res[0]["sex"]); ?>" selected = "selected"><?php echo ($res[0]["sex"]); ?></option><option value="男">男</option>
					<option value="女">女</option></select></td></tr>
					<tr><td><label >出生年月：</label></td><td><input type="text" id="test1" name="brith" class="form-control" value="<?php echo ($res[0]["brith"]); ?>">
					<script>
						laydate({
						  elem: '#test1',
						  max: laydate.now(),
						});
					</script>	
					</td>
					<td style="color:red">&nbsp;&nbsp;*</td></tr>		
					<tr><td><label >临床诊断：</label></td><td><input type="text" name="nation" class="form-control" value="<?php echo ($res[0]["nation"]); ?>" ></td><td>&nbsp;</td>
						<td><label >诊断时间：</label></td><td><input type="text" id="test2"  name="nation_time" class="form-control" value="<?php echo ($res[0]["nation_time"]); ?>"  >
						<script>
						laydate({
						  elem: '#test2',
						  max: laydate.now(),
						});
					</script>
						</td>
					</tr>
					<tr><td><label >诊断机构：</label></td><td><input type="text" name="place" class="form-control" value="<?php echo ($res[0]["place"]); ?>" ></td><td>&nbsp;</td>
						<td><label >入学时间：</label></td><td><input type="text" id="test3" name="study" class="form-control" value="<?php echo ($res[0]["study"]); ?>" >
							<script>
						laydate({
						  elem: '#test3',
						  max: laydate.now(),
						});
					</script>
						</td>
					</tr>
					<tr><td><label >户籍所在地：</label></td><td><input type="text" name="address" class="form-control" value="<?php echo ($res[0]["address"]); ?>"></td></tr>
					<tr><td><label >现居住地址：</label></td><td><input type="text" name="now_address" class="form-control" value="<?php echo ($res[0]["now_address"]); ?>" ></td></tr>
					<tr><td><label >家庭电话：</label></td><td><input type="number" name="connect" class="form-control" value="<?php echo ($res[0]["connect"]); ?>"></td></tr>
				</table>
				</div>
				<div class="last_info">
				<table border="1">	
					<tr><td width="120"><label><br/>父亲：</label></td><td> &nbsp;&nbsp;姓名: <input type="text" name="f_name" class="form-control" style="width:99%;" value="<?php echo ($res1[0]["p_name"]); ?>"></td>
					<td>&nbsp;&nbsp;年龄: <input type="number" name="f_age" class="form-control" style="width:99%;"  value="<?php echo ($res1[0]["p_age"]); ?>"></td>
					<td>&nbsp;&nbsp;职业: <input type="text" name="f_job" class="form-control" style="width:99%;"  value="<?php echo ($res1[0]["p_job"]); ?>"></td>
					<td>&nbsp;&nbsp;教育程度: <select name="f_edu" style="width:99%;"><option value="<?php echo ($res1[0]["p_edu"]); ?>" selected><?php echo ($res1[0]["p_edu"]); ?></option><option value="">请选择</option>
					<option value="小学及小学以下">&nbsp;&nbsp;小学及小学以下</option><option value="初中">&nbsp;&nbsp;初中</option>
					<option value="高中">&nbsp;&nbsp;高中</option><option value="本科">&nbsp;&nbsp;本科</option><option value="硕士">&nbsp;&nbsp;硕士</option>
					<option value="博士">&nbsp;&nbsp;博士</option></select></td>
					<td>联系方式：<input type="number" name="f_phone" class="form-control" style="width:99%;"  value="<?php echo ($res1[0]["p_phone"]); ?>"></td></tr>
					<tr><td><label ><br/>母亲：</label></td><td>&nbsp;&nbsp;姓名: <input type="text" name="m_name" class="form-control" style="width:99%;"  value="<?php echo ($res2[0]["p_name"]); ?>"></td>
					<td>&nbsp;&nbsp;年龄: <input type="number" name="m_age" class="form-control" style="width:99%;"  value="<?php echo ($res2[0]["p_age"]); ?>"></td>
					<td>&nbsp;&nbsp;职业: <input type="text" name="m_job" class="form-control" style="width:99%;"  value="<?php echo ($res2[0]["p_job"]); ?>"></td>
					<td>&nbsp;&nbsp;教育程度: <select name="m_edu" style="width:99%;"><option value="<?php echo ($res1[0]["p_edu"]); ?>" selected><?php echo ($res2[0]["p_edu"]); ?></option><option value="">请选择</option>
					<option value="小学及小学以下">&nbsp;&nbsp;小学及小学以下</option><option value="初中">&nbsp;&nbsp;初中</option>
					<option value="高中">&nbsp;&nbsp;高中</option><option value="本科">&nbsp;&nbsp;本科</option><option value="硕士">&nbsp;&nbsp;硕士</option>
					<option value="博士">&nbsp;&nbsp;博士</option></select></td><td>联系方式：<input type="number" name="m_phone" class="form-control" style="width:99%;" value="<?php echo ($res2[0]["p_phone"]); ?>"></td></tr>
					
					<tr><td><label ><br/>其他家属：</label></td>
					<td>&nbsp;&nbsp;姓名:<input type="text" name="p_na" class="form-control" style="width:99%;"  value="<?php echo ($res4[0]["p_name"]); ?>"></td>
					<td>&nbsp;&nbsp;年龄:<input type="number" name="p_age" class="form-control" style="width:99%;" value="<?php echo ($res4[0]["p_age"]); ?>"></td>
					<td>&nbsp;&nbsp;职业:<input type="text" name="p_job" class="form-control" style="width:99%;"value="<?php echo ($res4[0]["p_job"]); ?>"></td>
					<td>&nbsp;&nbsp;教育程度: <select name="p_edu" style="width:99%;"><option value="<?php echo ($res1[0]["p_edu"]); ?>" selected><?php echo ($res4[0]["p_edu"]); ?></option><option value="">请选择</option>
					<option value="小学及小学以下">&nbsp;&nbsp;小学及小学以下</option><option value="初中">&nbsp;&nbsp;初中</option>
					<option value="高中">&nbsp;&nbsp;高中</option><option value="本科">&nbsp;&nbsp;本科</option><option value="硕士">&nbsp;&nbsp;硕士</option></select></td>
					<td>联系方式：<input type="number" name="p_phone" class="form-control" style="width:99%;" value="<?php echo ($res4[0]["p_phone"]); ?>"></td></tr>
					
					<tr><td><label >家庭模式:</label></td>
					<td colspan="5"><input type="radio" name="fam_model" value="大家庭" >大家庭
					&nbsp;&nbsp;&nbsp;<input type="radio" name="fam_model" value="核心家庭" >核心家庭
					&nbsp;&nbsp;&nbsp;<input type="radio" name="fam_model" value="单亲家庭" >单亲家庭&nbsp;&nbsp;&nbsp;<input type="radio" name="fam_model" value="寄养家庭" >寄养家庭
					</td></tr>
					
					<tr><td><label >居住社区:</label></td>
					<td colspan="5"><input type="radio" name="live" value="花园小区" >花园、小区
					&nbsp;&nbsp;&nbsp;<input type="radio" name="live" value="独家居住" >独家居住
					&nbsp;&nbsp;&nbsp;<input type="radio" name="live" value="出租房" >出租房
					</td></tr>
					
					<tr><td><label >教养方式:</label></td>
					<td colspan="5"><input type="radio" name="educate" value="教育型" >教育型
					&nbsp;&nbsp;&nbsp;<input type="radio" name="educate" value="娇惯型" >娇惯型
					&nbsp;&nbsp;&nbsp;<input type="radio" name="educate" value="放任自流型" >放任自流型
					</td></tr>
					
					<tr><td><label>语言环境:</label></td>
					<td colspan="5"><input type="radio" name="language" value="普通话" >普通话
					&nbsp;&nbsp;&nbsp;<input type="radio" name="language" value="地方方言" >地方方言
					</td></tr>
					
					<tr><td><label>抚养/带教人:</label></td>
					<td colspan="5"><input type="radio" name="p_kind" value="父母" >父母
					&nbsp;&nbsp;&nbsp;<input type="radio" name="p_kind" value="爷爷奶奶" >爷爷奶奶&nbsp;&nbsp;&nbsp;<input type="radio" name="p_kind" value="外公外婆" >外公外婆
					&nbsp;&nbsp;&nbsp;<input type="radio" name="p_kind" value="保姆" >保姆</td></tr>
					
					<tr><td rowspan="2"><label>妊娠史：</label></td><td>母妊娠年龄:<input type="text" style="width:99%;" class="form-control" name="addInfo[]" value="<?php echo ($more[0]["value"]); ?>"></td> 
					<td colspan="2">胎教情况:<input type="text" style="width:99%;"class="form-control" name="addInfo[]" value="<?php echo ($more[1]["value"]); ?>"></td>
					<td colspan="2">先兆流产:<input type="text" style="width:99%;" class="form-control" name="addInfo[]" value="<?php echo ($more[2]["value"]); ?>"></td></tr>
					<tr><td>心理情况:<input type="text" style="width:99%;" class="form-control" name="addInfo[]" value="<?php echo ($more[3]["value"]); ?>"></td> 
					<td colspan="2">生理情况:<input type="text" style="width:99%;" class="form-control" name="addInfo[]" value="<?php echo ($more[4]["value"]); ?>"></td>
					<td colspan="2">环境情况:<input type="text" style="width:99%;"class="form-control" name="addInfo[]" value="<?php echo ($more[5]["value"]); ?>"></td></tr>
					
					<tr><td rowspan="2"><label>分娩史：</label></td><td>足月&nbsp;&nbsp;&nbsp;:<input type="text" style="width:99%;" class="form-control" name="addInfo[]" value="<?php echo ($more[6]["value"]); ?>"></td> 
					<td colspan="2">产程:<input type="text" style="width:99%;"class="form-control" name="addInfo[]" value="<?php echo ($more[7]["value"]); ?>"></td>
					<td colspan="2">分娩方式:<input type="text" style="width:99%;" class="form-control" name="addInfo[]" value="<?php echo ($more[8]["value"]); ?>"></td></tr>
					<tr><td>早产或过期:<input type="text" style="width:99%;" class="form-control" name="addInfo[]" value="<?php echo ($more[9]["value"]); ?>"></td> 
					<td colspan="2">窒息:&nbsp;&nbsp;&nbsp;<input type="text" style="width:99%;" class="form-control" name="addInfo[]" value="<?php echo ($more[10]["value"]); ?>"></td>
					<td colspan="2">出生体重:<input type="text" style="width:99%;"class="form-control" name="addInfo[]" value="<?php echo ($more[11]["value"]); ?>"></td></tr>
					
					<tr><td rowspan="4"><label>生长发育史：</label></td><td>母乳喂养:<input type="text" style="width:99%;" class="form-control" name="addInfo[]" value="<?php echo ($more[12]["value"]); ?>"></td> 
					<td colspan="2">人工喂养:<input type="text" style="width:99%;"class="form-control" name="addInfo[]" value="<?php echo ($more[13]["value"]); ?>"></td>
					<td colspan="2">高热抽搐:<input type="text" style="width:99%;" class="form-control" name="addInfo[]" value="<?php echo ($more[14]["value"]); ?>"></td></tr>
					<tr><td>会抬头时间:<input type="text" style="width:99%;" class="form-control" name="addInfo[]" value="<?php echo ($more[15]["value"]); ?>"></td> 
					<td colspan="2" >会翻身时间:<input type="text" style="width:99%;" class="form-control" name="addInfo[]" value="<?php echo ($more[16]["value"]); ?>"></td>
					<td colspan="2">会爬行时间:<input type="text" style="width:99%;"class="form-control" name="addInfo[]" value="<?php echo ($more[17]["value"]); ?>"></td></tr>
					<tr><td>会笑时间:<input type="text" style="width:99%;" class="form-control" name="addInfo[]" value="<?php echo ($more[18]["value"]); ?>"></td> 
					<td colspan="2">会坐时间:<input type="text" style="width:99%;" class="form-control" name="addInfo[]" value="<?php echo ($more[19]["value"]); ?>"></td>
					<td colspan="2">会走时间:<input type="text" style="width:99%;"class="form-control" name="addInfo[]" value="<?php echo ($more[20]["value"]); ?>"></td></tr>
					<tr><td>会发音时间:<input type="text" style="width:99%;" class="form-control" name="addInfo[]" value="<?php echo ($more[21]["value"]); ?>"></td> 
					<td colspan="2">说单词时间:<input type="text" style="width:99%;" class="form-control"  name="addInfo[]" value="<?php echo ($more[22]["value"]); ?>"></td>
					<td colspan="2">说词语时间:<input type="text" style="width:99%;"class="form-control" name="addInfo[]" value="<?php echo ($more[23]["value"]); ?>"></td></tr>
					<tr><td><label>特殊的饮食习惯：</label></td><td colspan="2"><input type="text" class="form-control" style="width:99%;" name="addInfo[]" value="<?php echo ($more[24]["value"]); ?>"></td>
					<td><label>特殊的睡眠时间：</label></td><td colspan="2"><input type="text" class="form-control" style="width:99%;" name="addInfo[]" value="<?php echo ($more[25]["value"]); ?>"></td></tr>
					
					<tr><td rowspan="3"><label >其他障碍类型:</label></td>
					<td colspan="5"><input type="checkbox" name="barriers[]" value="智力障碍" >智力障碍
					&nbsp;&nbsp;<input type="checkbox" name="barriers[]" value="听觉障碍" >听觉障碍
					&nbsp;&nbsp;<input type="checkbox" name="barriers[]" value="视觉障碍" >视觉障碍&nbsp;&nbsp;<input type="checkbox" name="barriers[]" value="语言障碍" >语言障碍
					&nbsp;&nbsp;<input type="checkbox" name="barriers[]" value="肢体障碍" >肢体障碍&nbsp;&nbsp;<input type="checkbox" name="barriers[]" value="身体病弱" >身体病弱
					&nbsp;&nbsp;<input type="checkbox" name="barriers[]" value="情绪行为障碍" >情绪行为障碍
					</td></tr>
					<tr><td colspan="5"><input type="checkbox" name="barriers[]" value="阿斯伯格综合症" >阿斯伯格综合症&nbsp;&nbsp;<input type="checkbox" name="barriers[]" value="雷特综合征" >雷特综合征&nbsp;&nbsp;
					<input type="checkbox" name="barriers[]" value="儿童瓦解性障碍" >儿童瓦解性障碍&nbsp;&nbsp;<input type="checkbox" name="barriers[]" value="其他发展迟缓" >其他发展迟缓
					&nbsp;&nbsp;<input type="checkbox" name="barriers[]" value="脑瘫" >脑瘫&nbsp;&nbsp;<input type="checkbox" name="barriers[]" value="唐式综合症" >唐式综合症&nbsp;&nbsp;
					</td></tr>
					<tr><td colspan="5"><input type="checkbox" name="barriers[]" value="多重障碍" >多重障碍&nbsp;&nbsp;<input type="checkbox" name="barriers[]" value="学习障碍" >学习障碍
					&nbsp;&nbsp;<input type="checkbox" name="barriers[]" value="发展迟缓" >发展迟缓
					&nbsp;&nbsp;<input type="checkbox" name="barriers[]" value="精神障碍" >精神障碍&nbsp;&nbsp;<input type="checkbox" name="barriers[]" value="抑郁" >抑郁
					&nbsp;&nbsp;<input type="checkbox" name="barriers[]" value="癫痫" >癫痫&nbsp;&nbsp;<input type="checkbox" name="barriers[]" value="其他障碍" id="check1" onblur="onCheck()">其他障碍
					<input  type="text" name="other" id="others" class="form-control" value="<?php echo ($bar); ?>" readOnly="true"; onblur="onCheck()">
					</td></tr>
					<tr><td><label >障碍程度:</label></td>
					<td colspan="5"><input type="radio" name="level" value="轻度" >轻度
					&nbsp;&nbsp;&nbsp;<input type="radio" name="level" value="中度" >中度&nbsp;&nbsp;&nbsp;<input type="radio" name="level" value="中重度" >中重度
					&nbsp;&nbsp;&nbsp;<input type="radio" name="level" value="重度" >重度&nbsp;&nbsp;&nbsp;<input type="radio" name="level" value="极重度" >极重度
					</td></tr>
					
					<tr><td rowspan="2"><label>最喜欢的活动：</label></td><td colspan="2">室内：&nbsp;&nbsp;&nbsp;<input type="text" class="form-control" style="width:99%;" name="addInfo[]" value="<?php echo ($more[26]["value"]); ?>"></td>
					<td colspan="3">最爱看的电视节目：<input type="text" class="form-control" style="width:99%;" name="addInfo[]" value="<?php echo ($more[27]["value"]); ?>"></td></tr>
					<tr><td colspan="2">室&nbsp;外:&nbsp;&nbsp;&nbsp;<input type="text" class="form-control" style="width:99%;" name="addInfo[]" value="<?php echo ($more[28]["value"]); ?>"></td>
					<td colspan="3">最爱玩的玩具:<input type="text" class="form-control" style="width:99%;" name="addInfo[]" value="<?php echo ($more[29]["value"]); ?>"></td></tr>
					
					<tr><td><label>独处时常做的事：</label></td><td colspan="2"><input type="text" class="form-control" style="width:99%;" name="addInfo[]" value="<?php echo ($more[30]["value"]); ?>"></td>
					<td><label>经常一起的玩伴：</label></td><td colspan="2"><input type="text" class="form-control" style="width:99%;" name="addInfo[]" value="<?php echo ($more[31]["value"]); ?>"></td></tr>
					
					<tr><td><label>语言表达能力：</label></td><td colspan="2"><input type="text" class="form-control" style="width:99%;" name="addInfo[]" value="<?php echo ($more[32]["value"]); ?>"></td>
					<td><label>认知/认字能力：</label></td><td colspan="2"><input type="text" class="form-control" style="width:99%;" name="addInfo[]" value="<?php echo ($more[33]["value"]); ?>"></td></tr>
					
					<tr><td><label>数&nbsp;&nbsp;数：</label></td><td colspan="2"><input type="text" class="form-control" style="width:99%;" name="addInfo[]" value="<?php echo ($more[34]["value"]); ?>"></td>
					<td><label>穿衣服：</label></td><td colspan="2"><input type="text" class="form-control" style="width:99%;" name="addInfo[]" value="<?php echo ($more[35]["value"]); ?>"></td></tr>
					
					<tr><td><label>吃&nbsp;&nbsp;饭：</label></td><td colspan="2"><input type="text" class="form-control" style="width:99%;" name="addInfo[]" value="<?php echo ($more[36]["value"]); ?>"></td>
					<td><label>大小便&nbsp;：</label></td><td colspan="2"><input type="text" class="form-control" style="width:99%;" name="addInfo[]" value="<?php echo ($more[37]["value"]); ?>"></td></tr>
					
					<tr><td><label>伤害自己/他人：</label></td><td colspan="5"><input type="text" class="form-control" style="width:99%;" name="addInfo[]" value="<?php echo ($more[38]["value"]); ?>"></td></tr>
					<tr><td><label>逃&nbsp;&nbsp;跑：</label></td><td colspan="5"><input type="text" class="form-control" style="width:99%;" name="addInfo[]" value="<?php echo ($more[39]["value"]); ?>"></td></tr>

					<tr>
					<td><label>过敏史（含药物、食物等）:</label></td>
					<td colspan="5"><textarea class="form-control" rows="6" cols="118" name="guoming"><?php echo ($res[0]["guoming"]); ?></textarea></td></tr>
					<tr><td colspan="6">&nbsp;</td></tr>
					<tr>
					<td><label>家族病史:</label></td>
					<td colspan="5"><textarea class="form-control" rows="6" cols="118" name="family_bing"> <?php echo ($res[0]["family_bing"]); ?></textarea></td></tr>
					<tr><td colspan="6">&nbsp;</td></tr>
					<tr>
					<td><label>目前障碍问题:</label></td>
					<td colspan="5"><textarea class="form-control" rows="6" cols="118" name="main_problem"><?php echo ($res[0]["main_problem"]); ?></textarea></td></tr>
					<tr><td colspan="6">&nbsp;</td></tr>
					<tr>
					<td><label>强化物:</label></td>
					<td colspan="5"><textarea class="form-control" rows="6" cols="118" name="contact_with" ><?php echo ($res[0]["contact_with"]); ?></textarea></td></tr>
					<tr><td colspan="6">&nbsp;</td></tr>
					<tr><td><label>其他:</label></td>
					<td colspan="5"><textarea class="form-control" rows="6" cols="118" name="other_info" > <?php echo ($res[0]["other_info"]); ?></textarea></td></tr>
					<tr><td><label>添加附件：</label></td><td colspan="5"><input type="file" name="other_file" value=""><?php echo ($file); ?></td></tr>
				</table><br/>
				<span style="color:red;font-size:0.85em;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ps:&nbsp;有&nbsp;<b>*</b>&nbsp;的为必填信息。</span><br/>
				<span class=" col-xs-offset-4" ><input name="submit" type="submit" value="确认修改" class="btn btn-info btn-lg " onClick="return confirm('提示：您确定要提交信息吗？')"></span>
				<span class=" col-xs-offset-1" ><input name="reset" type="reset" value="重置" class="btn btn-success btn-lg " ></span>
			</div>
		</form><br/><br/>
<script>
  var SCOPE = {
    'ajax_upload_image_url' : '/index.php/image/kindupload',
    'ajax_upload_swf' : '/Public/uploadify/uploadify.swf',
  };
</script>
<script src="/Public/js/image.js"></script>
</body>
</html>