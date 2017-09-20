<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>量表信息页面</title>
	<link href="/Public/css/bootstrap.min.css" rel="stylesheet">
	<link href="/Public/css/me.css" rel="stylesheet">
	<!-- 在引入bootstrap.min.js核心库之间加载jquery.min.js -->
	<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/Public/js/checkPw.js"></script>
</head>
<body style="background:#F0F2F5;">
	<div class="container-fluid"><br/><br/>
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
			<form  id="myForm" action="/index.php/Record/scale_info" method="post">
			<input type="hidden" name="kind_id" value="<?php echo ($kind_id); ?>"><input type="hidden" name="a_id" value="<?php echo ($a_id); ?>">
			<table border="1" style="width:100%;text-align:center;font-size:0.8em; margin-top:-3em;">
				<tr><th>代号</th><th colspan="2">评估范围</th><th>评估项目</th><th>评估记录</th><th>参考年龄</th><th>备注</th></tr>
      			<tr><td>1</td><td rowspan="8">姿势 </td><td rowspan="3">坐姿 </td><td><a href="" title="评估材料：<?php echo ($res2[0]["material"]); ?>&#13;评估方法：<?php echo ($res2[0]["way"]); ?>&#13;评估标准：<?php echo ($res2[0]["norm"]); ?>">坐姿双手离地，转动躯干</a></td>
      			<td>
        		<select name="g[]">
        		 	<option value="">--</option>
         		 <option value="P">P</option><option value="E">E</option>
   				 <option value="F">F</option><option value="X">X</option>
        		</select>
        		</td><td >7-8月 </td><td><input type="text" name="gz[]"></td>
      			</tr>
      		<tr>
        		<td>▲2</td>
       			<td><a href="" title="评估材料：<?php echo ($res2[1]["material"]); ?>&#13;评估方法：<?php echo ($res2[1]["way"]); ?>&#13;评估标准：<?php echo ($res2[1]["norm"]); ?>">扶桌子由站转至坐地 </a></td>
         		<td>
        		<select name="g[]" >
	          		<option value="">--</option>
	          		<option value="P">P</option><option value="E">E</option>
	          		<option value="F">F</option><option value="X">X</option>
        		</select>
        		</td><td>10-12月 </td><td><input type="text" name="gz[]" ></td>
      		</tr>
      	<tr><td>3</td><td><a href="" title="评估材料：<?php echo ($res2[2]["material"]); ?>&#13;评估方法：<?php echo ($res2[2]["way"]); ?>&#13;评估标准：<?php echo ($res2[2]["norm"]); ?>">坐矮凳上弯腰拣拾地上玩具</a></td>
         <td><select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option></select></td>
        <td>12-24月 </td>
        <td><input type="text" name="gz[]" ></td>
      </tr>
      <tr>
        <td>★4 </td>
        <td rowspan="5">站姿 </td>
        <td><a href="" title="评估材料：<?php echo ($res2[3]["material"]); ?>&#13;评估方法：<?php echo ($res2[3]["way"]); ?>&#13;评估标准：<?php echo ($res2[3]["norm"]); ?>">独自站立5秒 </a></td>
         <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
        <td>12-24月 </td>
        <td><input type="text" name="gz[]" ></td>
      </tr>
      <tr>
        <td>▲5</td>
        <td><a href="" title="评估材料：<?php echo ($res2[4]["material"]); ?>&#13;评估方法：<?php echo ($res2[4]["way"]); ?>&#13;评估标准：<?php echo ($res2[4]["norm"]); ?>">站立时能弯腰拣拾地上物品 </a></td>
         <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td><td>12-24月 </td>
        <td><input type="text" name="gz[]" value="<?php echo ($res1[4]["remark"]); ?>"></td></tr>
      <tr>
        <td>●6</td>
        <td><a href="" title="评估材料：<?php echo ($res2[5]["material"]); ?>&#13;评估方法：<?php echo ($res2[5]["way"]); ?>&#13;评估标准：<?php echo ($res2[5]["norm"]); ?>">单脚站5秒 </a></td>
         <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
        <td>30-48月 </td>
        <td><input type="text" name="gz[]"></td>
      </tr>
      <tr>
        <td>●7</td>
        <td><a href="" title="评估材料：<?php echo ($res2[6]["material"]); ?>&#13;评估方法：<?php echo ($res2[6]["way"]); ?>&#13;评估标准：<?php echo ($res2[6]["norm"]); ?>">单脚站10秒左右轮流</a> </td>
         <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
        <td>53-60月 </td>
        <td><input type="text" name="gz[]"></td>
      </tr>
      <tr>
        <td>●8</td>
        <td><a href="" title="评估材料：<?php echo ($res2[7]["material"]); ?>&#13;评估方法：<?php echo ($res2[7]["way"]); ?>&#13;评估标准：<?php echo ($res2[7]["norm"]); ?>">脚尖站8秒 </a></td>
         <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
        <td>43-52月 </td>
        <td><input type="text" name="gz[]" ></td>
      </tr>
      <tr>
        <td >▲9</td>
        <td rowspan="72">移动 </td>
        <td rowspan="3">爬 </td>
        <td><a href="" title="评估材料：<?php echo ($res2[8]["material"]); ?>&#13;评估方法：<?php echo ($res2[8]["way"]); ?>&#13;评估标准：<?php echo ($res2[8]["norm"]); ?>"> 灵活爬行</a></td>
 
         <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
        <td>9-10月 </td>
        <td><input type="text" name="gz[]"></td>
      </tr>
      <tr>
        <td>10</td>
        <td><a href="" title="评估材料：<?php echo ($res2[9]["material"]); ?>&#13;评估方法：<?php echo ($res2[9]["way"]); ?>&#13;评估标准：<?php echo ($res2[9]["norm"]); ?>"> 爬上楼梯 </a></td>
         <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
        <td>12-24月 </td>
        <td><input type="text" name="gz[]" ></td>
      </tr>
      <tr>
        <td>11</td>
        <td><a href="" title="评估材料：<?php echo ($res2[10]["material"]); ?>&#13;评估方法：<?php echo ($res2[10]["way"]); ?>&#13;评估标准：<?php echo ($res2[10]["norm"]); ?>"> 爬下楼梯 </a></td>
         <td >
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
        <td>12-24月 </td>
        <td><input type="text" name="gz[]" ></td>
      </tr>
      <tr>
        <td >●12 </td>
        <td rowspan="2">坐 </td>
        <td ><a href="" title="评估材料：<?php echo ($res2[11]["material"]); ?>&#13;评估方法：<?php echo ($res2[11]["way"]); ?>&#13;评估标准：<?php echo ($res2[11]["norm"]); ?>"> 臀部移动</a> </td>
         <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
        <td>9-10月 </td>
        <td><input type="text" name="gz[]" ></td>
      </tr>
      <tr>
        <td>13</td>
        <td><a href="" title="评估材料：<?php echo ($res2[12]["material"]); ?>&#13;评估方法：<?php echo ($res2[12]["way"]); ?>&#13;评估标准：<?php echo ($res2[12]["norm"]); ?>"> 坐位转圈</a> </td>
         <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
        <td>9-11月 </td>
        <td><input type="text" name="gz[]" ></td>
      </tr>
      <tr>
        <td>●14 </td>
        <td rowspan="7">站立 </td>
        <td><a href="" title="评估材料：<?php echo ($res2[13]["material"]); ?>&#13;评估方法：<?php echo ($res2[13]["way"]); ?>&#13;评估标准：<?php echo ($res2[13]["norm"]); ?>"> 坐姿站起</a> </td>
         <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
        <td>12-24月 </td>
        <td ><input type="text" name="gz[]" ></td>
      </tr>
      <tr>
        <td >15</td>
        <td><a href="" title="评估材料：<?php echo ($res2[14]["material"]); ?>&#13;评估方法：<?php echo ($res2[14]["way"]); ?>&#13;评估标准：<?php echo ($res2[14]["norm"]); ?>"> 由蹲站起 </a></td>
         <td>
        <select name="g[]" >
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
        <td >12-24月 </td>
        <td><input type="text" name="gz[]" ></td>
      </tr>
      <tr>
        <td>●16 </td>
        <td><a href="" title="评估材料：<?php echo ($res2[15]["material"]); ?>&#13;评估方法：<?php echo ($res2[15]["way"]); ?>&#13;评估标准：<?php echo ($res2[15]["norm"]); ?>"> 站姿动作模仿</a> </td>
         <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
        <td>18-26月 </td>
        <td><input type="text" name="gz[]"></td>
      </tr>
      <tr>
        <td>▲17</td>
        <td><a href="" title="评估材料：<?php echo ($res2[16]["material"]); ?>&#13;评估方法：<?php echo ($res2[16]["way"]); ?>&#13;评估标准：<?php echo ($res2[16]["norm"]); ?>"> 往前跌时做出向前踏步反应 </a></td>
         <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
        <td>12-24月 </td>
        <td><input type="text" name="gz[]" ></td>
      </tr>
      <tr align="center">
        <td>▲18</td>
        <td><a href="" title="评估材料：<?php echo ($res2[17]["material"]); ?>&#13;评估方法：<?php echo ($res2[17]["way"]); ?>&#13;评估标准：<?php echo ($res2[17]["norm"]); ?>"> 往侧跌时做出向旁踏步反应 </a></td>
         <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
        <td>12-24月 </td>
        <td><input type="text" name="gz[]"></td>
      </tr>
      <tr>
        <td>▲19</td>
        <td><a href="" title="评估材料：<?php echo ($res2[18]["material"]); ?>&#13;评估方法：<?php echo ($res2[18]["way"]); ?>&#13;评估标准：<?php echo ($res2[18]["norm"]); ?>"> 往后跌时作出向后踏步反应 </a></td>
         <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
        <td>24-36月 </td>
        <td><input type="text" name="gz[]" ></td>
      </tr>
      <tr>
        <td>●20 </td>
        <td><a href="" title="评估材料：<?php echo ($res2[19]["material"]); ?>&#13;评估方法：<?php echo ($res2[19]["way"]); ?>&#13;评估标准：<?php echo ($res2[19]["norm"]); ?>"> 单脚站一边6秒，一边3秒 </a></td>
         <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
        <td>60-72月 </td>
        <td><input type="text" name="gz[]"></td>
      </tr>
      <tr align="center">
        <td>▲21</td>
        <td rowspan="16">行走 </td>
        <td><a href="" title="评估材料：<?php echo ($res2[20]["material"]); ?>&#13;评估方法：<?php echo ($res2[20]["way"]); ?>&#13;评估标准：<?php echo ($res2[20]["norm"]); ?>"> 扶一手走</a> </td>
         <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
        <td>12-16月 </td>
        <td><input type="text" name="gz[]" ></td>
      </tr>
      <tr>
        <td>22</td>
        <td><a href="" title="评估材料：<?php echo ($res2[21]["material"]); ?>&#13;评估方法：<?php echo ($res2[21]["way"]); ?>&#13;评估标准：<?php echo ($res2[21]["norm"]); ?>">独自行走5步</a> </td>
         <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
        <td>12-24月 </td>
        <td><input type="text" name="gz[]" ></td>
      </tr>
      <tr>
        <td>23</td>
        <td><a href="" title="评估材料：<?php echo ($res2[22]["material"]); ?>&#13;评估方法：<?php echo ($res2[22]["way"]); ?>&#13;评估标准：<?php echo ($res2[22]["norm"]); ?>">双手抱大玩具向前行走 </a></td>
         <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
        <td>12-24月 </td>
        <td><input type="text" name="gz[]" ></td>
      </tr>
      <tr>
        <td>●24 </td>
        <td><a href="" title="评估材料：<?php echo ($res2[23]["material"]); ?>&#13;评估方法：<?php echo ($res2[23]["way"]); ?>&#13;评估标准：<?php echo ($res2[23]["norm"]); ?>">侧向行走 </a></td>
         <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
        <td>21-22月 </td>
        <td><input type="text" name="gz[]" ></td>
      </tr>
   
        <tr>
          <td>●25 </td>
          <td><a href="" title="评估材料：<?php echo ($res2[24]["material"]); ?>&#13;评估方法：<?php echo ($res2[24]["way"]); ?>&#13;评估标准：<?php echo ($res2[24]["norm"]); ?>">走直线</a></td>

           <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
        <td>18~36月 </td>
        <td ><input type="text" name="gz[]"></td>
        </tr>
        <tr align="center">
          <td>▲26</td>
          <td><a href="" title="评估材料：<?php echo ($res2[25]["material"]); ?>&#13;评估方法：<?php echo ($res2[25]["way"]); ?>&#13;评估标准：<?php echo ($res2[25]["norm"]); ?>">扶物上楼梯</a></td>
           <td>
        <select name="g[]">
          <option value="<?php echo ($res1[25]["items_values"]); ?>"><?php echo ($res1[25]["items_values"]); ?></option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
                  <td>21-22月 </td>
        <td><input type="text" name="gz[]" value="<?php echo ($res1[25]["remark"]); ?>"></td>
        </tr>
        <tr>
            <td>▲27</td> 
            <td><a href="" title="评估材料：<?php echo ($res2[26]["material"]); ?>&#13;评估方法：<?php echo ($res2[26]["way"]); ?>&#13;评估标准：<?php echo ($res2[26]["norm"]); ?>">扶物下楼梯</a></td>
             <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
            <td>18~36月</td>
            <td><input type="text" name="gz[]" value="<?php echo ($res1[26]["remark"]); ?>"></td>
          </tr>
          <tr>
            <td>●28 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[27]["material"]); ?>&#13;评估方法：<?php echo ($res2[27]["way"]); ?>&#13;评估标准：<?php echo ($res2[27]["norm"]); ?>">在15厘米宽的平衡木上交替行走</a></td>
             <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
            <td>24-36月</td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>▲29</td>
            <td><a href="" title="评估材料：<?php echo ($res2[28]["material"]); ?>&#13;评估方法：<?php echo ($res2[28]["way"]); ?>&#13;评估标准：<?php echo ($res2[28]["norm"]); ?>">两步上一级楼梯（不扶物）</a> </td>
             <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
            <td>24~36月</td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>▲30</td>
            <td><a href="" title="评估材料：<?php echo ($res2[29]["material"]); ?>&#13;评估方法：<?php echo ($res2[29]["way"]); ?>&#13;评估标准：<?php echo ($res2[29]["norm"]); ?>">两步下一级楼梯（不扶物）</a> </td>
             <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
            <td>24~36月</td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>▲31</td>
            <td><a href="" title="评估材料：<?php echo ($res2[30]["material"]); ?>&#13;评估方法：<?php echo ($res2[30]["way"]); ?>&#13;评估标准：<?php echo ($res2[30]["norm"]); ?>">一步上一级楼梯</a></td>
             <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
            <td>36-48月</td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>▲32</td>
            <td><a href="" title="评估材料：<?php echo ($res2[31]["material"]); ?>&#13;评估方法：<?php echo ($res2[31]["way"]); ?>&#13;评估标准：<?php echo ($res2[31]["norm"]); ?>">一步下一级楼梯</a></td>
             <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
            <td>36~48月</td>
            <td><input type="text" name="gz[]"></td>
          </tr>
          <tr>
            <td>●33</td>
            <td><a href="" title="评估材料：<?php echo ($res2[32]["material"]); ?>&#13;评估方法：<?php echo ($res2[32]["way"]); ?>&#13;评估标准：<?php echo ($res2[32]["norm"]); ?>">踮脚走10步</a></td>
             <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
            <td>36-48月</td>
            <td><input type="text" name="gz[]"></td>
          </tr>
          <tr>
            <td>●34</td>
            <td><a href="" title="评估材料：<?php echo ($res2[33]["material"]); ?>&#13;评估方法：<?php echo ($res2[33]["way"]); ?>&#13;评估标准：<?php echo ($res2[33]["norm"]); ?>">在平地上倒退走直线5步</a></td>
             <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
            <td>36~48月</td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>●35</td>
            <td><a href="" title="评估材料：<?php echo ($res2[34]["material"]); ?>&#13;评估方法：<?php echo ($res2[34]["way"]); ?>&#13;评估标准：<?php echo ($res2[34]["norm"]); ?>">脚尖贴脚后跟走3米</a></td>
             <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
            <td>48-60月</td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>●36</td>
            <td ><a href="" title="评估材料：<?php echo ($res2[35]["material"]); ?>&#13;评估方法：<?php echo ($res2[35]["way"]); ?>&#13;评估标准：<?php echo ($res2[35]["norm"]); ?>">脚后跟行走3米</a></td>
             <td >
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
            <td>48-60月</td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td >37</td>
            <td  rowspan="12">跳跃 </td>
            <td ><a href="" title="评估材料：<?php echo ($res2[36]["material"]); ?>&#13;评估方法：<?php echo ($res2[36]["way"]); ?>&#13;评估标准：<?php echo ($res2[36]["norm"]); ?>">手扶弹跳</a></td>
             <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
            <td>10月</td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>●38 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[37]["material"]); ?>&#13;评估方法：<?php echo ($res2[37]["way"]); ?>&#13;评估标准：<?php echo ($res2[37]["norm"]); ?>">原地跳，双脚离地5 cm</a></td>

             <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
            <td>24-36月</td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>●39</td>
            <td><a href="" title="评估材料：<?php echo ($res2[38]["material"]); ?>&#13;评估方法：<?php echo ($res2[38]["way"]); ?>&#13;评估标准：<?php echo ($res2[38]["norm"]); ?>">向前跳10cm</a></td>
             <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
            <td>24-36月</td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>●40 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[39]["material"]); ?>&#13;评估方法：<?php echo ($res2[39]["way"]); ?>&#13;评估标准：<?php echo ($res2[39]["norm"]); ?>">站在楼梯或台阶上往下跳</a></td>
             <td>
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
            <td>24-36月</td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>●41 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[40]["material"]); ?>&#13;评估方法：<?php echo ($res2[40]["way"]); ?>&#13;评估标准：<?php echo ($res2[40]["norm"]); ?>">跳上高5cm的台阶</a></td>
             <td >
        <select name="g[]">
          <option value="">--</option>
          <option value="P">P</option>
          <option value="E">E</option>
          <option value="F">F</option>
          <option value="X">X</option>
        </select>
        </td>
            <td>36-48月</td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>●42 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[41]["material"]); ?>&#13;评估方法：<?php echo ($res2[41]["way"]); ?>&#13;评估标准：<?php echo ($res2[41]["norm"]); ?>">跳过高度及膝的栏杆</a></td>
            <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>48~60月</td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>●43 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[42]["material"]); ?>&#13;评估方法：<?php echo ($res2[42]["way"]); ?>&#13;评估标准：<?php echo ($res2[42]["norm"]); ?>">左右跳3次</a></td>
            <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>48~60月</td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>●44 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[43]["material"]); ?>&#13;评估方法：<?php echo ($res2[43]["way"]); ?>&#13;评估标准：<?php echo ($res2[43]["norm"]); ?>">向前跨跳一步</a></td>
            <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>48-60月</td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>●45 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[44]["material"]); ?>&#13;评估方法：<?php echo ($res2[44]["way"]); ?>&#13;评估标准：<?php echo ($res2[44]["norm"]); ?>">连续跨马跃步10步</a> </td>
            <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>48-60月</td>
            <td><input type="text" name="gz[]"></td>
          </tr>
          <tr>
            <td>●46 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[45]["material"]); ?>&#13;评估方法：<?php echo ($res2[45]["way"]); ?>&#13;评估标准：<?php echo ($res2[45]["norm"]); ?>">连续侧滑步3米 </a></td>
            <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>48~60月</td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>●47</td>
            <td><a href="" title="评估材料：<?php echo ($res2[46]["material"]); ?>&#13;评估方法：<?php echo ($res2[46]["way"]); ?>&#13;评估标准：<?php echo ($res2[46]["norm"]); ?>">连续向后跳10次</a></td>
            <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>60-72月</td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>●48 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[47]["material"]); ?>&#13;评估方法：<?php echo ($res2[47]["way"]); ?>&#13;评估标准：<?php echo ($res2[47]["norm"]); ?>">连续单脚跳8次</a></td>
  
            <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>48~60月</td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>●49</td>
            <td>跑 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[48]["material"]); ?>&#13;评估方法：<?php echo ($res2[48]["way"]); ?>&#13;评估标准：<?php echo ($res2[48]["norm"]); ?>">5秒内在3米距离内来回跑</a> </td>
            <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>48-60月</td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>50</td>
            <td rowspan="3">推 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[49]["material"]); ?>&#13;评估方法：<?php echo ($res2[49]["way"]); ?>&#13;评估标准：<?php echo ($res2[49]["norm"]); ?>">站立推球至1.5m远处</a></td>
            <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>24-36月</td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>●51 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[50]["material"]); ?>&#13;评估方法：<?php echo ($res2[50]["way"]); ?>&#13;评估标准：<?php echo ($res2[50]["norm"]); ?>">单手推网球至1.8m远宽40cm的球门内</a></td>
            <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>36-48月</td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>52</td>
            <td ><a href="" title="评估材料：<?php echo ($res2[51]["material"]); ?>&#13;评估方法：<?php echo ($res2[51]["way"]); ?>&#13;评估标准：<?php echo ($res2[51]["norm"]); ?>">桌上推球10次 </a></td>
            <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>48~60月</td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>▲53</td>
            <td rowspan="2">端 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[52]["material"]); ?>&#13;评估方法：<?php echo ($res2[52]["way"]); ?>&#13;评估标准：<?php echo ($res2[52]["norm"]); ?>">单手端半杯水步行3米</a> </td>
            <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>24-36月</td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td >▲54</td>
            <td><a href="" title="评估材料：<?php echo ($res2[53]["material"]); ?>&#13;评估方法：<?php echo ($res2[53]["way"]); ?>&#13;评估标准：<?php echo ($res2[53]["norm"]); ?>">双手端盛物托盘步行3米</a></td>
            <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>36-48月</td>
            <td><input type="text" name="gz[]" value="<?php echo ($res1[53]["remark"]); ?>"></td>
          </tr>
          <tr>
            <td>●55 </td>
            <td rowspan="6">抛 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[54]["material"]); ?>&#13;评估方法：<?php echo ($res2[54]["way"]); ?>&#13;评估标准：<?php echo ($res2[54]["norm"]); ?>">单手-手过肩向前抛球1.2m </a></td>
            <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>36~48月</td>
            <td><input type="text" name="gz[]"></td>
          </tr>
          <tr>
            <td>●56 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[55]["material"]); ?>&#13;评估方法：<?php echo ($res2[55]["way"]); ?>&#13;评估标准：<?php echo ($res2[55]["norm"]); ?>">双手-手过肩向前抛球1.2m</a> </td>
            <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>48~60月</td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
 
        <tr>
          <td>●57 </td>
          <td><a href="" title="评估材料：<?php echo ($res2[56]["material"]); ?>&#13;评估方法：<?php echo ($res2[56]["way"]); ?>&#13;评估标准：<?php echo ($res2[56]["norm"]); ?>">双手向下抛球至1.5m远处的目标</a> </td>
          <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
          <td>48-60月 </td>
          <td><input type="text" name="gz[]" ></td>
        </tr>
        <tr>
          <td>●58 </td>
          <td><a href="" title="评估材料：<?php echo ($res2[57]["material"]); ?>&#13;评估方法：<?php echo ($res2[57]["way"]); ?>&#13;评估标准：<?php echo ($res2[57]["norm"]); ?>">单手向下抛球至1.2m远处的目标 </a></td>
          <td>
        	<select name="g[]">
	          <option value="<?php echo ($res1[57]["items_values"]); ?>"><?php echo ($res1[57]["items_values"]); ?></option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
          <td>48~60月 </td>
          <td ><input type="text" name="gz[]" ></td>
        </tr>
        <tr>
          <td>●59 </td>
          <td><a href="" title="评估材料：<?php echo ($res2[58]["material"]); ?>&#13;评估方法：<?php echo ($res2[58]["way"]); ?>&#13;评估标准：<?php echo ($res2[58]["norm"]); ?>">单手-手过肩抛口袋至3米远2米宽目标 </a></td>
      
          <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
          <td>48-60月 </td>
          <td><input type="text" name="gz[]" ></td>
        </tr>
          <tr>
            <td>●60 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[59]["material"]); ?>&#13;评估方法：<?php echo ($res2[59]["way"]); ?>&#13;评估标准：<?php echo ($res2[59]["norm"]); ?>">双手过肩抛球至1.5m远的目标</a> </td>
            <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>48~60月 </td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>●61 </td>
            <td rowspan="3">击 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[60]["material"]); ?>&#13;评估方法：<?php echo ($res2[60]["way"]); ?>&#13;评估标准：<?php echo ($res2[60]["norm"]); ?>">垂直挥拍击中吊球</a> </td>
            <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>36-48月 </td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>●62 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[61]["material"]); ?>&#13;评估方法：<?php echo ($res2[61]["way"]); ?>&#13;评估标准：<?php echo ($res2[61]["norm"]); ?>">横向挥拍击中吊球</a> </td>
            <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>36-48月 </td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>●63 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[62]["material"]); ?>&#13;评估方法：<?php echo ($res2[62]["way"]); ?>&#13;评估标准：<?php echo ($res2[62]["norm"]); ?>">用球拍向前发球1.5m </a></td>
            <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>60-72月 </td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>●64 </td>
            <td rowspan="3">踢 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[63]["material"]); ?>&#13;评估方法：<?php echo ($res2[63]["way"]); ?>&#13;评估标准：<?php echo ($res2[63]["norm"]); ?>">向前踢球1米 </a></td>
            <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>24-36月 </td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>65</td>
            <td><a href="" title="评估材料：<?php echo ($res2[64]["material"]); ?>&#13;评估方法：<?php echo ($res2[64]["way"]); ?>&#13;评估标准：<?php echo ($res2[64]["norm"]); ?>">踢球至距离1.8米远、宽70厘米的目标</a> </td>
            <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>36-48月 </td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>●66 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[65]["material"]); ?>&#13;评估方法：<?php echo ($res2[65]["way"]); ?>&#13;评估标准：<?php echo ($res2[65]["norm"]); ?>">跑向球，踢固定球 </a></td>
            <td >
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>48~60月 </td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>67</td>
            <td rowspan="3">接 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[66]["material"]); ?>&#13;评估方法：<?php echo ($res2[66]["way"]); ?>&#13;评估标准：<?php echo ($res2[66]["norm"]); ?>">双手接自1.5米远处抛来的球</a> </td>
            <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>36-48月 </td>
            <td ><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>68</td>
            <td><a href="" title="评估材料：<?php echo ($res2[67]["material"]); ?>&#13;评估方法：<?php echo ($res2[67]["way"]); ?>&#13;评估标准：<?php echo ($res2[67]["norm"]); ?>">双手接自1.5米远处地上弹回来的球 </a></td>

            <td>
        	<select name="g[]" >
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>48~60月 </td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>●69 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[68]["material"]); ?>&#13;评估方法：<?php echo ($res2[68]["way"]); ?>&#13;评估标准：<?php echo ($res2[68]["norm"]); ?>">扔球后接弹起的球</a> </td>
            <td >
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>68-72月 </td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>●70 </td>
            <td rowspan="3">拍 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[69]["material"]); ?>&#13;评估方法：<?php echo ($res2[69]["way"]); ?>&#13;评估标准：<?php echo ($res2[69]["norm"]); ?>">双手连续向下拍球</a> </td>
            <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>60-72月 </td>
            <td><input type="text" name="gz[]" ></td>
          </tr>
          <tr>
            <td>●71 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[70]["material"]); ?>&#13;评估方法：<?php echo ($res2[70]["way"]); ?>&#13;评估标准：<?php echo ($res2[70]["norm"]); ?>">单手连续拍球3次 </a></td>
            <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>60-72月 </td>
            <td><input type="text" name="gz[]"></td>
          </tr>
          <tr>
            <td>●72 </td>
            <td><a href="" title="评估材料：<?php echo ($res2[71]["material"]); ?>&#13;评估方法：<?php echo ($res2[71]["way"]); ?>&#13;评估标准：<?php echo ($res2[71]["norm"]); ?>">左右手轮流向上拍气球4次 </a></td>
            <td>
        	<select name="g[]">
	          <option value="">--</option>
	          <option value="P">P</option>
	          <option value="E">E</option>
	          <option value="F">F</option>
	          <option value="X">X</option>
	        </select>
        	</td>
            <td>60-72月 </td>
            <td><input type="text" name="gz[]"></td>
          </tr>
        </table><br/>

      		<h4 class="text-danger">备注：<br/>
				★——代表观察项目<br/>
				▲ ——代表直接观察或是直接评估项目<br/>
				●——代表同时考察儿童模仿能力的项目<br/>
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
		$.post(url,postData,function(result){
			if(result ==''){return;}
			$('.save').show();
			 $('.save').html('数据自动保存成功~~');
		        setTimeout(function() {$('.save').hide();}, 2000);
		        return;
		});
	},60000); //每隔一分钟保存一次
</script>
</body>
</html>