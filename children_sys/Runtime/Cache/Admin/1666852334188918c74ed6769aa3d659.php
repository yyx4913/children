<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>首页</title>
</head>
	<frameset border="1" framespacing=1 rows="115, *,50"  bordercolor="#8B8B8B">
        <frame name=header src="/index.php/Index/header.html" frameborder="1" noresize scrolling=no>
            <frameset cols="240, *">
                <frame name=left src="/index.php/Index/s_left" frameborder=1 noresize scrolling=1>
                <frame name=right src="/index.php/Stu/stu_list" frameborder=0 noresize scrolling=1 >
            </frameset>
        <frame name="right" src="/index.php/Index/footer.html" frameborder="0" noresize scrolling=no> 
    </frameset>
    <noframes>
    </noframes>
</html>