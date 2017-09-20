<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>添加班级信息</title>
	<link href="/Public/css/bootstrap.min.css" rel="stylesheet">
	<link href="/Public/css/me.css" rel="stylesheet">
	<!-- 在引入bootstrap.min.js核心库之间加载jquery.min.js -->
	<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
	<script>
		function check(value){
			var data = {'v':value};
			var url = "check";
			$.post(url,data,function(result){
				document.getElementById("a").innerText = result;
				if(result !='✔'){
					document.getElementById("b").value = 0;
				}else{
					document.getElementById("b").value =1;
				}
			});
		}
	</script>
</head>
<body style="background:#E3F5FC;">
	<div class="container">
		<br/><br/><br/><center><h1 class="text-info">&nbsp;添加班级信息</h1></center>
		<form action="/index.php/Class/add_class1" method="post" class="form-horizontal">
		  <div class="form-group">
		    <label  class="col-xs-2 col-xs-offset-2 text-primary">设置班级名称：</label>
		   	<div class="col-xs-4">
		      	<input type="text" class="form-control" name="inputClass" placeholder="设置班级名称" onblur="check(this.value)">
		    	<input type="hidden" class="form-control" name="tt" id="b" >
		    </div>
		    <div class="col-xs-3" style="font-size:0.5em;margin-left:-2em;color:red;line-height:3em;">
		    	<span id="a"></span>
		    </div>	
		  </div>
		  <div class="form-group">
		    <label  class="col-xs-2 col-xs-offset-2 text-primary">设置班主任：</label>
		    <div class="col-xs-4">
		      <input type="text" class="form-control" name="inputTeacher" placeholder="设置班主任姓名" >
		    </div>
		  </div>
		  </br>
		 <div class="form-group">
		   	<div class="col-xs-5 col-xs-offset-4">
				<span class=" col-xs-offset-2" ><input name="submit" type="submit" value="确认提交" class="btn btn-info btn-lg"></span>
				<span class=" col-xs-offset-1" ><input name="reset" type="reset" class="btn btn-success btn-lg"></span>
			</div>
		</div>
	</form>
	</div>
</body>
</html>