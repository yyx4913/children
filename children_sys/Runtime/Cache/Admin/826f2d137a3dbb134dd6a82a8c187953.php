<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>菜单导航栏</title>
<!-- 加载Bootstrap样式表 -->
	<link href="/Public/css/bootstrap.min.css" rel="stylesheet">
	<link href="/Public/css/me.css" rel="stylesheet">
	<!-- 在引入bootstrap.min.js核心库之间加载jquery.min.js -->
	<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
</head>
<body style="padding:15px; background-color:#F7F7F7;">
    <div class="container1">
        <div class="row">
            <div class="col-md-2">
                <ul id="main-nav" class="nav nav-tabs nav-stacked" style="">
                    <li class="active">
                        <a href="/index.php/Index/sysInfo" target="right"><i class="glyphicon glyphicon-th-large"></i> 系统管理菜单  </a>
                    </li>
                     <li>
                        <a href="#systemSetting3" class="nav-header collapsed" data-toggle="collapse" >
                            <i class="glyphicon glyphicon-home"></i> 安全中心
                            <span class="pull-right glyphicon glyphicon-chevron-down"></span>
                        </a>
                           <ul id="systemSetting3" class="nav nav-list collapse secondmenu" style="height: 5px;">
                            <li><a href="/index.php/User/reset" target="right"><i class="glyphicon glyphicon-th-list"></i>&nbsp;&nbsp;修改密码</a></li>
                         </ul>  
                         
                    </li>
                    <li>
                        <a href="#systemSetting4" class="nav-header collapsed" data-toggle="collapse">
                            <i class="glyphicon glyphicon-user"></i> 信息管理 
                            <span class="pull-right glyphicon glyphicon-chevron-down"></span>
                        </a>
                        <ul id="systemSetting4" class="nav nav-list collapse secondmenu" style="height: 5px;">
                            <li><a href="/index.php/Class/all_class" target="right"><i class="glyphicon glyphicon-th-list"></i>&nbsp;&nbsp;班级信息列表</a></li>
                            <li><a href="/index.php/Class/add_class1" target="right"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;创建班级</a></li>
                             <li><a href="/index.php/Index/right" target="right"><i class="glyphicon glyphicon-th-list"></i>&nbsp;&nbsp;教师信息列表</a></li>
                            <li><a href="/index.php/Stu/all_stu" target="right"><i class="glyphicon glyphicon-education"></i>&nbsp;&nbsp;学生信息列表</a></li>
                            <li><a href="/index.php/User/add" target="right"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;添加教师信息</a></li>
                            <li><a href="/index.php/Stu/add_stu" target="right"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;添加更多学生</a></li>
                        </ul>
                    </li>
                    <!--  li>
                        <a href="#systemSetting" class="nav-header collapsed" data-toggle="collapse">
                            <i class="glyphicon glyphicon-user"></i> 用户管理 
                            <span class="pull-right glyphicon glyphicon-chevron-down"></span>
                        </a>
                        <ul id="systemSetting" class="nav nav-list collapse secondmenu" style="height: 5px;">
                            <li><a href="/index.php/Index/right" target="right"><i class="glyphicon glyphicon-th-list"></i>&nbsp;&nbsp;教师信息列表</a></li>
                            <li><a href="/index.php/Stu/all_stu" target="right"><i class="glyphicon glyphicon-education"></i>&nbsp;&nbsp;学生信息列表</a></li>
                            <li><a href="/index.php/User/add" target="right"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;添加教师信息</a></li>
                            <li><a href="/index.php/Stu/add_stu" target="right"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;添加更多学生</a></li>
                        </ul>
                    </li-->
                    
                    <li>
                        <a href="#systemSetting1" class="nav-header collapsed" data-toggle="collapse">
                            <i class="glyphicon glyphicon-list-alt"></i> 发展评估 
                            <span class="pull-right glyphicon glyphicon-chevron-down"></span>
                        </a>
                        <ul id="systemSetting1" class="nav nav-list collapse secondmenu" style="height: 0px;">
                            <li><a href="/index.php/Record/add_record/stu_id/<?php echo ($stu_id); ?>" target="right" ><i class="glyphicon glyphicon-list-alt" target="right"></i>&nbsp;&nbsp;填写评估</a></li>
                            <li><a href="/index.php/Record/show_record/stu_id/<?php echo ($stu_id); ?>" target="right"><i class="glyphicon glyphicon-eye-open"></i>&nbsp;&nbsp;查看评估记录</a></li>
                            <li><a href="/index.php/Record/active/stu_id/<?php echo ($stu_id); ?>" target="right"><i class="glyphicon glyphicon-signal" target="right"></i>&nbsp;&nbsp;儿童发展情况剖面图</a></li>
                            <li><a href="/index.php/Record/Cycle/stu_id/<?php echo ($stu_id); ?>" target="right"><i class="glyphicon glyphicon-signal" target="right"></i>&nbsp;&nbsp;儿童情绪行为表现图</a></li>
                            <li><a href="/index.php/Sheet/all_sheet/stu_id/<?php echo ($stu_id); ?>" target="right"><i class="glyphicon glyphicon-signal"></i>&nbsp;&nbsp;评估结果分析表</a></li>
                            <li><a href="/index.php/Record/chart/stu_id/<?php echo ($stu_id); ?>" target="right"><i class="glyphicon glyphicon-signal" target="right"></i>&nbsp;&nbsp;康复效果折线图</a></li>
                           
                            
                            <li><a href="/index.php/Stu/all_info/stu_id/<?php echo ($stu_id); ?>" target="right"><i class="glyphicon glyphicon-list" target="right"></i>&nbsp;&nbsp;评估信息汇总</a></li>
                            <!--  <li><a href="/index.php/Record/b_class" target="right"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;添加已有的量表</a></li> -->
                             <!--  li><a href="/index.php/Record/other_scale_list" target="right"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;其他量表</a></li-->
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#systemSetting2" class="nav-header collapsed" data-toggle="collapse">
                            <i class="glyphicon glyphicon-object-align-left"></i> 教育计划
                            <span class="pull-right glyphicon glyphicon-chevron-down"></span>
                        </a>
                        <ul id="systemSetting2" class="nav nav-list collapse secondmenu" style="height: 0px;">
                            <li><a href="/index.php/Check/info" target="right"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;分项建议</a></li>
                            <li><a href="/index.php/Eduplan/all_plan" target="right"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;&nbsp;个别化教育计划</a></li>
                            <li><a href="/index.php/Plan/index" target="right"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;&nbsp;课程实施</a></li>
                        </ul>
                    </li>
                    
                    <li>
                    	<a href="#systemSetting6" class="nav-header collapsed" data-toggle="collapse" target="right">
                            <i class="glyphicon glyphicon-send"></i> 康复转衔
                            <span class="pull-right glyphicon glyphicon-chevron-down"></span>
                        </a>
                        <ul id="systemSetting6" class="nav nav-list collapse secondmenu" style="height: 0px;">
                            <li><a href="/index.php/Direction/dir" target="right">
                            <i class="glyphicon glyphicon-log-in"></i> 后续跟踪调查表</a></li> 
                        </ul> 
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>