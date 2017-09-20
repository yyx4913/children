<?php
namespace Admin\Controller;
use Think\Controller;


class EmptyController extends Controller{
	function _empty()
	{
		$t= __ROOT__.'/Public/images/404.png';
		echo "<div style='margin-top:8em;'><center><img src='$t'></center></div>";
	}
}