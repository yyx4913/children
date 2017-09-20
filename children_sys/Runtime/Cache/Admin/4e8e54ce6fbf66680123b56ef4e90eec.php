<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>量表具体信息</title>
	<link href="/Public/css/bootstrap.min.css" rel="stylesheet">
	<link href="/Public/css/me.css" rel="stylesheet">
	<!-- 在引入bootstrap.min.js核心库之间加载jquery.min.js -->
	<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/Public/js/checkPw.js"></script>
</head>
<body style="background:#F0F2F5;">
	<div class="container-fluid" style="margin-left:3em;margin-right:3em;"><br/><br/>
		<div class="chance">
			<ul class="noprint">
				<?php if(is_array($res)): foreach($res as $key=>$v): ?><li><a href="/index.php/Record/add_record?kind_id=<?php echo ($v["kind_id"]); ?>"><?php echo ($v["kind_name"]); ?></a></li><?php endforeach; endif; ?>
				<!--  li><a href="/index.php/Record/other_scale_list">其他量表</a></li-->
			</ul>
		</div>
		<div class="clear"></div>
		<div class="main">
			<center><h1 class="text-info">儿童<?php echo ($kind_name); ?>评估表</h1></center>
			<h4 class="text-right text-info">学生姓名：<?php echo ($stu_name); ?>&nbsp;&nbsp;</h4>
			<div class="save"></div>
			<form id="myForm" action="/index.php/Record/scale_info" method="post">
			<input type="hidden" name="kind_id" value="<?php echo ($kind_id); ?>"><input type="hidden" name="a_id" value="<?php echo ($a_id); ?>">
			
			<table border="1" style="width:100%;text-align:center;font-size:0.8em; margin-top:-3em;">
				<tr><th>代号</th><th colspan="2">评估范围</th><th>评估项目</th><th>评估记录</th><th>参考年龄</th><th>备注</th></tr>
				<tr><td>1</td><td rowspan="19">视觉</td><td rowspan="2">视觉注视</td><td><a href="" title="评估材料：<?php echo ($res2[0]["material"]); ?>&#13;评估方法：<?php echo ($res2[0]["way"]); ?>&#13;评估标准：<?php echo ($res2[0]["norm"]); ?>">注意光线刺激</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td>
				<td>0-6月</td><td><input type="text"  name="gz[]"></td></tr>
				<tr><td>2</td><td><a href="" title="评估材料：<?php echo ($res2[1]["material"]); ?>&#13;评估方法：<?php echo ($res2[1]["way"]); ?>&#13;评估标准：<?php echo ($res2[1]["norm"]); ?>">注意颜色刺激</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>0-6月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>3</td><td rowspan="3">视觉追视</td><td><a href="" title="评估材料：<?php echo ($res2[2]["material"]); ?>&#13;评估方法：<?php echo ($res2[2]["way"]); ?>&#13;评估标准：<?php echo ($res2[2]["norm"]); ?>">灵活追视</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>4-6月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>★4</td><td><a href="" title="评估材料：<?php echo ($res2[3]["material"]); ?>&#13;评估方法：<?php echo ($res2[3]["way"]); ?>&#13;评估标准：<?php echo ($res2[3]["norm"]); ?>">追视飘动物体</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>6—12月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>5</td><td><a href="" title="评估材料：<?php echo ($res2[4]["material"]); ?>&#13;评估方法：<?php echo ($res2[4]["way"]); ?>&#13;评估标准：<?php echo ($res2[4]["norm"]); ?>">追视快速运动物体</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>12-18月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>★6</td><td rowspan="6">视觉辨认</td><td><a href="" title="评估材料：<?php echo ($res2[5]["material"]); ?>&#13;评估方法：<?php echo ($res2[5]["way"]); ?>&#13;评估标准：<?php echo ($res2[5]["norm"]); ?>">辨认熟悉人物的面孔(如：爸爸、妈妈 )</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>5-6月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>7</td><td><a href="" title="评估材料：<?php echo ($res2[6]["material"]); ?>&#13;评估方法：<?php echo ($res2[6]["way"]); ?>&#13;评估标准：<?php echo ($res2[6]["norm"]); ?>">辨认自己的影像</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>12-15月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>★8</td><td><a href="" title="评估材料：<?php echo ($res2[7]["material"]); ?>&#13;评估方法：<?php echo ($res2[7]["way"]); ?>&#13;评估标准：<?php echo ($res2[7]["norm"]); ?>">辨认常见物品</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>12-24月</td><td><input type="text" name="gz[]" ></td></tr>
				<tr><td>9</td><td><a href="" title="评估材料：<?php echo ($res2[8]["material"]); ?>&#13;评估方法：<?php echo ($res2[8]["way"]); ?>&#13;评估标准：<?php echo ($res2[8]["norm"]); ?>">辨认一种颜色</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>16-20月</td><td><input type="text" name="gz[]" ></td></tr>
				<tr><td>10</td><td><a href="" title="评估材料：<?php echo ($res2[9]["material"]); ?>&#13;评估方法：<?php echo ($res2[9]["way"]); ?>&#13;评估标准：<?php echo ($res2[9]["norm"]); ?>">辨认两种颜色</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>22-26月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>11</td><td><a href="" title="评估材料：<?php echo ($res2[10]["material"]); ?>&#13;评估方法：<?php echo ($res2[10]["way"]); ?>&#13;评估标准：<?php echo ($res2[10]["norm"]); ?>">找出两种不同的颜色</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>35-38月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>12</td><td rowspan="6">视觉记忆及重整</td><td><a href="" title="评估材料：<?php echo ($res2[11]["material"]); ?>&#13;评估方法：<?php echo ($res2[11]["way"]); ?>&#13;评估标准：<?php echo ($res2[11]["norm"]); ?>">指出图形拼块的正确位置</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>34-39月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>13</td><td><a href="" title="评估材料：<?php echo ($res2[12]["material"]); ?>&#13;评估方法：<?php echo ($res2[12]["way"]); ?>&#13;评估标准：<?php echo ($res2[12]["norm"]); ?>">指出动物拼块的正确位置</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>34-39月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>14</td><td><a href="" title="评估材料：<?php echo ($res2[13]["material"]); ?>&#13;评估方法：<?php echo ($res2[13]["way"]); ?>&#13;评估标准：<?php echo ($res2[13]["norm"]); ?>">完成物品拼块</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>45-49月</td><td><input type="text" name="gz[]" ></td></tr>
				<tr><td>15</td><td><a href="" title="评估材料：<?php echo ($res2[14]["material"]); ?>&#13;评估方法：<?php echo ($res2[14]["way"]); ?>&#13;评估标准：<?php echo ($res2[14]["norm"]); ?>">完成动物拼块</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>45-49月</td><td><input type="text" name="gz[]" ></td></tr>
				<tr><td>16</td><td><a href="" title="评估材料：<?php echo ($res2[15]["material"]); ?>&#13;评估方法：<?php echo ($res2[15]["way"]); ?>&#13;评估标准：<?php echo ($res2[15]["norm"]); ?>">颜色积木配对</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>45-49月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>17</td><td><a href="" title="评估材料：<?php echo ($res2[16]["material"]); ?>&#13;评估方法：<?php echo ($res2[16]["way"]); ?>&#13;评估标准：<?php echo ($res2[16]["norm"]); ?>">杯下寻物</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>58-62月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>18</td><td rowspan="2">视觉偏好</td><td><a href="" title="评估材料：<?php echo ($res2[17]["material"]); ?>&#13;评估方法：<?php echo ($res2[17]["way"]); ?>&#13;评估标准：<?php echo ($res2[17]["norm"]); ?>">对图画感兴趣</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>20-25月</td><td><input type="text" name="gz[]" ></td></tr>
				<tr><td>19</td><td><a href="" title="评估材料：<?php echo ($res2[18]["material"]); ?>&#13;评估方法：<?php echo ($res2[18]["way"]); ?>&#13;评估标准：<?php echo ($res2[18]["norm"]); ?>">表现出使用惯用眼</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>30-36月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>★20</td><td rowspan="14">听觉</td><td rowspan="3">听觉反应</td><td><a href="" title="评估材料：<?php echo ($res2[19]["material"]); ?>&#13;评估方法：<?php echo ($res2[19]["way"]); ?>&#13;评估标准：<?php echo ($res2[19]["norm"]); ?>">母亲叫名有反应</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>0-6月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>21</td><td><a href="" title="评估材料：<?php echo ($res2[20]["material"]); ?>&#13;评估方法：<?php echo ($res2[20]["way"]); ?>&#13;评估标准：<?php echo ($res2[20]["norm"]); ?>">对突发声作出反应</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>0-6月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>22</td><td><a href="" title="评估材料：<?php echo ($res2[21]["material"]); ?>&#13;评估方法：<?php echo ($res2[21]["way"]); ?>&#13;评估标准：<?php echo ($res2[21]["norm"]); ?>">听到两侧或身后喊声，头会转向声源</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>3-6月</td><td><input type="text" name="gz[]" ></td></tr>
				<tr><td>23</td><td rowspan="3">听觉注意</td><td><a href="" title="评估材料：<?php echo ($res2[22]["material"]); ?>&#13;评估方法：<?php echo ($res2[22]["way"]); ?>&#13;评估标准：<?php echo ($res2[22]["norm"]); ?>">注意声音</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>0-6月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>24</td><td><a href="" title="评估材料：<?php echo ($res2[23]["material"]); ?>&#13;评估方法：<?php echo ($res2[23]["way"]); ?>&#13;评估标准：<?php echo ($res2[23]["norm"]); ?>">专心聆听声叉响声</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>5-6月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>★25</td><td><a href="" title="评估材料：<?php echo ($res2[24]["material"]); ?>&#13;评估方法：<?php echo ($res2[24]["way"]); ?>&#13;评估标准：<?php echo ($res2[24]["norm"]); ?>">专心聆听秒表</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>8-9月</td><td><input type="text" name="gz[]" ></td></tr>
				<tr><td>26</td><td rowspan="8">听觉辨别</td><td><a href="" title="评估材料：<?php echo ($res2[25]["material"]); ?>&#13;评估方法：<?php echo ($res2[25]["way"]); ?>&#13;评估标准：<?php echo ($res2[25]["norm"]); ?>">别人叫自己名字是会作出反应，面对其它名字则没有反应</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>6-12月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>27</td><td><a href="" title="评估材料：<?php echo ($res2[26]["material"]); ?>&#13;评估方法：<?php echo ($res2[26]["way"]); ?>&#13;评估标准：<?php echo ($res2[26]["norm"]); ?>">聆听响声及转向声源</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>7-15月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>28</td><td><a href="" title="评估材料：<?php echo ($res2[27]["material"]); ?>&#13;评估方法：<?php echo ($res2[27]["way"]); ?>&#13;评估标准：<?php echo ($res2[27]["norm"]); ?>">聆听哨子声及转向声源</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>7-15月</td><td><input type="text" name="gz[]" ></td></tr>
				<tr><td>29</td><td><a href="" title="评估材料：<?php echo ($res2[28]["material"]); ?>&#13;评估方法：<?php echo ($res2[28]["way"]); ?>&#13;评估标准：<?php echo ($res2[28]["norm"]); ?>">聆听摇铃声及转向声源</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>7-15月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>30</td><td><a href="" title="评估材料：<?php echo ($res2[29]["material"]); ?>&#13;评估方法：<?php echo ($res2[29]["way"]); ?>&#13;评估标准：<?php echo ($res2[29]["norm"]); ?>">分辨声音的长、短、强、弱、快、慢</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>24-36月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>31</td><td><a href="" title="评估材料：<?php echo ($res2[30]["material"]); ?>&#13;评估方法：<?php echo ($res2[30]["way"]); ?>&#13;评估标准：<?php echo ($res2[30]["norm"]); ?>">分辨生活中和自然界的各种声音</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>24-36月</td><td><input type="text" name="gz[]" ></td></tr>
				<tr><td>32</td><td><a href="" title="评估材料：<?php echo ($res2[31]["material"]); ?>&#13;评估方法：<?php echo ($res2[31]["way"]); ?>&#13;评估标准：<?php echo ($res2[31]["norm"]); ?>">聆听常见的乐器声</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>36-48月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>33</td><td><a href="" title="评估材料：<?php echo ($res2[32]["material"]); ?>&#13;评估方法：<?php echo ($res2[32]["way"]); ?>&#13;评估标准：<?php echo ($res2[32]["norm"]); ?>">分辨2种以上的铃声或节奏声</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>48-60月</td><td><input type="text" name="gz[]" ></td></tr>
				<tr><td>▲34</td><td rowspan="10">触觉</td><td rowspan="3">触觉反应</td><td><a href="" title="评估材料：<?php echo ($res2[33]["material"]); ?>&#13;评估方法：<?php echo ($res2[33]["way"]); ?>&#13;评估标准：<?php echo ($res2[33]["norm"]); ?>">对东西触碰身体时，作出适当的反应</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>3-6月</td><td><input type="text" name="gz[]" ></td></tr>
				<tr><td>★35</td><td><a href="" title="评估材料：<?php echo ($res2[34]["material"]); ?>&#13;评估方法：<?php echo ($res2[34]["way"]); ?>&#13;评估标准：<?php echo ($res2[34]["norm"]); ?>">对三种不同的触觉刺激作出反应</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>0-12月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>★36</td><td><a href="" title="评估材料：<?php echo ($res2[35]["material"]); ?>&#13;评估方法：<?php echo ($res2[35]["way"]); ?>&#13;评估标准：<?php echo ($res2[35]["norm"]); ?>">对自己的衣物湿了又反应</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>12-24月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>37</td><td rowspan="5">触觉辨别</td><td><a href="" title="评估材料：<?php echo ($res2[36]["material"]); ?>&#13;评估方法：<?php echo ($res2[36]["way"]); ?>&#13;评估标准：<?php echo ($res2[36]["norm"]); ?>">凭触觉配对常见物品</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>24-36月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>38</td><td><a href="" title="评估材料：<?php echo ($res2[37]["material"]); ?>&#13;评估方法：<?php echo ($res2[37]["way"]); ?>&#13;评估标准：<?php echo ($res2[37]["norm"]); ?>">凭触觉挑选常见物品</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>24-36月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>39</td><td><a href="" title="评估材料：<?php echo ($res2[38]["material"]); ?>&#13;评估方法：<?php echo ($res2[38]["way"]); ?>&#13;评估标准：<?php echo ($res2[38]["norm"]); ?>">凭触觉区分轻重</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>36-48月</td><td><input type="text" name="gz[]" ></td></tr>
				<tr><td>40</td><td><a href="" title="评估材料：<?php echo ($res2[39]["material"]); ?>&#13;评估方法：<?php echo ($res2[39]["way"]); ?>&#13;评估标准：<?php echo ($res2[39]["norm"]); ?>">凭触觉区分干湿</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>36-48月</td><td><input type="text" name="gz[]" ></td></tr>
				<tr><td>41</td><td><a href="" title="评估材料：<?php echo ($res2[40]["material"]); ?>&#13;评估方法：<?php echo ($res2[40]["way"]); ?>&#13;评估标准：<?php echo ($res2[40]["norm"]); ?>">触摸物体的形状</a></td><td><select name="g[]"><option value="<?php echo ($res1[40]["items_values"]); ?>"><?php echo ($res1[40]["items_values"]); ?></option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>48-60月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>42</td><td rowspan="2">触觉记忆</td><td><a href="" title="评估材料：<?php echo ($res2[41]["material"]); ?>&#13;评估方法：<?php echo ($res2[41]["way"]); ?>&#13;评估标准：<?php echo ($res2[41]["norm"]); ?>">触摸物体按大、小排列</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>60-72月</td><td><input type="text" name="gz[]" ></td></tr>
				<tr><td>43</td><td><a href="" title="评估材料：<?php echo ($res2[42]["material"]); ?>&#13;评估方法：<?php echo ($res2[42]["way"]); ?>&#13;评估标准：<?php echo ($res2[42]["norm"]); ?>">触摸物体按轻、重排列</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>60-72月</td><td><input type="text" name="gz[]" ></td></tr>
				<tr><td>★44</td><td rowspan="7">味觉</td><td>味觉反应</td><td><a href="" title="评估材料：<?php echo ($res2[43]["material"]); ?>&#13;评估方法：<?php echo ($res2[43]["way"]); ?>&#13;评估标准：<?php echo ($res2[43]["norm"]); ?>">对3种不同味道作出反应</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>0-12月</td><td><input type="text" name="gz[]" ></td></tr>
				<tr><td>45</td><td rowspan="3">味觉辨别</td><td><a href="" title="评估材料：<?php echo ($res2[44]["material"]); ?>&#13;评估方法：<?php echo ($res2[44]["way"]); ?>&#13;评估标准：<?php echo ($res2[44]["norm"]); ?>">分辨酸、甜味道</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>12-24月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>46</td><td><a href="" title="评估材料：<?php echo ($res2[45]["material"]); ?>&#13;评估方法：<?php echo ($res2[45]["way"]); ?>&#13;评估标准：<?php echo ($res2[45]["norm"]); ?>">分辨咸、苦味道</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>12-24月</td><td><input type="text" name="gz[]" ></td></tr>
				<tr><td>47</td><td><a href="" title="评估材料：<?php echo ($res2[46]["material"]); ?>&#13;评估方法：<?php echo ($res2[46]["way"]); ?>&#13;评估标准：<?php echo ($res2[46]["norm"]); ?>">分辨食物的冷热</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>24-36月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>48</td><td rowspan="3">味觉记忆</td><td><a href="" title="评估材料：<?php echo ($res2[47]["material"]); ?>&#13;评估方法：<?php echo ($res2[47]["way"]); ?>&#13;评估标准：<?php echo ($res2[47]["norm"]); ?>">辨别各种味道的浓和淡(如：甜味)</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>36-48月</td><td><input type="text" name="gz[]" ></td></tr>
				<tr><td>49</td><td><a href="" title="评估材料：<?php echo ($res2[48]["material"]); ?>&#13;评估方法：<?php echo ($res2[48]["way"]); ?>&#13;评估标准：<?php echo ($res2[48]["norm"]); ?>">辨别食物的软、硬和滑、粗</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>48-60月</td><td><input type="text" name="gz[]" ></td></tr>
				<tr><td>50</td><td><a href="" title="评估材料：<?php echo ($res2[49]["material"]); ?>&#13;评估方法：<?php echo ($res2[49]["way"]); ?>&#13;评估标准：<?php echo ($res2[49]["norm"]); ?>">识别混合味道的食物</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>60-72月</td><td><input type="text" name="gz[]" ></td></tr>
				<tr><td>★51</td><td rowspan="7">嗅觉</td><td>嗅觉反应</td><td><a href="" title="评估材料：<?php echo ($res2[50]["material"]); ?>&#13;评估方法：<?php echo ($res2[50]["way"]); ?>&#13;评估标准：<?php echo ($res2[50]["norm"]); ?>">对3种不同气味作出反应</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>0-12月</td><td><input type="text" name="gz[]" ></td></tr>
				<tr><td>52</td><td rowspan="2">嗅觉辨别</td><td><a href="" title="评估材料：<?php echo ($res2[51]["material"]); ?>&#13;评估方法：<?php echo ($res2[51]["way"]); ?>&#13;评估标准：<?php echo ($res2[51]["norm"]); ?>">分辨香、臭气味</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>12-24月</td><td><input type="text" name="gz[]"></td></tr>
				<tr><td>53</td><td><a href="" title="评估材料：<?php echo ($res2[52]["material"]); ?>&#13;评估方法：<?php echo ($res2[52]["way"]); ?>&#13;评估标准：<?php echo ($res2[52]["norm"]); ?>">依气味配对</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>48-60月</td><td><input type="text" name="gz[]" ></td></tr>
				<tr><td>54</td><td rowspan="2">嗅觉记忆</td><td><a href="" title="评估材料：<?php echo ($res2[53]["material"]); ?>&#13;评估方法：<?php echo ($res2[53]["way"]); ?>&#13;评估标准：<?php echo ($res2[53]["norm"]); ?>">根据气味，指出或说出常见的食物</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>24-36月</td><td><input type="text" name="gz[]" ></td></tr>
				<tr><td>55</td><td><a href="" title="评估材料：<?php echo ($res2[54]["material"]); ?>&#13;评估方法：<?php echo ($res2[54]["way"]); ?>&#13;评估标准：<?php echo ($res2[54]["norm"]); ?>">根据气味，说出两种水果的名称</a></td><td><select name="g[]"><option value="">--</option>
				<option value="P">P</option><option value="E">E</option><option value="F">F</option><option value="X">X</option></select></td><td>24-36月</td><td><input type="text" name="gz[]"></td></tr>
			</table><br/>
			<h4 class="text-danger">备注：<br/>
				★——代表观察项目<br/>
				▲ ——代表直接观察或是直接评估项目<br/>
				项目号前面没有任何标注的为直接评估项目<br/>
			</h4>
			<center class="noprint"><input name="save" type="submit" value="保&nbsp;&nbsp;存" class="btn btn-info btn-lg" >&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="submit" type="submit" value="完成评估" class="btn btn-primary btn-lg" >
			</center>
			
			</form>
		</div>
	</div>
<script type="text/javascript">
	setInterval(function(){
		//alert('aaa');
		var url ="/index.php/Record/scale_info";
		var data = $("#myForm").serializeArray();
		var g=[];
		var gz=[];
		for(var i=2,k=0;i<data.length;i++,k++){
			if(i%2==0){
				g.push(data[i]["value"]);	
			}else{
				gz.push(data[i]["value"]);
			}
		}
		var postData={kind_id:data[0].value,a_id:data[1].value,g:g,gz:gz};
		
		$.post(url,postData,function(res){
			if(res ==''){return;}
			$('.save').show();
			 $('.save').html('数据自动保存成功~~');
		        setTimeout(function() {$('.save').hide();}, 2000);
		        return;
		});
	},60000); //每隔一分钟保存一次
</script>
</body>
</html>