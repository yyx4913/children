<?php
namespace  Admin\Controller;
use Think\Controller;
use Think\Upload;


class CheckController extends Controller{
	public function info()  //获得测试信息页面
	{
		if((session(u_name)!=null)||($_SESSION['admin_name']!=null))
		{
			$record = M('assess_record');
			if((($_GET['stu_id']!=null)&&(cookie('stu_id')==null))||
					(($_GET['stu_id']!=null)&&($_GET['stu_id']!=cookie('stu_id'))))
			{
				cookie('stu_id',$_GET['stu_id']);
			}
			$stu_id = cookie(stu_id);
			$this->assign('stu_id',$stu_id); //获取学生的stu_id
				
				
			if(cookie('stu_id')==null)
			{
				if($_SESSION['admin_name']!=null)
				{
					$this->error('请先选中一个学生对象！',U('Stu/all_stu'),1);
					exit;
				}elseif(session(u_name)!=null)
				{
					$user =M('user_info');
					$data['u_name']=session(u_name);
					$role = $user->where($data)->getField('role');//判断是班主任还是任课老师
					if($role=="任课老师")
					{
						$this->error('请先选中一个学生对象！',U('Stu/stu_list1'),1);  //任课老师的学生列表
					}else{
						$this->error('请先选中一个学生对象！',U('Stu/stu_list'),1);  //班主任的学生列表
					}
					exit;
				}
			}else{
				if($_GET['kind_id']==null)
				{
					$_GET['kind_id']=1;
				}
				$kind_id = $_GET['kind_id'];
				$data['kind_id']= $_GET['kind_id'];
				$scale_kind = M('scale_kind');
				$res1 = $scale_kind->limit(8)->select();  //分类菜单
				$kind_name = $scale_kind->where($data)->getField('kind_name');
				$stu = M('stu_info');
				$data['stu_id'] = cookie('stu_id');
				$stu_name = $stu->where($data)->getField('stu_name');
				//$res=$record ->where($data)->order('a_id desc')->limit(3)->select(); //显示最新三次测试记录
				$items_values = M('item_values');
				$assess = M('assess_record');
				$arr = $assess->where($data)->select();				
				if($kind_id<8)
				{
				    foreach($arr as $k=>$v)
				    {
				        $a_id= $v["a_id"] ;
				        $sql = "select scales.s_id, scales.s_title,scales.action from ((((item_values inner join items on item_values.item_id = items.item_id
				        and item_values.items_values='E')
				        inner join scales on items.s_id = scales.s_id) inner join modules_scales on scales.s_m_id =
				        modules_scales.s_m_id) inner join scale_kind on modules_scales.kind_id = scale_kind.kind_id)
				        where scale_kind.kind_id = '$kind_id' and item_values.a_id='$a_id' ";
				        $res= $items_values->query($sql); //计算E的值
				    }
				}else{
				    foreach($arr as $k=>$v)
				    {
				        $a_id= $v["a_id"] ;
				        $sql = "select scales.s_id,scales.s_title,scales.action from ((((item_values inner join items on item_values.item_id = items.item_id
				        and item_values.items_values='M')
				        inner join scales on items.s_id = scales.s_id) inner join modules_scales on scales.s_m_id =
				        modules_scales.s_m_id) inner join scale_kind on modules_scales.kind_id = scale_kind.kind_id)
				        where scale_kind.kind_id = '$kind_id' and item_values.a_id='$a_id' ";
				        $res = $items_values->query($sql); //计算M的值
				    }
				}
// 				dump($res);
                $sug = M("suggest");
			    foreach($res as $k=>$v)
			    {
			         $act = $sug->where('sc_id='.$v['s_id'])->getField('action');
			         $info[]= $v["s_title"];
			         if($act=='')
			         {
			             $act = "<center><a href='add/kind_id/{$kind_id}/id/{$v["s_id"]}'>暂无建议信息,可添加</a></center>";
			         }
			         $info1[]=htmlspecialchars_decode($act);
			    }
			    $info = array_unique($info); //去除相同的值
			    $info1= array_unique($info1);
				$this->assign('info',$info);  //获取E或者M的记录项
				$this->assign('info1',$info1);
				$this->assign('res1',$res1);  //分类菜单
				$this->assign('kind_name',$kind_name);//对应的表头
				$this->assign('stu_name',$stu_name); //获取备试的姓名
				$this->display();
			}

		}else{
			
			$this->error('请先登录',U('Login/login'),1);
		}
	}
	
	public function  add()
	{
	    if($_GET['id'])
	    {
	        $id = $_GET['id'];
	        $kind_id=$_GET['kind_id'];
	        $scale= M("scales")->where('s_id='.$id)->find();
	    }
	    $scale_kind = M('scale_kind');
	    $res1 = $scale_kind->limit(8)->select();  //分类菜单
	    if($_POST)
	    {
	        $kind_id= $_POST['kind_id'];
	        
	        $url = $_SERVER['HTTP_REFERER'];
	        if($_POST['action']!=null)
	        {
	            $sc_id = $_POST['s_id'];
	            $data['sc_id']=$sc_id;
	            $data['action'] =htmlspecialchars($_POST['action']);
	            $res=M("suggest")->add($data);
	            if($res!=false)
	            {
	               return $this->success('添加成功','info/kind_id/'.$kind_id);
	            }
	        }
	        $this->error('添加失败,建议内容不能为空',$url,1);
	    }
	    
	    $this->assign('kind_id',$kind_id);
	    $this->assign('scale',$scale);
	    $this->assign('res1',$res1);  //分类菜单
	    $this->display();
	}
	
	
	
	function _empty()  //空操作
	{
		$t= __ROOT__.'/Public/images/404.png';
		echo "<div style='margin-top:8em;'><center><img src='$t'></center></div>";
	}
}