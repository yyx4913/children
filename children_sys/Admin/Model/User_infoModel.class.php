<?php
namespace Admin\Model;
use Think\Model;

class User_infoModel extends Model{
	
	function checkNamePwd($name,$pwd)
	{	
		$info = $this->getByu_name($name);
		
		if($info!=null){
			if($info[u_pw]==$pwd)
			{
				return $info;
			}
// 			else{
// 				return false;
// 			}
		}
// 		else{
				return false;
// 			}
	}
}