<?php
namespace Admin\Model;
use Think\Model;

class Admin_infoModel extends Model{
	private $_db ='';
	function __construct(){
	    $this->_db = M('Admin_info');
	}
	function isGet($admin_name){ //判断用户是否存在
	    $admin = $this->_db->where('admin_name="'.$admin_name.'"')->find();
	    if($admin){
            return $admin;
	    }else{
	        return '';
	    }
	}
// 	function checkNamePwd($name,$pwd)
// 	{	
// 		$info = $this->getByadmin_name($name);
		
// 		if($info!=null){
// 			if($info[admin_pw]==$pwd)
// 			{
// 				return $info;
// 			}
// // 			else{
// // 				return false;
// // 			}
// 		}
// // 		else{
// 				return false;
// // 			}
// 	}
}
