<?php
namespace Admin\Controller;
use Think\Controller;

class UserController extends Controller{
	
	public function Reset() //修改密码
	{
		if(session(admin_name)!=null)
		{
			$Admin = M ("Admin_info");
			$map['admin_name'] =session(admin_name);
			$pwd = $Admin->where($map)->getField('admin_pw');
			if(isset($_POST['submit']))
			{
				$new_pwd = str_replace(' ', '', $_POST['new_pwd']);
				$new_pwd1 = str_replace(' ', '', $_POST['new_pwd1']);
				$length = strlen($new_pwd);
				if((md5($_POST['old_pwd'])==$pwd)&&($length>5&&$length<16)
						&&($new_pwd==$new_pwd1))
				{
					$map['admin_id'] =session(admin_id);
					$data['admin_pw'] = md5($new_pwd);
					$Admin-> where($map)->save($data);
					//$this->redirect('Index/right','',1,'修改成功！');
					$this->success('修改成功！！',U("Index/right"),1);
				}
				else{
					//$this->redirect('User/Reset','',1,'修改失败！');
					$this->error('修改失败！！',U("User/Reset"),1);
				}
				exit;
			}
			$this->display();
		}else if(session(u_name)!=null)
		{
			$user = M ("User_info");
			$map['u_name'] =session(u_name);
			$pwd = $user->where($map)->getField('u_pw');
			if(isset($_POST['submit']))
			{
				$new_pwd = str_replace(' ', '', $_POST['new_pwd']);
				$new_pwd1 = str_replace(' ', '', $_POST['new_pwd1']);
				$length = strlen($new_pwd);
				if((md5($_POST['old_pwd'])==$pwd)&&($length>5&&$length<16)
						&&($new_pwd==$new_pwd1))
				{
					$map['u_id'] =session(u_id);
					$data['u_pw'] = md5($new_pwd);
					$user-> where($map)->save($data);
					//$this->redirect('Stu/stu_list1','',1,'修改成功！');
					$this->success('修改成功！！',U("Stu/stu_list1"),1);
					exit;
				}
				else{
					echo "<script>alert('所填信息不合格，修改失败！')</script>";
				}
			}
			$this->display();
		}
		else{
			$this->error('请先登录',U('Login/login'),1);
		}	
	}
	public function Check_OldPwd()  //验证管理员的原始密码
	{
		if(session(admin_name)!=null)
		{
			$Admin = M ("Admin_info");
			$map['admin_name'] =session(admin_name);
			$pwd = $Admin->where($map)->getField('admin_pw');
			
			if(md5($_POST['n'])!=$pwd)
			{
				$in = '密码不正确！';
			}else{
				$in="<span style='color:green;'>✔,正确</span>";
			}
			echo $in;
		}else if(session(u_name)!=null)
		{
			$user = M ("user_info");
			$map['u_name'] =session(u_name);
			$pwd = $user->where($map)->getField('u_pw');
			
			if(md5($_POST['n'])!=$pwd)
			{
				$in = '密码不正确！';
			}else{
				$in="<span style='color:green;'>✔,正确</span>";
			}
			echo $in;
		}
		
	}

	
	public function Add() //添加角色信息
	{
		if(session(admin_name)!=null)
		{
			$user = M('user_info');
			$res = $user->getField('u_id,u_name'); //获取用户名称集合
			if(isset($_POST['submit']))
			{
				if(($_POST['inputUnm']!=null)&&($_POST['inputPwd']!=null)&&($_POST['role']!=null))
				{
					if(in_array($_POST['inputUnm'], $res))
					{
						echo"<script>alert('用户已存在，请换一个！');</script>";
							
					}else{
						$new_pwd = str_replace(' ', '', $_POST[inputPwd]); //去除空格
						$length = strlen($_POST[inputPwd]);  //密码的长度
						$num= count($_POST['role']); //判断角色信息
						if(($length>5&&$length<16)&&($num>0))
						{
							$data['u_name'] =$_POST['inputUnm'];
							$data['u_pw']= md5($_POST['inputPwd']);
							foreach( $_POST['role'] as $i)
							{
								if($i=='管理员')
								{
									$data['admin_name'] = $_POST['inputUnm'];
									$data['admin_pw']= md5($_POST['inputPwd']);
									$admin = M('admin_info');
									$admin->add($data);  //将信息添加到管理员表中
								}
								$result.= $i.'、';  //将角色信息字串
							}
							$result = rtrim($result,'、');  //去除字符串末尾的‘、’
							$data['admin_id']=session(admin_id);
							$data['role'] = $result ;
							$user->add($data);
							//$this->redirect('Index/right','',1,'添加成功！');
							$this->success('添加成功！！',U("Index/right"),1);
							exit;
						}else{
							echo"<script>alert('所填的信息不符合要求，请重新填写！');</script>";
						}
					}
				}
				else{
					echo "<script>alert('补全信息！');</script>";
				}
			}
			$this->display();
		}
		else{
			$this->error('请先登录',U('Login/login'),1);
		}
		
	}
	
	public function checkNm()  //添加用户信息
	{
		$user = M('user_info');
		$res = $user->getField('u_id,u_name');
		if(in_array($_POST['n'], $res))
		{
			$in = '*用户已存在,请换一个';
		}else{
			$in='';
		}
		echo $in;
	}
	
	public function delNm()  //删除用户信息
	{
		if(session(admin_name)==admin)
		{
			$user = M('user_info');
			$map[u_id] = $_GET['u_id'];
			$t_class = M('role_class_info');//班主任与班级的联系
			$map['c_id'] = $t_class->where($map)->getField('c_id');//获得对应的班级名称
			if($map['c_id']!=null)
			{
				$t_class->where($map)->delete();
			}
			$u_name = $user->where($map)->getField('u_name');//获得对应的用户名
			$user->where($map)->delete();
			$admin = M('admin_info');
			$res= $admin->getField('admin_id,admin_name');
			if(in_array($u_name, $res))
			{
				$data['admin_name'] =$u_name;
				$map['admin_id']= $admin->where($data)->getField('admin_id');
				$admin->where($map)->delete();
			}
			//$this->redirect('Index/right','',1,'删除成功！！');
			$this->success('删除成功！！',U("Index/right"),1);
		}
		else
		{
			$this->error('您暂时没有这个权限',U("Index/right"),1);
		}
	}
	

	
	public function update()    //编辑角色信息
	{
		if(session(admin_name)!=null)
		{
			$user = M('user_info');
			$map[u_id] = $_GET['u_id'];
			$res=$user->where($map)->select();
			$role= explode('、', $res[0]["role"]);  //取出角色种类信息
			$this->assign('res',$res);
			$this->assign('role',$role); //角色信息
			if(isset($_POST['submit']))
			{
				if($_POST['role']!=null)
				{
					//dump($role)."<br/>";
					$num= count($_POST['role']); //判断角色信息
					//dump($_POST['role']);
					
					if(!(in_array('管理员',$role))&&(in_array('管理员',$_POST['role'])))
					{
						$data['admin_name'] = $_POST['u_name'];
						$data['admin_pw']= $_POST['u_pw'];
						$admin = M('admin_info');
						$admin->add($data);
					}elseif(in_array('管理员',$role)&&(!(in_array('管理员',$_POST['role']))))
					{
						$data['admin_name'] = $_POST['u_name'];
						$data['admin_pw']= $_POST['u_pw'];
						$admin = M('admin_info');
						$map['admin_id']=$admin->where($data)->getField('admin_id');
						$admin->where($map)->delete();
					}
					foreach( $_POST['role'] as $i)
					{
						$result.= $i.'、';  //将角色信息字串
					}
					$result = rtrim($result,'、');  //去除字符串末尾的‘、’
					$data['u_id']=$_POST['u_id'];
					$data['u_name'] =$_POST['u_name'];
					$data['role'] = $result ;
					$data['admin_id']=session(admin_id);
					$user->save($data);
					//$this->redirect('Index/right','',1,'修改成功！');
					$this->success('修改成功！！',U("Index/right"),1);
					exit;
				}
				else{
						echo"<script>alert('所填的信息不符合要求，请重新填写！');</script>";
				}
			}
			$this->display();
		}
		else {
			$this->error('请先登录',U('Login/login'),1);
		}
	}
		
	function _empty()  //空操作
	{
		$t= __ROOT__.'/Public/images/404.png';
		echo "<div style='margin-top:8em;'><center><img src='$t'></center></div>";
	}
}

						