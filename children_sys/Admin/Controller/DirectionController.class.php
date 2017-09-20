<?php
namespace Admin\Controller;
use Think\Controller;


class DirectionController extends Controller
{
    public function validate(){
        if((session(u_name)!=null)||($_SESSION['admin_name']!=null))
        {
            if((($_GET['stu_id']!=null)&&(cookie('stu_id')==null))||
                (($_GET['stu_id']!=null)&&($_GET['stu_id']!=cookie('stu_id'))))
            {
                cookie('stu_id',$_GET['stu_id']);
            }
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
                    $a="no";
                }
            }else{
                 $a='ok';
            }
            return $a;
        }else{
            $this->error('请先登录',U('Login/login'),1);
        }
    }
    
	public function dir()
	{
		$a=$this->validate();
		if($a=='ok'){
		    $stu = M('stu_info');
		    $data['stu_id'] = cookie('stu_id');
		    $res = $stu->where($data)->find();
		    $direction =M("physical_direction");
		    $dir = $direction->where('stu_id='.cookie(stu_id))->select();  
		    $this->assign('res',$res);
		    if(count($dir)>0){
		        for($i=0;$i<count($dir);$i++){
		            $ci =$i+1;
		            $num[]="<a href='see_dir?d_id={$dir[$i]["d_id"]}'>第&nbsp;$ci&nbsp;次 &nbsp;&nbsp;后续跟踪调查表";
		        }
		        $this->assign('num',$num);
		        $this->display('dirList');
		        exit;
		    }else{
		        $this->display();
		    }
		}		
	}
	
	public function add_dir(){
	    $a=$this->validate();
	    if($a=='ok'){
	        $stu = M('stu_info');
	        $data['stu_id'] = cookie('stu_id');
	        $res = $stu->where($data)->find();
	        $this->assign('res',$res);
	        $this->display('dir');
	    }
	}
	
	public function add_info()
	{
	    $a=$this->validate();
	    if($a=='ok'){
	         $d_id=$_POST['d_id'];
    	     $direction =M("physical_direction");
    	     $data['stu_id']=cookie(stu_id);
    	     $data['graduate']=$_POST['graduate'];
    	     $data['left_time']=$_POST['left_time'];
    	     $data['level']=$_POST['level'];
    	     if($_POST['school'][2]!=null){
    	         $data['school']=$_POST['school'][2];
    	         $data['time'] =$_POST['time'][2];
    	     }elseif ($_POST['school'][1]!=null){
    	         $data['school']=$_POST['school'][1];
    	         $data['time'] =$_POST['time'][1];
    	     }elseif ($_POST['school'][0]!=null){
    	         $data['school']=$_POST['school'][0];
    	         $data['time'] =$_POST['time'][0];
    	     }
    	     $data['person']=$_POST['person'];
    	     $data['phone']=$_POST['phone'];
    	     $data['place']=$_POST['place'];
    	     $data['way']=implode('、', $_POST['way']);
    	     $data['action']=implode('??/!/??', $_POST['action']);
    	     $data['teller']=$_POST['teller'];
    	     $data['tell']=$_POST['tell'];
    	     if($d_id !=null){
    	       $map['d_id'] = $d_id;
    	       $direction->where($map)->save($data);
    	       $this->success('修改成功',U("Direction/dir"),1);
    	       exit;
    	     }else{
    	         $direction->add($data);
    	         $this->success('添加成功',U("Direction/dir"),1);
    	     }
	    }
	}
	
	public function see_dir(){
	    $a=$this->validate();
	    if($a=='ok'){
	        $d_id = $_GET['d_id'];
	        $stu = M('stu_info');
	        $data['stu_id'] = cookie('stu_id');
	        $res = $stu->where($data)->find();
	        $direction =M("physical_direction");
            $res1=$direction->where('d_id='.$d_id)->find();
	        $action =explode('??/!/??',$res1['action']);
            $this->assign('res',$res);
	        $this->assign('res1',$res1);
	        $this->assign('action',$action);
	        $this->display();
	    }
	}
	
	public function edit_dir()
	{
	    $a=$this->validate();
	    if($a=='ok'){
	        $d_id= $_POST['d_id'];
	        $stu = M('stu_info');
	        $data['stu_id'] = cookie('stu_id');
	        $res = $stu->where($data)->find();
	        $direction =M("physical_direction");
	        $res1=$direction->where('d_id='.$d_id)->find();
	        $action =explode('??/!/??',$res1['action']);
	        $this->assign('d_id',$d_id);
	        $this->assign('res',$res);
	        $this->assign('res1',$res1);
	        $this->assign('action',$action);
	        $this->display();
	    }
	}
	
	
	function _empty()  //空操作
	{
		$t= __ROOT__.'/Public/images/404.png';
		echo "<div style='margin-top:8em;'><center><img src='$t'></center></div>";
	}
}