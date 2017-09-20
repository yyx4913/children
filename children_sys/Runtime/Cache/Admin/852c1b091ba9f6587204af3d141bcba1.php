<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>添加信息</title>
<link href="/Public/css/bootstrap.min.css" rel="stylesheet">
	<link href="/Public/css/me.css" rel="stylesheet">
	<!-- 在引入bootstrap.min.js核心库之间加载jquery.min.js -->
	<script type="text/javascript" src="/Public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/Public/js/checkPw.js"></script>
	<script type="text/javascript" src="/Public/js/print.js"></script>
	<script type="text/javascript" src="/Public/js/jquery.jqprint-0.3.js"></script>	
</head>
<body>
<body style="background:#F0F2F5; margin-top:1.5em;">
	<div class="container">
		<div class="chance">
			<ul>
				<?php if(is_array($res1)): foreach($res1 as $key=>$v1): ?><li><a href="/index.php/Check/info?kind_id=<?php echo ($v1["kind_id"]); ?>"><?php echo ($v1["kind_name"]); ?></a></li><?php endforeach; endif; ?>
			</ul>
		</div>
		<div class="clear"></div>
		<div class="main" id="ddd">
		<center><h2 class="text-primary">增加•<?php echo ($scale['s_title']); ?>•训练建议</h2>	</center>
			
				<form action="/index.php/Check/add" method="post">
					<div class="row">
					<div class="form-group" style="font-size:1.5em;">
						<div class="col-lg-2">
							训练项目:
						</div>
						<div class="col-lg-3">
							<input type="text" class="form-control" readOnly="true" name="s_title" value="<?php echo ($scale["s_title"]); ?>">
							<input type="hidden" name="kind_id" value="<?php echo ($kind_id); ?>">  
							<input type="hidden" name="s_id" value="<?php echo ($scale["s_id"]); ?>">  
						</div>
					</div>
					</div>
					<div class="row" style="margin-top:2em;">
					<div class="form-group">
						<div class="col-lg-2">
							训练建议:
						</div>
						<div class="col-lg-8">
							<textarea name="action" id="editor_id" class="form-control" ></textarea>
						</div>
					</div>
					</div><br/>
					<center><input type="submit" value="&nbsp;提&nbsp;&nbsp;交&nbsp;" class="btn btn-info btn-lg " ></center>
				</form>
		</div>
	</div>
</body>
<script type="text/javascript" src="/Public/js/kindeditor/kindeditor-all-min.js"></script>
<script charset="utf-8" src="/Public/js/kindeditor/lang/zh-CN.js"></script>
<script>
	//KindEditor.options.filterMode = false;
	KindEditor.ready(function(K) {
    window.editor = K.create('#editor_id',{
      uploadJson : '/index.php/Image/kindupload',
      afterBlur : function(){this.sync();}, //
      height:['230px'],
      items:[
             'undo', 'redo', '|','cut', 'copy', 'paste',
            '|', 'justifyleft', 'justifycenter', 'justifyright',
            'justifyfull', '|','formatblock', 'fontname', 'fontsize', '|', 'forecolor',  'bold',
            'italic', 'underline', '|', 'image', 'multiimage', 'emoticons', 'fullscreen'
    ]
    });
  });
</script>
</html>