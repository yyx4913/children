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
			<form id="myForm" action="/index.php/Record/scale_info" method="post">
			<input type="hidden" name="kind_id" value="<?php echo ($kind_id); ?>"><input type="hidden" name="a_id" value="<?php echo ($a_id); ?>">
			<table border="1" style="width:100%;text-align:center;font-size:0.8em; margin-top:-3em;">
				<tr><th>代号</th><th colspan="2">评估范围</th><th>评估项目</th><th>评估记录</th><th>参考年龄</th><th>备注</th></tr>
                    <tr>
                      <td>1</td>
                      <td colspan="2" rowspan="8">经验与表征</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[0]["material"]); ?>&#13;评估方法：<?php echo ($res2[0]["way"]); ?>&#13;评估标准：<?php echo ($res2[0]["norm"]); ?>">按照指令交出物件</a></span></td>
                      <td>
                      <select name="g[]">
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>12-24月</td>
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[1]["material"]); ?>&#13;评估方法：<?php echo ($res2[1]["way"]); ?>&#13;评估标准：<?php echo ($res2[1]["norm"]); ?>">在口头命令下，指出自己的身体部位</a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]">
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>24-36月</td>
                      <td><input type="text" name="gz[]"></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[2]["material"]); ?>&#13;评估方法：<?php echo ($res2[2]["way"]); ?>&#13;评估标准：<?php echo ($res2[2]["norm"]); ?>">指出玩具动物的身体部位 </a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]" >
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>24-36月</td>
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[3]["material"]); ?>&#13;评估方法：<?php echo ($res2[3]["way"]); ?>&#13;评估标准：<?php echo ($res2[3]["norm"]); ?>">示范使用物品</a></span></td>
                      
                      
                      <td>
                      
                      <select name=g[]" >
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>24-36月</td>
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[4]["material"]); ?>&#13;评估方法：<?php echo ($res2[4]["way"]); ?>&#13;评估标准：<?php echo ($res2[4]["norm"]); ?>">辨认图片</a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]" >
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>36-48月</td>
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[5]["material"]); ?>&#13;评估方法：<?php echo ($res2[5]["way"]); ?>&#13;评估标准：<?php echo ($res2[5]["norm"]); ?>">指认男孩和女孩</a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]" >
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>36-48月</td>
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[6]["material"]); ?>&#13;评估方法：<?php echo ($res2[6]["way"]); ?>&#13;评估标准：<?php echo ($res2[6]["norm"]); ?>">说出图片中东西遗漏的部分</a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]" >
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>48-60月</td>
                      <td><input type="text" name="gz[]"></td>
                    </tr>
                    <tr>
                      <td>8</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[7]["material"]); ?>&#13;评估方法：<?php echo ($res2[7]["way"]); ?>&#13;评估标准：<?php echo ($res2[7]["norm"]); ?>">说出图片名称</a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]">
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>48-60月</td>
                      <td><input type="text" name="gz[]"></td>
                    </tr>
                    <tr>
                      <td>9</td>
                      <td rowspan="10">因果关系 </td>
                      <td rowspan="3">简单推理 </td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[8]["material"]); ?>&#13;评估方法：<?php echo ($res2[8]["way"]); ?>&#13;评估标准：<?php echo ($res2[8]["norm"]); ?>">知道动作引起的直接后果 </a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]" >
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>7-14月 </td>
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr>
                      <td>10</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[9]["material"]); ?>&#13;评估方法：<?php echo ($res2[9]["way"]); ?>&#13;评估标准：<?php echo ($res2[9]["norm"]); ?>">明白物品间的关系 </a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]" >
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>12-24月 </td>
                      <td><input type="text" name="gz[]"></td>
                    </tr>
                    <tr>
                      <td>11</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[10]["material"]); ?>&#13;评估方法：<?php echo ($res2[10]["way"]); ?>&#13;评估标准：<?php echo ($res2[10]["norm"]); ?>">示意求助 </a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]" >
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>24-36月 </td>
                      <td><input type="text" name="gz[]"></td>
                    </tr>
                    <tr>
                      <td>12</td>
                      <td rowspan="3">分类 </td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[11]["material"]); ?>&#13;评估方法：<?php echo ($res2[11]["way"]); ?>&#13;评估标准：<?php echo ($res2[11]["norm"]); ?>">物品图片分类（功能分类）</a> </span></td>
                      
                      
                      <td>
                      
                      <select name="g[]">
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>48-60月</td>
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr>
                      <td>13</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[12]["material"]); ?>&#13;评估方法：<?php echo ($res2[12]["way"]); ?>&#13;评估标准：<?php echo ($res2[12]["norm"]); ?>">完成简单拼图</a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]">
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>60-72月</td>
                      <td><input type="text" name="gz[]"></td>
                    </tr>
                    <tr>
                      <td>14</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[13]["material"]); ?>&#13;评估方法：<?php echo ($res2[13]["way"]); ?>&#13;评估标准：<?php echo ($res2[13]["norm"]); ?>">物品图片分类（概念分类）</a> </span></td>
                      
                      
                      <td>
                      
                      <select name="g[]" >
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>60-72月</td>
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr>
                      <td>15</td>
                      <td rowspan="2">配对</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[14]["material"]); ?>&#13;评估方法：<?php echo ($res2[14]["way"]); ?>&#13;评估标准：<?php echo ($res2[14]["norm"]); ?>">实物配对</a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]">
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>18-24月</td>
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr>
                      <td>16</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[15]["material"]); ?>&#13;评估方法：<?php echo ($res2[15]["way"]); ?>&#13;评估标准：<?php echo ($res2[15]["norm"]); ?>">两种质地物品配对</a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]" >
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>24-36月</td>
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr>
                      <td>17</td>
                      <td rowspan="2">排序 </td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[16]["material"]); ?>&#13;评估方法：<?php echo ($res2[16]["way"]); ?>&#13;评估标准：<?php echo ($res2[16]["norm"]); ?>">指出第一、第二和最尾的位置</a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]" >
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>48-60月</td>
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr>
                      <td>18</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[17]["material"]); ?>&#13;评估方法：<?php echo ($res2[17]["way"]); ?>&#13;评估标准：<?php echo ($res2[17]["norm"]); ?>">依长短排列小木棍</a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]">
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>48-60月</td>
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                   
                      <tr>
                        <td>19</td>
                        <td rowspan="37">概念</td>
                        <td rowspan="4">时间概念</td>
                        <td><span><a href="" title="评估材料：<?php echo ($res2[18]["material"]); ?>&#13;评估方法：<?php echo ($res2[18]["way"]); ?>&#13;评估标准：<?php echo ($res2[18]["norm"]); ?>">说出一周包含哪些天 </a></span></td>              
                        <td>
                      
                      <select name="g[]">
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                        <td>60-72月 </td>
                        <td><input type="text" name="gz[]" ></td>
                      </tr>
                      <tr>
                        <td>20</td>
                        <td><span><a href="" title="评估材料：<?php echo ($res2[19]["material"]); ?>&#13;评估方法：<?php echo ($res2[19]["way"]); ?>&#13;评估标准：<?php echo ($res2[19]["norm"]); ?>">能分辨图片中的时间（早上、晚上）</a> </span></td>
                        
                        
                        <td>
                      
                      <select name="g[]" >
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                        <td>60-72月</td>
                        <td><input type="text" name="gz[]"></td>
                      </tr>
                      <tr>
                        <td>21</td>
                        <td><span><a href="" title="评估材料：<?php echo ($res2[20]["material"]); ?>&#13;评估方法：<?php echo ($res2[20]["way"]); ?>&#13;评估标准：<?php echo ($res2[20]["norm"]); ?>">说出四季名称 </a></span></td>
                        
                        
                        <td>
                      
                      <select name="g[]">
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                        <td>60-72月 </td>
                        <td><input type="text" name="gz[]"></td>
                      </tr>
                      <tr>
                        <td>22</td>
                        <td><span><a href="" title="评估材料：<?php echo ($res2[21]["material"]); ?>&#13;评估方法：<?php echo ($res2[21]["way"]); ?>&#13;评估标准：<?php echo ($res2[21]["norm"]); ?>">回答简单钟面问题</a></span></td>
                        
                        
                        <td>
                        
                        <select name="g[]">
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                        <td>60-72月</td>
                        <td><input type="text" name="gz[]" ></td>
                      </tr>
                      <tr>
                        <td>23</td>
                        <td rowspan="9">空间概念 </td>
                        <td><span><a href="" title="评估材料：<?php echo ($res2[22]["material"]); ?>&#13;评估方法：<?php echo ($res2[22]["way"]); ?>&#13;评估标准：<?php echo ($res2[22]["norm"]); ?>">掀开盖着自己脸的毛巾</a></span></td>
                        
                        
                        <td>
                        
                        <select name="g[]" >
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                        <td>6-12月</td>
                        <td><input type="text" name="gz[]"></td>
                      </tr>
                      <tr>
                        <td>24</td>
                        <td><span><a href="" title="评估材料：<?php echo ($res2[23]["material"]); ?>&#13;评估方法：<?php echo ($res2[23]["way"]); ?>&#13;评估标准：<?php echo ($res2[23]["norm"]); ?>">模仿将物件放进容器</a></span></td>
                        
                        
                        <td>
                        
                        <select name="g[]" >
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                        <td>10-16月</td>
                        <td><input type="text" name="gz[]"></td>
                      </tr>
                      <tr>
                        <td>25</td>
                        <td><span><a href="" title="评估材料：<?php echo ($res2[24]["material"]); ?>&#13;评估方法：<?php echo ($res2[24]["way"]); ?>&#13;评估标准：<?php echo ($res2[24]["norm"]); ?>">找寻隐藏的物体</a></span></td>
                        
                        
                        <td>
                        
                        <select name="g[]">
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                        <td>10-16月</td>
                        <td><input type="text" name="gz[]" ></td>
                      </tr>
                      <tr>
                        <td>26</td>
                        <td><span><a href="" title="评估材料：<?php echo ($res2[25]["material"]); ?>&#13;评估方法：<?php echo ($res2[25]["way"]); ?>&#13;评估标准：<?php echo ($res2[25]["norm"]); ?>">伸手抓握视线内的物体</a></span></td>
                        
                        
                        <td>
                        
                        <select name="g[]">
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                        <td>6-18月</td>
                        <td><input type="text" name="gz[]" ></td>
                      </tr>
                      <tr>
                        <td>27</td>
                        <td><span><a href="" title="评估材料：<?php echo ($res2[26]["material"]); ?>&#13;评估方法：<?php echo ($res2[26]["way"]); ?>&#13;评估标准：<?php echo ($res2[26]["norm"]); ?>">从容器中取出物品</a></span></td>
                        
                        
                        <td>
                        
                        <select name="g[]" >
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                        <td>12-24月</td>
                        <td><input type="text" name="gz[]" ></td>
                      </tr>
                      <tr>
                        <td>28</td>
                        <td><span><a href="" title="评估材料：<?php echo ($res2[27]["material"]); ?>&#13;评估方法：<?php echo ($res2[27]["way"]); ?>&#13;评估标准：<?php echo ($res2[27]["norm"]); ?>">知道物品的固有摆放方式</a> </span></td>
                        
                        
                        <td>
                        
                        <select name="g[]" >
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                        <td>12-24月</td>
                        <td><input type="text" name="gz[]" ></td>
                      </tr>
                      <tr>
                        <td>29</td>
                        <td><span><a href="" title="评估材料：<?php echo ($res2[28]["material"]); ?>&#13;评估方法：<?php echo ($res2[28]["way"]); ?>&#13;评估标准：<?php echo ($res2[28]["norm"]); ?>">按要求放置物品（上面、下面）</a></span></td>
                        
                        
                        <td>
                        
                        <select name="g[]" >
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                        <td>24-36月</td>
                        <td><input type="text" name="gz[]" ></td>
                      </tr>
                      <tr>
                        <td>30</td>
                        <td><span><a href="" title="评估材料：<?php echo ($res2[29]["material"]); ?>&#13;评估方法：<?php echo ($res2[29]["way"]); ?>&#13;评估标准：<?php echo ($res2[29]["norm"]); ?>">按要求摆放物品（里、外）</a></span></td>
                        
                        
                        <td>
                        
                        <select name="g[]" >
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                        <td>36-48月</td>
                        <td><input type="text" name="gz[]" ></td>
                      </tr>
                      <tr>
                        <td>31</td>
                        <td><span><a href="" title="评估材料：<?php echo ($res2[30]["material"]); ?>&#13;评估方法：<?php echo ($res2[30]["way"]); ?>&#13;评估标准：<?php echo ($res2[30]["norm"]); ?>">按要求取物品（前面、后面）</a> </span></td>
                        
                        
                        <td>
                        
                        <select name="g[]">
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                        <td>48-60月</td>
                        <td><input type="text" name="gz[]" ></td>
                      </tr>
                      <tr>
                        <td>32</td>
                        <td rowspan="5">颜色概念</td>
                        <td><span><a href="" title="评估材料：<?php echo ($res2[31]["material"]); ?>&#13;评估方法：<?php echo ($res2[31]["way"]); ?>&#13;评估标准：<?php echo ($res2[31]["norm"]); ?>">配对红、绿颜色（外形相同） </a></span></td>
                        
                        
                        <td>
                        
                        <select name="g[]" >
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                        <td>24-36月</td>
                        <td><input type="text" name="gz[]" ></td>
                      </tr>
                      <tr>
                        <td>33</td>
                        <td><span><a href="" title="评估材料：<?php echo ($res2[32]["material"]); ?>&#13;评估方法：<?php echo ($res2[32]["way"]); ?>&#13;评估标准：<?php echo ($res2[32]["norm"]); ?>">配对黄、蓝颜色（外形、大小不一）</a></span></td>
                        
                        
                        <td>
                        
                        <select name="g[]">
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                        <td>24-36月</td>
                        <td><input type="text" name="gz[]" ></td>
                      </tr>
                      <tr>
                        <td>34</td>
                        <td><span><a href="" title="评估材料：<?php echo ($res2[33]["material"]); ?>&#13;评估方法：<?php echo ($res2[33]["way"]); ?>&#13;评估标准：<?php echo ($res2[33]["norm"]); ?>">基本颜色分类</a></span></td>
                        
                        
                        <td>
                        
                        <select name="g[]" >
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                        <td>36-48月</td>
                        <td><input type="text" name="gz[]" ></td>
                      </tr>
                      <tr>
                        <td>35</td>
                        <td><span><a href="" title="评估材料：<?php echo ($res2[34]["material"]); ?>&#13;评估方法：<?php echo ($res2[34]["way"]); ?>&#13;评估标准：<?php echo ($res2[34]["norm"]); ?>">说出颜色名称</a></span></td>
                        
                        
                        <td>
                        
                        <select name="g[]" >
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                        <td>36-48月</td>
                        <td><input type="text" name="gz[]" ></td>
                      </tr>
                      <tr>
                        <td>36</td>
                        <td><span><a href="" title="评估材料：<?php echo ($res2[35]["material"]); ?>&#13;评估方法：<?php echo ($res2[35]["way"]); ?>&#13;评估标准：<?php echo ($res2[35]["norm"]); ?>">说出常见物体的颜色 </a></span> </td>
                        
                        
                        <td>
                        
                        <select name="g[]" >
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                        <td>48-60月</td>
                        <td><input type="text" name="gz[]" ></td>
                      </tr>
                      <tr>
                        <td>37</td>
                        <td rowspan="4">形状概念</td>
                        <td><span><a href="" title="评估材料：<?php echo ($res2[36]["material"]); ?>&#13;评估方法：<?php echo ($res2[36]["way"]); ?>&#13;评估标准：<?php echo ($res2[36]["norm"]); ?>">配对三种基本形状</a></span></td>
                        
                        
                        <td>
                        
                        <select name="g[]" >
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                        <td>24-36月</td>
                        <td><input type="text" name="gz[]" ></td>
                      </tr>
                      <tr>
                        <td>38</td>
                        <td><span><a href="" title="评估材料：<?php echo ($res2[37]["material"]); ?>&#13;评估方法：<?php echo ($res2[37]["way"]); ?>&#13;评估标准：<?php echo ($res2[37]["norm"]); ?>">基本形状分类</a></span></td>
                        
                        
                        <td>
                        
                        <select name="g[]">
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                        <td>36-48月</td>
                        <td><input type="text" name="gz[]" ></td>
                      </tr>
                      <tr>
                        <td>39</td>
                        <td><span><a href="" title="评估材料：<?php echo ($res2[38]["material"]); ?>&#13;评估方法：<?php echo ($res2[38]["way"]); ?>&#13;评估标准：<?php echo ($res2[38]["norm"]); ?>">说出形状名称</a></span></td> 
                        <td>
                        
                        <select name="g[]" >
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                        <td>48-60月</td>
                        <td><input type="text" name="gz[]" ></td>
                      </tr>
                      <tr>
                        <td>40</td>
                        <td><span><a href="" title="评估材料：<?php echo ($res2[39]["material"]); ?>&#13;评估方法：<?php echo ($res2[39]["way"]); ?>&#13;评估标准：<?php echo ($res2[39]["norm"]); ?>">按要求自行画出常见形状 </a></span></td>
                        
                        
                        <td>
                        
                        <select name="g[]">
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                        <td>60-72月</td>
                        <td><input type="text" name="gz[]" ></td>
                      </tr>
                      <tr>
                        <td>41</td>
                        <td rowspan="6">数前概念 </td>
                        <td><span><a href="" title="评估材料：<?php echo ($res2[40]["material"]); ?>&#13;评估方法：<?php echo ($res2[40]["way"]); ?>&#13;评估标准：<?php echo ($res2[40]["norm"]); ?>">依要求指出大小</a></span></td>
                        
                        
                        <td>
                        
                        <select name="g[]">
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                        <td>36-48月</td>
                        <td><input type="text" name="gz[]" ></td>
                      </tr>
                      <tr>
                        <td>42</td>
                        <td><span><a href="" title="评估材料：<?php echo ($res2[41]["material"]); ?>&#13;评估方法：<?php echo ($res2[41]["way"]); ?>&#13;评估标准：<?php echo ($res2[41]["norm"]); ?>">指出多少</a></span></td>
                        
                        
                        <td>
                        
                        <select name="g[]" >
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                        <td>36-48月</td>
                        <td><input type="text" name="gz[]"></td>
                      </tr>
                      <tr>
                        <td>43</td>
                        <td><span><a href="" title="评估材料：<?php echo ($res2[42]["material"]); ?>&#13;评估方法：<?php echo ($res2[42]["way"]); ?>&#13;评估标准：<?php echo ($res2[42]["norm"]); ?>">指认长短</a></span></td>
                        
                        
                        <td>
                        
                        <select name="g[]">
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                        <td>36-48月</td>
                        <td><input type="text" name="gz[]" ></td>
                      </tr>
                      <tr>
                        <td>44</td>
                        <td><span><a href="" title="评估材料：<?php echo ($res2[43]["material"]); ?>&#13;评估方法：<?php echo ($res2[43]["way"]); ?>&#13;评估标准：<?php echo ($res2[43]["norm"]); ?>">说出物件大小</a></span></td>
                        
                        
                        <td>
                        
                        <select name="g[]">
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                        <td>36-48月 </td>
                        <td><input type="text" name="gz[]"></td>
                      </tr>
                     <tr>
                       <td>45</td>
                       
                       <td><span><a href="" title="评估材料：<?php echo ($res2[44]["material"]); ?>&#13;评估方法：<?php echo ($res2[44]["way"]); ?>&#13;评估标准：<?php echo ($res2[44]["norm"]); ?>">区别物体的轻重</a> </span></td>
                       
                       
                       <td>
                        
                        <select name="g[]">
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                       <td>48-60月 </td>
                       <td><input type="text" name="gz[]" ></td>
                     </tr>
                     <tr>
                       <td>46</td>
                       <td><span><a href="" title="评估材料：<?php echo ($res2[45]["material"]); ?>&#13;评估方法：<?php echo ($res2[45]["way"]); ?>&#13;评估标准：<?php echo ($res2[45]["norm"]); ?>">辨认一半和整个的东西 </a></span></td>
                       
                       
                       <td>
                        
                        <select name="g[]">
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                       <td>60-72月 </td>
                       <td><input type="text" name="gz[]" ></td>
                     </tr>
                     <tr>
                       <td>47</td>
                       <td rowspan="9">数概念 </td>
                       <td><span><a href="" title="评估材料：<?php echo ($res2[46]["material"]); ?>&#13;评估方法：<?php echo ($res2[46]["way"]); ?>&#13;评估标准：<?php echo ($res2[46]["norm"]); ?>">重复2-3个数字 </a></span></td>
                       
                       
                       <td>
                        
                        <select name="g[]">
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                       <td>24-36月 </td>
                       <td><input type="text" name="gz[]"></td>
                     </tr>
                     <tr>
                       <td>48</td>
                       <td><span><a href="" title="评估材料：<?php echo ($res2[47]["material"]); ?>&#13;评估方法：<?php echo ($res2[47]["way"]); ?>&#13;评估标准：<?php echo ($res2[47]["norm"]); ?>">按指示拿一定数目（1—5个）的物品</a></span></td>
                       
                       
                       <td>
                        
                        <select name="g[]" >
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                       <td>48-60月 </td>
                       <td><input type="text" name="gz[]"></td>
                     </tr>
                     <tr>
                       <td>49</td>
                       <td><span><a href="" title="评估材料：<?php echo ($res2[48]["material"]); ?>&#13;评估方法：<?php echo ($res2[48]["way"]); ?>&#13;评估标准：<?php echo ($res2[48]["norm"]); ?>">数出2块及7块积木</a> </span></td>
                       
                       
                       <td>
                        
                        <select name="g[]">
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                       <td>48-60月 </td>
                       <td><input type="text" name="gz[]"></td>
                     </tr>
                     <tr>
                       <td>50</td>
                       <td><span><a href="" title="评估材料：<?php echo ($res2[49]["material"]); ?>&#13;评估方法：<?php echo ($res2[49]["way"]); ?>&#13;评估标准：<?php echo ($res2[49]["norm"]); ?>">唱数 </a></span></td>
                       
                       
                       <td>
                        
                        <select name="g[]">
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                       <td>48-60月 </td>
                       <td><input type="text" name="gz[]"></td>
                     </tr>
                     <tr>
                       <td>51</td>
                       <td><span><a href="" title="评估材料：<?php echo ($res2[50]["material"]); ?>&#13;评估方法：<?php echo ($res2[50]["way"]); ?>&#13;评估标准：<?php echo ($res2[50]["norm"]); ?>">交出2块及6块积木 </a></span></td>
                       
                       
                       <td>
                        
                        <select name="g[]">
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                       <td>60-72月 </td>
                       <td><input type="text" name="gz[]"></td>
                     </tr>
                     <tr>
                       <td>52</td>
                       <td><span><a href="" title="评估材料：<?php echo ($res2[51]["material"]); ?>&#13;评估方法：<?php echo ($res2[51]["way"]); ?>&#13;评估标准：<?php echo ($res2[51]["norm"]); ?>">认读数字（1-10）</a> </span></td>
                       
                       
                       <td>
                        
                        <select name="g[]">
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                       <td>60-72月 </td>
                       <td><input type="text" name="gz[]"></td>
                     </tr>
                     <tr>
                       <td>53</td>
                       <td><span><a href="" title="评估材料：<?php echo ($res2[52]["material"]); ?>&#13;评估方法：<?php echo ($res2[52]["way"]); ?>&#13;评估标准：<?php echo ($res2[52]["norm"]); ?>">重复4-5个数字 </a></span></td>
                       
                       
                       <td>
                        
                        <select name="g[]" >
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                       <td>60-72月 </td>
                       <td><input type="text" name="gz[]" ></td>
                     </tr>
                     <tr>
                       <td>54</td>
                       <td><span><a href="" title="评估材料：<?php echo ($res2[53]["material"]); ?>&#13;评估方法：<?php echo ($res2[53]["way"]); ?>&#13;评估标准：<?php echo ($res2[53]["norm"]); ?>">简单加法运算 </a></span></td>
                       
                       
                       <td>
                        
                        <select name="g[]" >
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                       <td>60-72月 </td>
                       <td><input type="text" name="gz[]"></td>
                     </tr>
                     <tr>
                       <td>55</td>
                       <td><span><a href="" title="评估材料：<?php echo ($res2[54]["material"]); ?>&#13;评估方法：<?php echo ($res2[54]["way"]); ?>&#13;评估标准：<?php echo ($res2[54]["norm"]); ?>">简单减法运算 </a></span></td>
                       <td>
                        
                        <select name="g[]">
                          <option value="">--</option>
                          <option>P</option>
                          <option>E</option>
                          <option>F</option>
                          <option>X</option>
                        </select>
                        </td>
                       <td>60-72月 </td>
                       <td><input type="text" name="gz[]" ></td>
                     </tr>
                   </table><br/>
                     
   <h4 class="text-danger">备注：<br/>
				★——代表观察项目<br/>
				▲ ——代表直接观察或是直接评估项目<br/>
				项目号前面没有任何标注的为直接评估项目<br/>
			</h4>
			<center class="noprint"><input name="save" type="submit" value="保&nbsp;&nbsp;存" class="btn btn-info btn-lg" >&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="submit" type="submit" value="完成评估" class="btn btn-primary btn-lg" ></center>
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