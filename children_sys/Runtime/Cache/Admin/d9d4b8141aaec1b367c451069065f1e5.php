<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>用户登录</title>
	<!-- 加载Bootstrap样式表 -->
	<link href="/Public/css/bootstrap.min.css" rel="stylesheet">
	<link href="/Public/css/me.css" rel="stylesheet">
	<!-- 在引入bootstrap.min.js核心库之间加载jquery.min.js -->
	<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" style="margin-top:4em; padding-top:5em;">
	<div class="row"> 
		<div class="col-xs-4 col-xs-offset-1">
			<img src="/Public/images/logo.jpg" alt="pic1" style="width:100%;" >
		</div>
		<div class="col-xs-4 col-xs-offset-2" style="border:1px solid #D3D3D3; padding:3em;padding-top:0px;">
			<center><h1>用户登录</h1></center>
			<hr>
				<form action="/index.php/Login/login.html"  name="form1" method="post" class="form-horizontal">
					<div class="form-group">
						<div class="input-group input-group-lg">
							<span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
							<input type="text" class="form-control" placeholder="请输入用户名" name="username" id="username">
						</div>

					</div>
					<div class="form-group">
						<div class="input-group input-group-lg">
							<span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></span>
						    <input type="password" class="form-control" placeholder="请输入密码" name="pwd" id="pwd">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-7">
							<div class="input-group input-group-lg" style="margin-left:-1em;">
								<span class="input-group-addon" id="sizing-addon2"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
							    <input type="text" class="form-control" placeholder="请输入验证码" name="yanzheng" id="yanzheng">
							</div>
						</div>
						<div class="col-xs-5">
							    <img src="/index.php/Login/verifyImg"
					id="che" onclick="change('che');">&nbsp;<a href="#" onclick="change('che')"><span style="font-size:12px;">看不清,换一张</span></a>
						</div>	
					</div>
					<!--  div class="form-group">
							<span style="font-size:1.3em">角色选择：</span>
							<select name="kind">
								<option value="super">管理员</option>
								<option value="other">其他用户</option>
							</select>
					</div-->
					<div class="form-group">
						<div class="col-xs-6 col-xs-offset-2">
							<span class="col-xs-offset-2" ><input name="submit" type="submit" class="btn btn-info" style="font-size: 2em;width:100%;" value="登录"></span>
						</div>
					</div>
				</form>
		</div>
	</div>
</div>

<nav class="navbar navbar-inverse navbar-fixed-bottom" > 
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
    	<span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
   	<div class="container">	
   			 <span class="navbar-brand" style="margin:auto 30% auto 30%"><?php echo ($conf_name); ?></span>
   </div>
</nav> 
<script type="text/javascript">
function change(id)
{
	document.getElementById(id).src='/index.php/Login/verifyImg?'+Math.random(1);
}
</script>
</body>
</html>