<?php
namespace Admin\Controller;
use Think\Controller;

class ClassController extends Controller
{
	public function class_list()   //班级信息列表
	{
		if(session(u_name)!=null)
		{
			$id= session(u_id);
			$class = M('class_info');   //班级信息
			$sql="select class_info.c_id,class_info.c_name from ((class_info inner join role_class_info on role_class_info.c_id=class_info.c_id) inner
			join user_info ON role_class_info.u_id=user_info.u_id) WHERE user_info.u_id ='$id' ";
			$res = $class->query($sql);
			if($res==null)
			{
				$this->display('Index/s_right');
				exit;
			}
			$this->assign('res',$res);
			foreach($res as $k=>$v)
			{
				
				$stu_info = M('stu_info');
				$sql = "select count(c_id) from stu_info where c_id='$v[c_id]'"; //统计班级人数
				$num[]= $stu_info->query($sql);
				$team = M('teach_team'); //统计教师团队
				$sql1 ="select t_name from teach_team where c_id='$v[c_id]'";
				$arr[] = $team->query($sql1);
			}
			$this->assign('num',$num);  //班级总人数
			$this->assign('arr',$arr);  //任课老师信息
			$this->display(); 
		}else {
			$this->error('请先登录',U('Login/login'),1);
		}
	}
	
	public function add_class()  //班主任添加班级信息
	{
		if(session(u_name)!=null)
		{
			if(isset($_POST['submit']))
			{
				if($_POST['inputClass']!=null)
				{
				    if($_POST['tt']==1){
					$class = M('class_info');   //班级信息
					$data['c_name'] =$_POST['inputClass'];
					$last_id=  $class->add($data); //添加数据同时获取刚插入的id
					$t_class = M('role_class_info'); //教师与班级的关系
					$data['u_id']=session(u_id);
					$data['c_id']=$last_id;
					$t_class->add($data);
					//$this->redirect('class_list','',1,'添加成功');
					$this->success('创建班级成功！',U("Class/class_list"),1);
					exit;
				    }else{
				        echo "<script> alert('输入数据不合格，请修改！')</script>";
				    }
				}
				else{
					echo "<script> alert('请补全信息！')</script>";
				}
			}
			$this->display();
		}
		else{
			$this->error('请先登录',U('Login/login'),1);
		}
	}
	
	function check(){ //判断班级名是否有效
	    $c = $_POST['v'];
	    if($c !=''){
	        $class = M('class_info')->select();
	        foreach($class as $v){
	            $arr[] =$v['c_name'];
	        }
	        if(in_array($c, $arr)){
	            $res ='班级名称已存在，请换一个名称！' ;
	        }else{
	            $res ='✔' ;
	        }
	    }else{
	        $res = '必填信息';
	    }
	    
	    echo $res;
	}
	
	function add_class1()  //管理员添加班级
	{
		if(session(admin_name)!=null)
		{
			if(isset($_POST['submit']))
			{
				if(($_POST['inputClass']!=null)&&($_POST['inputTeacher']!=null))
				{
				    if($_POST['tt']==1){
				        $class = M('class_info');   //班级信息
				        $data['c_name'] =$_POST['inputClass'];
				        $c_id=  $class->add($data); //添加数据同时获取刚插入的id
				        $user = M('user_info');
				        $data['u_name'] =$_POST['inputTeacher']; //对应的班主任姓名
				        $u_na = $data['u_name'];
				        
				        $data['admin_id']=session(admin_id); //管理者的id
				        $data['role']  ="班主任";
				        $data['u_pw'] = md5('123456');
						$res= $user->where('u_name='."'".$u_na."'")->select();
				        if(count($res) ==0){
				        	$u_id=  $user->add($data); //添加数据同时获取刚插入的id
				        }else{
				        	$u_id = $res[0]['u_id'];
				        }
				        
				        $t_class = M('role_class_info'); //教师与班级的关系
				        $data['u_id']=$u_id;
				        $data['c_id']=$c_id;
				        $t_class->add($data);
				        $this->success('添加成功，对应的班主任用户同步添加，初始密码为123456！',U("Class/all_class"),3);
				        exit;
				    }else{
				        echo "<script> alert('输入数据不合格，请修改！')</script>";
				    }
				}
				else{
					echo "<script> alert('请补全信息！')</script>";
				}
			}
		  $this->display();
		}
		else{
			$this->error('请先登录',U('Login/login'),1);
		}
	}
	
	
	function all_info()   //查看班级的详细信息
	{
		if((session(u_name)!=null)||(session(admin_name)!=null))
		{
			$user =M('user_info');
			$c_id=$_GET['c_id']; //获取对应的班级id
			$sql="select u_name,c_name from ((class_info inner join role_class_info on role_class_info.c_id=class_info.c_id) inner
			join user_info ON role_class_info.u_id=user_info.u_id) WHERE class_info.c_id ='$c_id' ";
			$info=$user->query($sql);
			$stu =M('stu_info');
			$sql1 ="select count(stu_id) from stu_info where c_id='$c_id'";  //获取学生的总人数
			$sum= $stu->query($sql1);
			$total = $sum[0]["count(stu_id)"];
			$per=15;   //每页的信息量
			$page = new \Common\Common\Page($total,$per); //引入统计页码的函数
			$sql2 ="select stu_id,stu_num,stu_name,c_id,sex from stu_info where c_id='$c_id'".$page->limit;
			$pagelist = $page->fpage();
			$res = $stu->query($sql2); //获得班级学生的信息集合
			$this->assign('sum',$sum);
			$this->assign('res',$res);
			$this->assign('info',$info); //获得班主任信息
			$this->assign('pagelist',$pagelist);
			$this->display();
		}else{
			$this->error('请先登录',U('Login/login'),1);
		}
	}
	
	public function all_class()  //所有的班级信息
	{
		if(session(admin_name)!=null)
		{
			$class = M('class_info');
			//$res = $class->select();
			$total = $class->count(); //信息总量
			if($total==0)
			{
				$this->display('Index/s_right');
				exit;
			}
			$per=12;   //每页的信息量
			$page = new \Common\Common\Page($total,$per);
			
			$sql3 ="select * from class_info ".$page->limit;
			$res=$class->query($sql3);
			$pagelist = $page->fpage();
			$this->assign('res',$res);
			$this->assign('pagelist',$pagelist);
			foreach($res as $k=>$v)
			{
				$stu_info = M('stu_info');
				$sql = "select count(c_id) from stu_info where c_id='$v[c_id]'"; //统计班级人数
				$num[]= $stu_info->query($sql);
				
				$sql2 = "select user_info.u_name from ((user_info inner join role_class_info on user_info.u_id=
						role_class_info.u_id) inner join class_info on class_info.c_id=role_class_info.c_id) WHERE class_info.c_id ='$v[c_id]' ";
				$user = M('user_info');
				
				$u_name[] =$user ->query($sql2);
				
				$team = M('teach_team'); //统计教师团队
				$sql1 ="select t_name from teach_team where c_id='$v[c_id]'";
				$arr[] = $team->query($sql1);
			}
			$this->assign('num',$num);  //班级总人数
			$this->assign('u_name',$u_name);  //班主任
			$this->assign('arr',$arr);  //任课老师信息
			
			$this->display();
			
		}else{
			$this->error('请先登录',U('Login/login'),1);
		}
	}
	
	function edit_class() //编辑班级信息
	{
		if($_SESSION['admin_name']!=null)
		{
			$c_id=$_GET['c_id'];
			$t_class=M('role_class_info');
			$sql = "select user_info.u_name,class_info.c_name,class_info.c_id from ((user_info inner join role_class_info on user_info.u_id=
			role_class_info.u_id) inner join class_info on class_info.c_id=role_class_info.c_id) WHERE class_info.c_id ='$c_id' ";
			$res=$t_class->query($sql);
			$class = M('class_info');
			if($res==null)
			{
				$map['c_id']=$c_id;
				$res=$class->where($map)->select();
			}
			$user = M('user_info');
			$arr = $user->select();
			$num= count($arr); //记录总数
			for($i=0;$i<$num;$i++)
			{
				if(strpos($arr[$i]["role"],'班主任')!==false)
				{
					$arr1[]= $arr[$i]["u_name"]; //选出所有的班主任
				}
			}
			$this->assign('arr',$arr1);
			$this->assign('res',$res);
			if(isset($_POST['submit']))
			{
				$data['c_name']=$_POST['inputClass'];//获得班级名称
				$map['c_id']=$_POST['c_id'];
				$class->where($map)->save($data);
				$data['u_name']= $_POST['inputTeacher']; //获得班主任信息
				$data['u_id']=$user->where($data)->getField('u_id');//获取教师对应的id
				$info = $t_class->select(c_id);
				$num = count($info); //信息总量
				//echo $num;
				for($i=0;$i<$num;$i++)
				{
					if(in_array($map['c_id'],$info[$i]))
					{
						$tt=0;
						break;
					}else{
						$tt=1;
					}
				}
				if($tt==0)
				{
					$t_class->where($map)->save($data);	
				}
				else{
					$data['c_id']=$_POST['c_id'];
					$t_class->add($data);	
				}
				//$this->redirect('all_class','',1,'修改成功！');
				$this->success('修改成功！',U("Class/all_class"),1);
				exit;
			}

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