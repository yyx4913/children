<?php
namespace  Admin\Controller;
use Think\Controller;


class TeamController extends Controller
{
	function add_team()    //添加教学团队成员信息
	{
		if((session(u_name)!=null)||($_SESSION['admin_name']!=null))
		{
			$id= session(u_id);
			$class = M('class_info');   //班级信息
			if($_GET['c_id']==null)    //随机选择班级添加
			{
				$sql="select class_info.c_id,class_info.c_name from ((class_info inner join role_class_info on role_class_info.c_id=class_info.c_id) inner
				join user_info ON role_class_info.u_id=user_info.u_id) WHERE user_info.u_id ='$id' ";
				$res = $class->query($sql);
				$this->assign('res',$res);
			}
			else{
				$map['c_id'] = $_GET['c_id'];  //选定班级添加
				$res= $class->where($map)->select();
				$this->assign('res',$res);
			}
			if(isset($_POST['submit']))
			{
				$team = M('teach_team');
				$c_id = $_POST['class'];
				$data['c_id'] = $c_id;  //获取班级信息
				if(session(u_id)!=null)
				{
					$data['u_id'] = session(u_id);
				}else{
					$t_class =M('role_class_info');
					$data['c_id']=$c_id;
					$data['u_id'] = $t_class->where($data)->getField('u_id');
				}
				
				if($_POST['team1']!=null)
				{
					$data['t_name'] =$_POST['team1'];
					$team->add($data);
				}
				if($_POST['team2']!=null)
				{
					$data['t_name'] =$_POST['team2'];
					$team->add($data);
				}
				if($_POST['team3']!=null)
				{
					$data['t_name'] =$_POST['team3'];
					$team->add($data);
				}
				if($_POST['team4']!=null)
				{
					$data['t_name'] =$_POST['team4'];
					$team->add($data);
				}
				if($_POST['team5']!=null)
				{
					$data['t_name'] =$_POST['team5'];
					$team->add($data);
				}
				if(session(u_id)!=null)
				{
					//$this->redirect('Class/class_list','',1,'添加成功...');
					$this->success('添加成功...',U("Class/class_list"),1);
				}else{
					//$this->redirect('Class/all_class','',1,'添加成功...');
					$this->success('添加成功...',U("Class/all_class"),1);
				}
				exit;
			}
			$this->display();
			
		}
		else{
			$this->error('请先登录',U('Login/login'),1);
		}
	}
	
	function team_info() //教师团队成员信息
	{
		if(session(u_name)!=null)
		{
			$id= session(u_id);
			$class = M('class_info');   //班级信息
			$sql="select class_info.c_id,class_info.c_name from ((class_info inner join role_class_info on role_class_info.c_id=class_info.c_id) inner
			join user_info ON role_class_info.u_id=user_info.u_id) WHERE user_info.u_id ='$id' ";
			$res = $class->query($sql);
			$this->assign('res',$res);
			foreach($res as $k=>$v)
			{
				$team = M('teach_team'); //统计教师团队
				$sql1 ="select t_name from teach_team where c_id='$v[c_id]'";
				$arr[] = $team->query($sql1);
			}
			$this->assign('arr',$arr);  //任课老师信息
			$this->display();
		}
		else{
			$this->error('请先登录',U('Login/login'),1);
		}
	}
	 
	function edit_team()  //编辑教师团队成员信息
	{
		if((session(u_name)!=null)||($_SESSION['admin_name']!=null))
		{
		    $c_id = $_GET['c_id'];
			$map['c_id']= $_GET['c_id'];
			$class = M('class_info');   //班级信息
			
			$team = M('teach_team'); //统计教师团队
			$res = $team->where($map)->select();
			
			if($res==null)
			{
			    $res =$class->where($map)->select();
			    
			    $this->assign('res',$res);
				$this->redirect('Team/add_team?c_id='.$c_id);
				exit;
			}
			if(isset($_POST['submit']))
			{
				$arr=$_POST['team'];
				for($i=0;$i<count($arr);$i++)
				{
					if($arr[$i]!=null)
					{
						$data['t_name']= $arr[$i];
						$data['id']= $res[$i]["id"];
						$team->save($data);
					}else{
						$arr1[]= $res[$i]["id"];
					}
				}
				for($i=0;$i<count($arr1);$i++)   //删除空白的信息
				{
					$map['id']= $arr1[$i];
					$team->where($map)->delete();
				}
				if(session(u_name)!=null)
				{
					//$this->redirect('team_info','',1,'更新信息成功！');
					$this->success('更新信息成功！！',U("Team/team_info"),1);
				}else{
					//$this->redirect('Class/all_class','',1,'更新信息成功！');
					$this->success('更新信息成功！！',U("Class/all_class"),1);
				}
				exit;
			}
			$this->assign('res',$result);
			$this->assign('res',$res);
			$this->display();
		}
		else{
			$this->error('请先登录',U('Login/login'),1);
		}
	}
	
	
	function _empty()  //空操作
	{
		$t= __ROOT__.'/Public/images/404.png';
		echo "<div style='margin-top:8em;'><center><img src='$t'></center></div>";
	}
}