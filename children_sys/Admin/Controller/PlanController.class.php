<?php
namespace  Admin\Controller;
use Think\Controller;


class PlanController extends Controller{
	public function index()
	{
 		if((session(u_name)!=null)||($_SESSION['admin_name']!=null))
 		{
 			if((($_GET['stu_id']!=null)&&(cookie('stu_id')==null))||
	            (($_GET['stu_id']!=null)&&($_GET['stu_id']!=cookie('stu_id'))))
	        {
	            cookie('stu_id',$_GET['stu_id']);
	        }
	        	
	        if(cookie('stu_id')==null)
	        {
	            if(session(admin_name)!=null)
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
 			    $plan =M('health_plan');
				$stu = M('stu_info');
				$data['stu_id'] = cookie(stu_id);
				$stu_name = $stu ->where($data)->getField('stu_name');
				$res =M("health_plan")->where($data)->select();
				$this->assign('stu_name',$stu_name);
				if($res!=null){
				    $this->redirect('see_plan');
				}else{
				    $this->display();
				}
			}
		}else{
			$this->error('请先登录',U('Login/login'),1);
		}
	}
	
	public function add_info()
	{
	    if(cookie('stu_id')==null)
	    {
	       if(session(admin_name)!=null)
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
	       $plan = M('health_plan');
	       $data['stu_id']=cookie('stu_id');
	       $data['theme']=$_POST['theme'];
	       $data['Mteacher']=$_POST['Mteacher'];
	       $data['Fteacher']=$_POST['Fteacher'];
	       $data['time']=$_POST['time'];
	       //dump($_POST['teach_way']);exit;
	       foreach($_POST['teach_way'] as $v){
	           $data['teach_way'].=$v.'、';
	       }
	       foreach($_POST['analyse'] as $v){
	           $data['analyse'].=$v.'??///??!';
	       }
	       foreach($_POST['aim'] as $v){
	           $data['aim'].=$v.'??///??!';
	       }
	       $data['ready']=$_POST['ready'];
	       $data['importance']=$_POST['importance'];
	       $data['difficult']=$_POST['difficult'];
	       foreach($_POST['teach'] as $v){
	           $data['teach'].=$v.'??///??!';
	       }
	       foreach($_POST['appraise'] as $v){
	           $data['appraise'].=$v.'??///??!';
	       }
	       $map['stu_id']=cookie('stu_id');
	       $res = $plan->where($map)->select();
	       if($res !=null){
	           $plan->where($map)->save($data);
	           $this->success('修改成功',U("see_plan"),1);
	           exit;
	       }else{
	           $plan->add($data);
	           $this->success('添加成功',U("see_plan"),1);
	       } 
	   }
	}
	
	public function see_plan()  //查看计划
	{
	    if((session(u_name)!=null)||($_SESSION['admin_name']!=null))
	    {
	        $plan = M('health_plan'); //康复计划
	        	
	        if((($_GET['stu_id']!=null)&&(cookie('stu_id')==null))||
	            (($_GET['stu_id']!=null)&&($_GET['stu_id']!=cookie('stu_id'))))
	        {
	            cookie('stu_id',$_GET['stu_id']);
	        }
	        	
	        if(cookie('stu_id')==null)
	        {
	            if(session(admin_name)!=null)
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
	            $stu = M('stu_info');
	            $stu_id= cookie(stu_id);
	            $data['stu_id'] = cookie(stu_id);
	            $stu_name = $stu ->where($data)->getField('stu_name');
	            $this->assign('stu_name',$stu_name);
	            $plan = M('health_plan'); //康复计划
	            $res = $plan->where($data)->select();
	            
	            $teach_way=explode('、', $res[0]["teach_way"]);
	            
	            $analyse = explode('??///??!', $res[0]["analyse"]);
	            
	            $aim = explode('??///??!', $res[0]["aim"]);
	            $teach = explode('??///??!', $res[0]["teach"]);
	            $appraise = explode('??///??!', $res[0]["appraise"]);
	            $this->assign('teach_way',$teach_way);
	            $this->assign('res',$res);
	            $this->assign('analyse',$analyse);
	            $this->assign('aim',$aim);
	            $this->assign('teach',$teach);
	            $this->assign('appraise',$appraise);
	            $this->display();
	        }  
	    }else{
			$this->error('请先登录',U('Login/login'),1);
		}
	}
	
	public function edit_plan()
	{
	if((session(u_name)!=null)||($_SESSION['admin_name']!=null))
	    {
	        $plan = M('health_plan'); //康复计划
	        	
	        if((($_GET['stu_id']!=null)&&(cookie('stu_id')==null))||
	            (($_GET['stu_id']!=null)&&($_GET['stu_id']!=cookie('stu_id'))))
	        {
	            cookie('stu_id',$_GET['stu_id']);
	        }
	        	
	        if(cookie('stu_id')==null)
	        {
	            if(session(admin_name)!=null)
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
	            $stu = M('stu_info');
	            $stu_id= cookie(stu_id);
	            $data['stu_id'] = cookie(stu_id);
	            $stu_name = $stu ->where($data)->getField('stu_name');
	            $this->assign('stu_name',$stu_name);
	            $plan = M('health_plan'); //康复计划
	            $res = $plan->where($data)->select();
	            
	            $teach_way=explode('、', $res[0]["teach_way"]);
	            
	            $analyse = explode('??///??!', $res[0]["analyse"]);
	            
	            $aim = explode('??///??!', $res[0]["aim"]);
	            $teach = explode('??///??!', $res[0]["teach"]);
	            $appraise = explode('??///??!', $res[0]["appraise"]);
	            $this->assign('teach_way',$teach_way);
	            $this->assign('res',$res);
	            $this->assign('analyse',$analyse);
	            $this->assign('aim',$aim);
	            $this->assign('teach',$teach);
	            $this->assign('appraise',$appraise);
	            $this->display();
	        }  
	    }else{
			$this->error('请先登录',U('Login/login'),1);
		}
	}
	
	function _empty()  //空操作
	{
		$t= __ROOT__.'/Public/images/404.png';
		echo "<div style='margin-top:8em;'><center><img src='$t'></center></div>";
	}
	
}