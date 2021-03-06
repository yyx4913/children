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
                    <tr >
                      <td>★1</td>
                      <td rowspan="15">进食 </td>
                      <td>吸吮 </td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[0]["material"]); ?>&#13;评估方法：<?php echo ($res2[0]["way"]); ?>&#13;评估标准：<?php echo ($res2[0]["norm"]); ?>">吸吮奶瓶内的液体 </a></span></td>
                      <td>
                      
                      <select name="g[]" >
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>0-6月 </td>
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>▲2</td>
                      <td>合唇 </td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[1]["material"]); ?>&#13;评估方法：<?php echo ($res2[1]["way"]); ?>&#13;评估标准：<?php echo ($res2[1]["norm"]); ?>">吃汤匙里的食物 </a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]" >
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>0-6月 </td>
                      <td><input type="text" name="gz[]"></td>
                    </tr>
                    <tr >
                      <td>▲3</td>
                      <td rowspan="3">喝 </td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[2]["material"]); ?>&#13;评估方法：<?php echo ($res2[2]["way"]); ?>&#13;评估标准：<?php echo ($res2[2]["norm"]); ?>">喝汤匙里的水或饮料 </a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]">
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>6-12月 </td>
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>▲4</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[3]["material"]); ?>&#13;评估方法：<?php echo ($res2[3]["way"]); ?>&#13;评估标准：<?php echo ($res2[3]["norm"]); ?>">用吸管喝饮料 </a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]">
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>12-24月 </td>
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>▲5</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[4]["material"]); ?>&#13;评估方法：<?php echo ($res2[4]["way"]); ?>&#13;评估标准：<?php echo ($res2[4]["norm"]); ?>">自己用杯子喝水 </a></span></td>
                      
                      
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
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>6</td>
                      <td rowspan="2">咀嚼 </td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[5]["material"]); ?>&#13;评估方法：<?php echo ($res2[5]["way"]); ?>&#13;评估标准：<?php echo ($res2[5]["norm"]); ?>">咀嚼软的固体食物 </a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]" >
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>16-21月 </td>
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>7</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[6]["material"]); ?>&#13;评估方法：<?php echo ($res2[6]["way"]); ?>&#13;评估标准：<?php echo ($res2[6]["norm"]); ?>">咀嚼硬的固体食物 </a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]">
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>16-21月 </td>
                      <td><input type="text" name="gz[]"></td>
                    </tr>
                    <tr >
                      <td>★8</td>
                      <td rowspan="8">进食 <br />
                        方式 </td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[7]["material"]); ?>&#13;评估方法：<?php echo ($res2[7]["way"]); ?>&#13;评估标准：<?php echo ($res2[7]["norm"]); ?>">用手指把食物放进口中 </a></span></td>
                      
                      
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
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>▲9</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[8]["material"]); ?>&#13;评估方法：<?php echo ($res2[8]["way"]); ?>&#13;评估标准：<?php echo ($res2[8]["norm"]); ?>">用汤匙进食 </a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]">
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>25-30月 </td>
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>▲10</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[9]["material"]); ?>&#13;评估方法：<?php echo ($res2[9]["way"]); ?>&#13;评估标准：<?php echo ($res2[9]["norm"]); ?>">用叉子取食物 </a></span></td>
                      
                      
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
                    <tr >
                      <td>▲11</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[10]["material"]); ?>&#13;评估方法：<?php echo ($res2[10]["way"]); ?>&#13;评估标准：<?php echo ($res2[10]["norm"]); ?>">把食物扒入口中 </a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]" >
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>36-48月 </td>
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>▲12</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[11]["material"]); ?>&#13;评估方法：<?php echo ($res2[11]["way"]); ?>&#13;评估标准：<?php echo ($res2[11]["norm"]); ?>">用刀切软的食物 </a></span></td>
                      
                      
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
                    <tr >
                      <td>▲13</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[12]["material"]); ?>&#13;评估方法：<?php echo ($res2[12]["way"]); ?>&#13;评估标准：<?php echo ($res2[12]["norm"]); ?>">将饮料从小水壶里倒出来 </a></span></td>
                      
                      
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
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>▲14</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[13]["material"]); ?>&#13;评估方法：<?php echo ($res2[13]["way"]); ?>&#13;评估标准：<?php echo ($res2[13]["norm"]); ?>">用筷子夹食物 </a></span></td>
                      
                      
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
                    <tr >
                      <td>15</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[14]["material"]); ?>&#13;评估方法：<?php echo ($res2[14]["way"]); ?>&#13;评估标准：<?php echo ($res2[14]["norm"]); ?>">撕开食物的包装袋 </a></span></td>
                      
                      
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
                    <tr >
                      <td>★16</td>
                      <td rowspan="10">如厕 </td>
                      <td rowspan="3">表示如厕需要 </td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[15]["material"]); ?>&#13;评估方法：<?php echo ($res2[15]["way"]); ?>&#13;评估标准：<?php echo ($res2[15]["norm"]); ?>">如厕前以手势、沟通图或声音表示如厕需要 </a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]">
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>12-24月 </td>
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>★17</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[16]["material"]); ?>&#13;评估方法：<?php echo ($res2[16]["way"]); ?>&#13;评估标准：<?php echo ($res2[16]["norm"]); ?>">主动说出如厕的需要 </a></span></td>
                      
                      
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
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>★18</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[17]["material"]); ?>&#13;评估方法：<?php echo ($res2[17]["way"]); ?>&#13;评估标准：<?php echo ($res2[17]["norm"]); ?>">主动到厕所里排尿、排便 </a></span></td>
                      
                      
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
                    <tr >
                      <td>★19</td>
                      <td rowspan="7">如厕 <br />
                        技能 </td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[18]["material"]); ?>&#13;评估方法：<?php echo ($res2[18]["way"]); ?>&#13;评估标准：<?php echo ($res2[18]["norm"]); ?>">坐便盆如厕 </a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]">
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>16-18月 </td>
                      <td><input type="text" name="gz[]"></td>
                    </tr>
                    <tr >
                      <td>★20</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[19]["material"]); ?>&#13;评估方法：<?php echo ($res2[19]["way"]); ?>&#13;评估标准：<?php echo ($res2[19]["norm"]); ?>">如厕前自己拉下裤子及内裤 </a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]">
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>24-30月 </td>
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>★21</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[20]["material"]); ?>&#13;评估方法：<?php echo ($res2[20]["way"]); ?>&#13;评估标准：<?php echo ($res2[20]["norm"]); ?>">如厕后自己拉上裤子及内裤 </a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]">
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>30-36月 </td>
                      <td><input type="text" name="gz[]"></td>
                    </tr>
                    <tr >
                      <td>★22</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[21]["material"]); ?>&#13;评估方法：<?php echo ($res2[21]["way"]); ?>&#13;评估标准：<?php echo ($res2[21]["norm"]); ?>">如厕后自己洗手 </a></span></td>
                      
                      
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
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>★23</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[22]["material"]); ?>&#13;评估方法：<?php echo ($res2[22]["way"]); ?>&#13;评估标准：<?php echo ($res2[22]["norm"]); ?>">分辨男女厕所的符号</a> </span></td>
                      
                      
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
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>★24</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[23]["material"]); ?>&#13;评估方法：<?php echo ($res2[23]["way"]); ?>&#13;评估标准：<?php echo ($res2[23]["norm"]); ?>">大便后，撕下所需的卷装厕纸，折叠好，准备清洁</a> </span></td>
                      
                      
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
                    <tr >
                      <td>★25</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[24]["material"]); ?>&#13;评估方法：<?php echo ($res2[24]["way"]); ?>&#13;评估标准：<?php echo ($res2[24]["norm"]); ?>">大便后用厕纸清洁干净</a> </span></td>
                      
                      
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
                    <tr >
                      <td>26</td>
                      <td rowspan="15">穿衣 </td>
                      <td rowspan="8">脱 </td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[25]["material"]); ?>&#13;评估方法：<?php echo ($res2[25]["way"]); ?>&#13;评估标准：<?php echo ($res2[25]["norm"]); ?>">将脱到脚掌部的袜子完全脱掉 </a></span></td>
                      
                      
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
                    <tr >
                      <td>27</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[26]["material"]); ?>&#13;评估方法：<?php echo ($res2[26]["way"]); ?>&#13;评估标准：<?php echo ($res2[26]["norm"]); ?>">推脱鞋子 </a></span></td>
                      
                      
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
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>▲28</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[27]["material"]); ?>&#13;评估方法：<?php echo ($res2[27]["way"]); ?>&#13;评估标准：<?php echo ($res2[27]["norm"]); ?>">脱拉袜子 </a></span></td>
                      
                      
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
                    <tr >
                      <td>▲29</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[28]["material"]); ?>&#13;评估方法：<?php echo ($res2[28]["way"]); ?>&#13;评估标准：<?php echo ($res2[28]["norm"]); ?>">脱下长裤 </a></span></td>
                      
                      
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
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>▲30</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[29]["material"]); ?>&#13;评估方法：<?php echo ($res2[29]["way"]); ?>&#13;评估标准：<?php echo ($res2[29]["norm"]); ?>">脱外套或衬衫 </a></span></td>
                      
                      
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
                    <tr >
                      <td>31</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[30]["material"]); ?>&#13;评估方法：<?php echo ($res2[30]["way"]); ?>&#13;评估标准：<?php echo ($res2[30]["norm"]); ?>">拉开拉链</a> </span></td>
                      
                      
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
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>32</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[31]["material"]); ?>&#13;评估方法：<?php echo ($res2[31]["way"]); ?>&#13;评估标准：<?php echo ($res2[31]["norm"]); ?>">解开大纽扣 </a></span></td>
                      
                      
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
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>▲33</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[32]["material"]); ?>&#13;评估方法：<?php echo ($res2[32]["way"]); ?>&#13;评估标准：<?php echo ($res2[32]["norm"]); ?>">脱T-恤 </a></span></td>
                      
                      
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
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>▲34</td>
                      <td rowspan="7">穿 </td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[33]["material"]); ?>&#13;评估方法：<?php echo ($res2[33]["way"]); ?>&#13;评估标准：<?php echo ($res2[33]["norm"]); ?>">穿鞋子 </a></span></td>
                      
                      
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
                    <tr >
                      <td>35</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[34]["material"]); ?>&#13;评估方法：<?php echo ($res2[34]["way"]); ?>&#13;评估标准：<?php echo ($res2[34]["norm"]); ?>">穿长裤 </a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]" >
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>36-48月 </td>
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>36</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[35]["material"]); ?>&#13;评估方法：<?php echo ($res2[35]["way"]); ?>&#13;评估标准：<?php echo ($res2[35]["norm"]); ?>">穿外套或衬衫 </a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]" >
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>36-48月 </td>
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>37</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[36]["material"]); ?>&#13;评估方法：<?php echo ($res2[36]["way"]); ?>&#13;评估标准：<?php echo ($res2[36]["norm"]); ?>">扣合大纽扣 </a></span></td>
                      
                      
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
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>38</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[37]["material"]); ?>&#13;评估方法：<?php echo ($res2[37]["way"]); ?>&#13;评估标准：<?php echo ($res2[37]["norm"]); ?>">穿T-恤 </a></span></td>
                      
                      
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
                    <tr >
                      <td>39</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[38]["material"]); ?>&#13;评估方法：<?php echo ($res2[38]["way"]); ?>&#13;评估标准：<?php echo ($res2[38]["norm"]); ?>">穿有脚后跟的袜子 </a></span></td>
                      
                      
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
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>▲40</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[39]["material"]); ?>&#13;评估方法：<?php echo ($res2[39]["way"]); ?>&#13;评估标准：<?php echo ($res2[39]["norm"]); ?>">拉合拉链 </a></span></td>
                      
                      
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
                    <tr >
                      <td>★41</td>
                      <td rowspan="13">梳洗 </td>
                      <td rowspan="4">擦 </td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[40]["material"]); ?>&#13;评估方法：<?php echo ($res2[40]["way"]); ?>&#13;评估标准：<?php echo ($res2[40]["norm"]); ?>">用毛巾擦嘴 </a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]">
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
                    <tr >
                      <td>★42</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[41]["material"]); ?>&#13;评估方法：<?php echo ($res2[41]["way"]); ?>&#13;评估标准：<?php echo ($res2[41]["norm"]); ?>">用毛巾擦手 </a></span></td>
                      
                      
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
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>★43</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[42]["material"]); ?>&#13;评估方法：<?php echo ($res2[42]["way"]); ?>&#13;评估标准：<?php echo ($res2[42]["norm"]); ?>">洗手会擦干 </a></span></td>
                      
                      
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
                    <tr >
                      <td>44</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[43]["material"]); ?>&#13;评估方法：<?php echo ($res2[43]["way"]); ?>&#13;评估标准：<?php echo ($res2[43]["norm"]); ?>">用毛巾仔细擦脸 </a></span></td>
                      
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
                    <tr >
                      <td>45</td>
                      <td rowspan="3">刷 </td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[44]["material"]); ?>&#13;评估方法：<?php echo ($res2[44]["way"]); ?>&#13;评估标准：<?php echo ($res2[44]["norm"]); ?>">用牙刷粗略的刷牙 </a></span></td>
                      
                      
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
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>46</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[45]["material"]); ?>&#13;评估方法：<?php echo ($res2[45]["way"]); ?>&#13;评估标准：<?php echo ($res2[45]["norm"]); ?>">用清水漱口 </a></span></td>
                      
                      
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
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>47</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[46]["material"]); ?>&#13;评估方法：<?php echo ($res2[46]["way"]); ?>&#13;评估标准：<?php echo ($res2[46]["norm"]); ?>">用挤有牙膏的牙刷刷牙 </a></span></td>
                      
                      
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
                    <tr >
                      <td>★48</td>
                      <td rowspan="5">洗 </td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[47]["material"]); ?>&#13;评估方法：<?php echo ($res2[47]["way"]); ?>&#13;评估标准：<?php echo ($res2[47]["norm"]); ?>">用肥皂洗手 </a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]" >
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
                    <tr >
                      <td>★49</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[48]["material"]); ?>&#13;评估方法：<?php echo ($res2[48]["way"]); ?>&#13;评估标准：<?php echo ($res2[48]["norm"]); ?>">拧干湿毛巾 </a></span></td>
                      
                      
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
                    <tr >
                      <td>50</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[49]["material"]); ?>&#13;评估方法：<?php echo ($res2[49]["way"]); ?>&#13;评估标准：<?php echo ($res2[49]["norm"]); ?>">洗毛巾 </a></span></td>
                      
                      
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
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>★51</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[50]["material"]); ?>&#13;评估方法：<?php echo ($res2[50]["way"]); ?>&#13;评估标准：<?php echo ($res2[50]["norm"]); ?>">洗脸 </a></span></td>
                      
                      
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
                    <tr >
                      <td>★52</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[51]["material"]); ?>&#13;评估方法：<?php echo ($res2[51]["way"]); ?>&#13;评估标准：<?php echo ($res2[51]["norm"]); ?>">自己洗澡 </a></span></td>
                      
                      
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
                    <tr >
                      <td>★53</td>
                      <td>梳头发 </td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[52]["material"]); ?>&#13;评估方法：<?php echo ($res2[52]["way"]); ?>&#13;评估标准：<?php echo ($res2[52]["norm"]); ?>">自己用梳子将头发梳理整齐 </a></span></td>
                      
                      
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
                    <tr >
                      <td>★54</td>
                      <td colspan="2" rowspan="4">睡眠 </td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[53]["material"]); ?>&#13;评估方法：<?php echo ($res2[53]["way"]); ?>&#13;评估标准：<?php echo ($res2[53]["norm"]); ?>">睡觉规律 </a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]">
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>16-18月 </td>
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>★55</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[54]["material"]); ?>&#13;评估方法：<?php echo ($res2[54]["way"]); ?>&#13;评估标准：<?php echo ($res2[54]["norm"]); ?>">安静入睡</a> </span></td>
                      
                      
                      <td>
                      
                      <select name="g[]">
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>18-24月 </td>
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>★56</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[55]["material"]); ?>&#13;评估方法：<?php echo ($res2[55]["way"]); ?>&#13;评估标准：<?php echo ($res2[55]["norm"]); ?>">睡觉安稳 </a></span></td>
                      
                      
                      <td>
                      
                      <select name="g[]">
                        <option value="">--</option>
                        <option>P</option>
                        <option>E</option>
                        <option>F</option>
                        <option>X</option>
                      </select>
                      </td>
                      <td>21-24月 </td>
                      <td><input type="text" name="gz[]"></td>
                    </tr>
                    <tr >
                      <td>★57</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[56]["material"]); ?>&#13;评估方法：<?php echo ($res2[56]["way"]); ?>&#13;评估标准：<?php echo ($res2[56]["norm"]); ?>">睡觉不尿床 </a></span></td>
                      
                      
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
                    <tr >
                      <td>★58</td>
                      <td rowspan="10">其它日常自理能力（家居） </td>
                      <td rowspan="4">物品 <br />
                        归位 </td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[57]["material"]); ?>&#13;评估方法：<?php echo ($res2[57]["way"]); ?>&#13;评估标准：<?php echo ($res2[57]["norm"]); ?>">将自己的玩具放在固定位置 </a></span></td>
                      
                      
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
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>★59</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[58]["material"]); ?>&#13;评估方法：<?php echo ($res2[58]["way"]); ?>&#13;评估标准：<?php echo ($res2[58]["norm"]); ?>">将鞋、袜放在平时的指定位置 </a></span></td>
                      
                      
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
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>★60</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[59]["material"]); ?>&#13;评估方法：<?php echo ($res2[59]["way"]); ?>&#13;评估标准：<?php echo ($res2[59]["norm"]); ?>">将自己的物品挂在指定位置</a> </span></td>
                      
                      
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
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>★61</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[60]["material"]); ?>&#13;评估方法：<?php echo ($res2[60]["way"]); ?>&#13;评估标准：<?php echo ($res2[60]["norm"]); ?>">将外套挂在衣架上</a> </span></td>
                      
                      
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
                    <tr >
                      <td>★62</td>
                      <td rowspan="3">开关 </td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[61]["material"]); ?>&#13;评估方法：<?php echo ($res2[61]["way"]); ?>&#13;评估标准：<?php echo ($res2[61]["norm"]); ?>">将门关上 </a></span></td>
                      
                      
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
                    <tr >
                      <td>★63</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[62]["material"]); ?>&#13;评估方法：<?php echo ($res2[62]["way"]); ?>&#13;评估标准：<?php echo ($res2[62]["norm"]); ?>">开关电灯 </a></span></td>
                      
                      
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
                    <tr >
                      <td>★64</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[63]["material"]); ?>&#13;评估方法：<?php echo ($res2[63]["way"]); ?>&#13;评估标准：<?php echo ($res2[63]["norm"]); ?>">扭动门把手开门 </a></span></td>
                      
                      
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
                    <tr >
                      <td>★65</td>
                      <td rowspan="3">收拾 <br />
                        餐具 </td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[64]["material"]); ?>&#13;评估方法：<?php echo ($res2[64]["way"]); ?>&#13;评估标准：<?php echo ($res2[64]["norm"]); ?>">饭前摆放餐具</a> </span></td>
                      
                      
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
                      <td><input type="text" name="gz[]" ></td>
                    </tr>
                    <tr >
                      <td>★66</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[65]["material"]); ?>&#13;评估方法：<?php echo ($res2[65]["way"]); ?>&#13;评估标准：<?php echo ($res2[65]["norm"]); ?>">饭后收拾碗筷，将碗、碟分别放好 </a></span></td>
                      
                      
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
                    <tr >
                      <td>★67</td>
                      <td><span><a href="" title="评估材料：<?php echo ($res2[66]["material"]); ?>&#13;评估方法：<?php echo ($res2[66]["way"]); ?>&#13;评估标准：<?php echo ($res2[66]["norm"]); ?>">洗碗</a> </span></td>
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