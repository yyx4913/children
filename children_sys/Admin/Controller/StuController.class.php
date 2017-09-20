<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;

class StuController extends CommonController
{
    public function stu_list() //学生信息列表
    {
    	if(session(admin_name)!=null)
    	{
    		$this->redirect("Stu/all_stu");
    		exit;
    	}
    	if(session(u_name)!=null)
    	{
    		$id= session(u_id);
    		
    		$stu = M('stu_info');   //学生信息
    		$sql1="select count(stu_info.stu_id) from ((stu_info inner join t_stu_info on t_stu_info.stu_id=stu_info.stu_id) inner
    		join user_info ON t_stu_info.u_id=user_info.u_id) WHERE user_info.u_id ='$id' ";
    		$sum= $stu->query($sql1);  //信息量
			$total = $sum[0]["count(stu_info.stu_id)"];
			if($total==0)
			{
				$this->display('Class/class_list');
				exit;
			}
			$per=12;   //每页的信息量
			$page = new \Common\Common\Page($total,$per); 
    		
    		$sql="select stu_info.stu_id,stu_info.stu_num,stu_info.class,stu_info.stu_name,stu_info.sex from ((stu_info inner join t_stu_info on t_stu_info.stu_id=stu_info.stu_id) inner
    		join user_info ON t_stu_info.u_id=user_info.u_id) WHERE user_info.u_id ='$id'  order by stu_info.stu_num  ".$page->limit;
    		$res = $stu->query($sql);
    		$pagelist = $page->fpage();
    		$this->assign('pagelist',$pagelist);
    		$this->assign('res',$res);
    		if(isset($_POST['submit']))
    		{
    			$data['stu_num']= $_POST['stu_num'];
    			$res = $stu->where($data)->select();
    			if($res==null)
    			{
    				$stu_name=$_POST['stu_num'];
                    $res1 = $stu->where('stu_name="'.$stu_name.'"')->select();
                    if($res1==null){
                        echo "<script>alert('没有找到符合条件的信息!');window.location.href='stu_list';</script>";
                    }
                    $this->assign('res',$res1);
                    $this->display();
                    exit;   
    			}else {
    				$this->assign('res',$res);
    				$this->display();
    				exit;
    			}
    			
    		}
    		$this->display();
    	}else {
    		$this->error('请先登录',U('Login/login'),1);
    	}
    }
    
    public function add_stu1() //指定班级添加学生信息页面
    {
    	$map['c_id']=$_GET['c_id'];
    	$class = M('class_info');   // 获取班级信息
    	$info = $class->where($map)->select();
    	
    	//dump($info);
    	$this->assign('info',$info);
    	$this->display();
    }
    public function add_stu2() //任课老师指定班级添加学生信息页面
    {
        $map['c_id']=$_GET['c_id'];
        $class = M('class_info');   // 获取班级信息
        $info = $class->where($map)->select();
        $this->assign('info',$info);
        $this->display();
    }
    
    public function add_stu()   //选择班级添加学生信息页面
    {
    	if((session(u_name)!=null)||($_SESSION['admin_name']!=null))
    	{
    		if(session(u_name)!=null)
    		{
    			$id= session(u_id);
    			$class = M('class_info');   // 获取班级信息
    			$sql="select class_info.c_id,class_info.c_name from ((class_info inner join role_class_info on role_class_info.c_id=class_info.c_id) inner
    			join user_info ON role_class_info.u_id=user_info.u_id) WHERE user_info.u_id ='$id' ";
    			$res = $class->query($sql);
    			
    		}elseif(session(admin_name)!=null)
    		{
    			$class = M('class_info');
    			$res = $class->select();
    		}
    		$this->assign('res',$res);
    		$this->display();
    	}
    	else {
    		$this->error('请先登录',U('Login/login'),1);
    	}
    }
    
    public function addStu_info()   //添加学生
    {
    	if((session(u_name)!=null)||($_SESSION['admin_name']!=null))
    	{
    		if(session(u_name)!=null)
    		{
    			$u_id =session(u_id);
    		}
    		if($_POST['stu_num']!=null)
    		{
    			$stu = M('stu_info');
    			$arr = $stu->getField('stu_id,stu_num'); 
    			if(in_array($_POST['stu_num'], $arr))//判断学号是否重复
    			{
    				 echo '3';
    				 return;
    			}else
    			{
    				if(($_POST['stu_Nm']!=null)&&($_POST['class']!=null)&&($_POST['brith']!=null))
    				{  
    					echo '1';
    					$stu = M('stu_info');
    					$data['stu_num'] =$_POST['stu_num'];
    					$data['stu_name']=$_POST['stu_Nm'];
    					$data['c_id'] =$_POST['class'];  //班级的c_id
    					$map['c_id']=$_POST['class']; //获取班级名称
    					$class = M('class_info');
    					$t_class=M('role_class_info');
    					$u_id=$t_class->where($map)->getField('u_id');  //获取班级对应的班主任信息
    					$cla = $class->where($map)->getField('c_name');
    					//$role  =M('role_class_info');
    					//$u_id  = $role ->where($map)->getField('u_id');//获得对应的班主任id
    					$data['class'] = $cla;
    					$data['stu_pic']=$_POST['pic'];  //头像位置信息
    					if(($data['stu_pic']==null)&&($_POST['sex']=="男"))
    					{
    						$data['stu_pic'] ="/Uploads/Pic/boy.png";
    					}elseif(($data['stu_pic']==null)&&($_POST['sex']=="女"))
    					{
    						$data['stu_pic'] ="/Uploads/Pic/girl.png";
    					}
    					$data['sex'] = $_POST['sex'];
    					$data['brith'] =$_POST['brith'];
    					$data['nation'] =$_POST['nation'];
    					$data['nation_time'] =$_POST['nation_time'];
    					$data['study'] =$_POST['study'];
    					$data['place'] =$_POST['place'];
    					$data['address'] =$_POST['address'];
    					$data['now_address'] =$_POST['now_address'];
    					$data['connect'] = $_POST['connect'];
    					$data['fam_model']=$_POST['fam_model'];
    					$data['live'] =$_POST['live'];
    					$data['educate']=$_POST['educate'];
    					$data['language']=$_POST['language'];
    					$data['p_kind']=$_POST['p_kind'];
    					$data['b_class']=$_POST['level'];
    					foreach($_POST['barriers'] as $i)
    					{
    						$result.= $i.'、';  //将障碍信息转为字串
    					}
    					$result =rtrim($result,'、');  //去除字符串末尾的‘、’
    					if($_POST['other']!=null)
    					{
    						$result.=':'.$_POST['other'];
    					}
    					
    					$data['barrier_kind'] =$result;
    					$data['family_bing']=$_POST['family_bing'];
    					$data['main_problem']=$_POST['main_problem'];
    					$data['contact_with'] =$_POST['contact_with'];
    					$data['guoming']=$_POST['guoming'];
    					$data['other_info']=$_POST['other_info'];
    					
    					$size= $_FILES['other_file']['size'];
    					$type =array("zip","rar");
    					$title= $_FILES['other_file']['name'];
						$data['old_name'] =$title;
    					$file = explode('.',$title);
    					$extension= $file[1];
    					if($size>10){
    					    if(in_array($extension, $type)){
    					        $newTitle = mt_rand(999,100000).'.'.$extension;
    					        $dir = "Uploads/files/".$newTitle;
    					        move_uploaded_file($_FILES["other_file"]["tmp_name"], $dir);
    					        $data['upfile'] =$dir;
    					    }
    					}
    					$last_id= $stu->add($data);
    					
    					
    					$more_info = M("more_value");
                        for($i=0;$i<40;$i++){
                           $data['stu_id']= $last_id;
                           $data['kid']=$i;
                           $data['value']=$_POST["addInfo"][$i];
                           $more_info->add($data); 
    					}   					
    					$t_stu = M('t_stu_info');
    					$data['stu_id']= $last_id;
    					$data['u_id'] =$u_id;
    					$t_stu->add($data);
    					$fam = M('family_info'); //添加家庭成员的信息
    					$data['stu_id']=$last_id;
    					$data['p_kind'] = "父亲";   //父亲的信息
    					$data['p_name']=$_POST['f_name'];
    					$data['p_age'] =$_POST['f_age'];
    					$data['p_job'] =$_POST['f_job'];
    					$data['p_edu'] = $_POST['f_edu'];
    					$data['p_phone'] = $_POST['f_phone'];
    					$data['main'] = '0';
    					if($data['p_name']!=null)
    					{
    						$fam->add($data);
    					}
    					if($_POST['p_na']!=null)
    					{
    						$data['p_kind'] = '家庭成员';   //家庭其他成员信息
    						$data['p_name']=$_POST['p_na'];
    						$data['p_age'] =$_POST['p_age'];
    						$data['p_job'] =$_POST['p_job'];
    						$data['p_edu'] =$_POST['p_edu'];
    						$data['p_phone'] = $_POST['p_phone'];
    						$data['main'] = '2';
    						$fam->add($data);
    					}	

    					$data['p_kind'] = "母亲";   //母亲的信息
    					$data['p_name']=$_POST['m_name'];
    					$data['p_age'] =$_POST['m_age'];
    					$data['p_job'] =$_POST['m_job'];
    					$data['p_edu'] = $_POST['m_edu'];
    					$data['p_phone'] = $_POST['m_phone'];
    					if($data['p_name']!=null)
    					{
    						$fam->add($data);
    					}		
    				}else {
    					echo '2';
    				}
    			}
    		}
    		else{
    			echo '2';
    		}
    	}    	
    }
    
    public function picture()// 上传学生的头像
    {
    	if((session(u_name)!=null)||($_SESSION['admin_name']!=null))
    	{
    		$this->display();
    	}else{
    		$this->error('您没有该没权限！');
    	}
    }
    public function see_stu()  //查看学生详细信息
    {
    	if((session(u_name)!=null)||($_SESSION['admin_name']!=null))
    	{
    	    
    		$stu = M('stu_info');
    		$map['stu_id'] = $_GET['stu_id']; //找出对应学生的详细信息
    		$more = M("more_value")->where($map)->select();
    		$res= $stu->where($map)->select();
    		$t= __ROOT__.'/Public/images/rar.png';
    		if($res[0]["upfile"]!=null){
    		    $file = "<a href='/index.php/Stu/downfile?up={$res[0]["upfile"]}&old={$res[0]["old_name"]}' style='text-decoration:none;'>点击下载：
					<img src='$t'></a>";
    		}else{
    		    $file = '无';
    		}
    		
    		
    		$fam =M('family_info');//家庭成员信息
    			
    		
    		$res4 = $fam->where($map)->select(); //获得家庭其他成员的信息
    			
    		$this->assign('more',$more);
    		$this->assign('res',$res);
    		$this->assign('file',$file);
    		$this->assign('res4',$res4);
    		$this->display();
    	}else{
    		$this->error('请先登录',U('Login/login'),1);
    	}
    }
    
   
    
    public function edit_stu() //编辑学生信息
    {
    	if((session(u_name)!=null)||($_SESSION['admin_name']!=null))
    	{
    		$arr=C("TMPL_PARSE_STRING");
			
    		$stu = M('stu_info');
    		$map['stu_id'] = $_GET['stu_id']; //获取学生对应的id
    		$stu_id = $_GET['stu_id'];
    		$res= $stu->where($map)->select(); //对应学生的信息
    		$role = $res[0]["b_class"]; //障碍等级
    		$arr=[$res[0]["fam_model"],$res[0]["live"],$res[0]["educate"],$res[0]["language"],$res[0]["p_kind"]];
    		$barriers = $res[0]["barrier_kind"];  //障碍种类
    		if($res[0]['old_name']!=null){
    		    $file = '　已有附件：'.$res[0]['old_name']."<span style='color:red;font-size:0.65em;'>
					 　　支持上传文件类型为 　.zip　.rar,大小不大于2MB.</span>";
    		}else{
    		    $file ="<span style='color:red;font-size:0.65em;'>
					　支持上传文件类型为 　.zip　.rar,大小不大于2MB.</span>";
    		}
    		
    		$bar= explode(':', $barriers);  //分离其他障碍的信息

    		$fam =M('family_info');//家庭成员信息
    		$map['p_kind']="父亲";
    		$res1= $fam->where($map)->select();//获得父亲的信息
    		
    		$map['p_kind'] ="母亲";
    		$res2= $fam->where($map)->select(); //获得母亲的信息
    		$map['p_kind'] ="家庭成员";
    		$res4= $fam->where($map)->select(); //获得其他家属的信息
    		$more_info =M("more_value")->where(array('stu_id'=>"$stu_id"))->select();
    		$res3= $fam->where(array('stu_id'=>"$stu_id",'main'=>1))->select(); //获得监护人的信息
    		$this->assign('res',$res);
    		$this->assign('arr',$arr);
    		$this->assign('role',$role);
    		$this->assign('barriers',$bar[0]);  //障碍按钮
    		$this->assign('bar',$bar[1]);  //障碍的其他信息
    		$this->assign('res1',$res1);
    		$this->assign('res2',$res2);
    		$this->assign('more',$more_info);
    		$this->assign('res3',$res3);
    		$this->assign('file',$file);
    		$this->assign('res4',$res4);
    		
    		$this->display();
    	}else{
    		$this->error('请先登录',U('Login/login'),1);
    	}
    }
    public function edit_info(){
        $stu = M('stu_info');
        $fam =M('family_info');//家庭成员信息
        if(isset($_POST['submit']))
        {
            $data['stu_num'] =$_POST['stu_num'];
            $data['stu_name']=$_POST['stu_Nm'];
            $map['c_id']=$_POST['class']; //班级对应的id
            $class = M('class_info');
            $cla = $class->where($map)->getField('c_name');
            $data['class'] = $cla;
        
            $data['stu_pic']=$_POST['pic'];  //头像位置信息
            if(($data['stu_pic']==null)&&($_POST['sex']=="男"))
            {
            	$data['stu_pic'] ="/Uploads/Pic/boy.png";
            }elseif(($data['stu_pic']==null)&&($_POST['sex']=="女"))
            {
            	$data['stu_pic'] ="/Uploads/Pic/girl.png";
            }
            $data['sex'] = $_POST['sex'];
            $data['brith'] =$_POST['brith'];
            $data['nation'] =$_POST['nation'];
            $data['nation_time'] =$_POST['nation_time'];
            $data['study'] =$_POST['study'];
            $data['place'] =$_POST['place'];
            $data['address'] =$_POST['address'];
            $data['now_address'] =$_POST['now_address'];
            $data['connect'] = $_POST['connect'];
            $data['fam_model']=$_POST['fam_model'];
            $data['live'] =$_POST['live'];
            $data['educate']=$_POST['educate'];
            $data['language']=$_POST['language'];
            $data['p_kind']=$_POST['p_kind'];
            $data['b_class']=$_POST['level'];
            foreach($_POST['barriers'] as $i)
            {
            	$result.= $i.'、';  //将障碍信息转为字串
            }
            $result =rtrim($result,'、');  //去除字符串末尾的‘、’
            if($_POST['other']!=null)
            {
            	$result.=':'.$_POST['other'];
            }
            $data['barrier_kind'] =$result;
            $data['b_class']=$_POST['level'];
            $data['family_bing']=$_POST['family_bing'];
            $data['main_problem']=$_POST['main_problem'];
            $data['guoming']=$_POST['guoming'];
            $data['contact_with'] =$_POST['contact_with'];
            $data['other_info']=$_POST['other_info'];
            $size= $_FILES['other_file']['size'];
            $type =array("zip","rar");
            $title= $_FILES['other_file']['name'];
            $data['old_name'] =$title;

            $file = explode('.',$title);
            $extension= $file[1];
            if($size>10){
                if(in_array($extension, $type)){
                    $newTitle = mt_rand(999,100000).'.'.$extension;
                    $dir = "Uploads/files/".$newTitle;
                    move_uploaded_file($_FILES["other_file"]["tmp_name"], $dir);
                    $data['upfile'] =$dir;
                }
            }
           
            $map['stu_id']=$_POST['stu_id'];
            $stu->where($map)->save($data);
        
            $stu_id=$_POST['stu_id'];
             
            $p_id=$fam->where(array('stu_id'=>"$stu_id",'p_kind'=>'父亲','main'=>0))->getField('p_id'); //判断母亲信息是否为空
            $data['p_kind']="父亲";
            $data['p_name']=$_POST['f_name'];
            $data['p_age']=$_POST['f_age'];
            $data['p_job']=$_POST['f_job'];
            $data['p_edu']=$_POST['f_edu'];
            $data['p_phone']=$_POST['f_phone'];
            $data['stu_id']=$stu_id;
            $data['main'] =0;
            
            if($p_id==null)
            {
            	$fam->add($data);  //没有则添加
            }else{
            	$fam->where('p_id='.$p_id)->save($data); //更新数据
            }
            $p_id1=$fam->where(array('stu_id'=>"$stu_id",'p_kind'=>'母亲','main'=>0))->getField('p_id'); //判断母亲信息是否为空
            $data['p_kind']="母亲";
            $data['p_name']=$_POST['m_name'];
            $data['p_age']=$_POST['m_age'];
            $data['p_job']=$_POST['m_job'];
            $data['p_edu']=$_POST['m_edu'];
            $data['stu_id']=$stu_id;
            $data['p_phone']=$_POST['m_phone'];
            if($p_id1==null)
            {
            	$fam->add($data);
            }else{
            	$fam->where('p_id='.$p_id1)->save($data); //更新数据
            }
            $p_id2=$fam->where(array('stu_id'=>"$stu_id",'main'=>1))->getField('p_id'); //判断母亲信息是否为空
            $data['main'] = 1;
            $data['stu_id']=$stu_id;
            $data['p_kind']='家庭成员';
            $data['p_name']=$_POST['p_na'];
            $data['p_age']=$_POST['p_age'];
            $data['p_job']=$_POST['p_job'];
            $data['p_edu']=$_POST['p_edu'];
            $data['p_phone']=$_POST['p_phone'];
            if($p_id2==null)
            {
                $fam->add($data);
            }else{
                $fam->where('p_id='.$p_id2)->save($data); //更新数据
            }
            $more_info = M("more_value");
            $res= $more_info->where('stu_id='.$stu_id)->select();
            if(count($res)==0){
                for($i=0;$i<40;$i++){
                    $data['stu_id']= $stu_id;
                    $data['kid']=$i;
                    $data['value']=$_POST["addInfo"][$i];
                    $more_info->add($data);
                }
            }else{
                for($i=0;$i<40;$i++){
                    $data['value']=$_POST["addInfo"][$i];
                    $more_info->where(array('stu_id'=>$stu_id,'kid'=>$i))->save($data);
                } 
            }
            if(session(u_name)!=null)
            {
            	//$this->redirect('stu_list','',1,'修改成功!!');
            	$this->success('修改成功！',U("Stu/stu_list"),1);
            }else{
            	$this->success('修改成功！',U("Stu/all_stu"),1);
            	//$this->redirect('all_stu','',1,'修改成功!!');
            }
            exit;
        }
    }
    
    
    function del_stu()   //班主任删除学生信息
    {
    	if(session(u_name)!=null)
    	{
    		$stu = M('stu_info');
    		$data['stu_id']= $_GET['stu_id'];
    		$data['u_id'] =session('u_id');
  
    		$t_stu = M('t_stu_info');
    		$t_stu ->where($data)->delete();
    		
    		$this->success('删除成功！',U("Stu/stu_list"),1);
    			
    	}else{
    		//$this->error('请先登录',U('Login/login'),1);
    		$this->error('请先登录',U('Login/login'),1);
    	}
    }
   	function all_stu()  //所有的学生信息
   	{
   		if(session(admin_name)!=null)
   		{
   			$stu = M('stu_info');
   			$total=$stu->count();   //学生的总数
   			
   			if($total==0)
   			{
   				$this->display('Stu/noStu');
   				exit;
   			}
   			$per=16;   //每页的信息量
   			$page = new \Common\Common\Page($total,$per);
   			$sql ="select c_id,stu_id,stu_num,sex,stu_name,class from stu_info  order by stu_info.class  ".$page->limit;
   			$info= $stu->query($sql);
   			$pagelist = $page->fpage(); 
   			$this->assign('pagelist',$pagelist);
   			$this->assign('info',$info);
   			
   			if(isset($_POST['submit']))
   			{
   				$data['stu_num']= $_POST['stu_num'];
   				$res = $stu->where($data)->select();
   				if($res==null)
   				{
   				    $stu_name=$_POST['stu_num'];
   				    $res1 = $stu->where('stu_name="'.$stu_name.'"')->select();
   				    if($res1==null){
   				        echo "<script>alert('没有找到符合条件的信息!');window.location.href='all_stu';</script>";
   				    }
   				    $this->assign('info',$res1);
   				    $this->display();
   				    exit;	
   				}else {
   					$this->assign('info',$res);
   					$this->display();
   					exit;
   				}
   				 
   			}
   			$this->display();
   			
   		}
   		else{
   			$this->error('请先登录',U('Login/login'),1);
   		}
   	}
   	
   	function del_stu1() //管理员删除学生信息
   	{
   		if(session(admin_name)!=null)
   		{
   			$arr =explode('&', $_GET['stu_id']); //获得学生的id和班级的id
   			//$map['stu_id'] =$arr[0]; 
   			$map['c_id'] =$arr[1];
   			$t_class = M('role_class_info');
   			$u_id = $t_class->where($map)->getField('u_id'); // 获得对应的班级id
   			$map['u_id'] = $u_id ;
   			$map['stu_id']=$arr[0];
   			$stu_id = $map['stu_id'];
   			$fam =M('family_info');
   			$info= $fam->where($map)->select();
   			foreach($info as $v1)
   			{
   				$map[p_id]= $v1["p_id"]; //获得家庭信息对应的id
   				$fam ->where($map)->delete();
   			}
   			$t_stu = M('t_stu_info');
   			$t_stu ->where($map)->delete();  //删除教师与学生的对应关系
   			$direction = M('physical_direction');
   			$direction->where(array('stu_id'=>"$stu_id"))->delete(); //删除学生的康复走向
   			$plan = M('health_plan');
   			$plan->where(array('stu_id'=>"$stu_id"))->delete();  //删除学生计划
   			$record = M('assess_record'); 
   			$arr1 = $record->where(array('stu_id'=>"$stu_id"))->select();//对应的评估记录
   		    //删除对应的评估记录的具体值
   		    $values = M('item_values');
   		    foreach($arr1 as $v2)
   		    {
   		        $map[a_id]= $v2["a_id"];
   		        $values->where($map)->delete();
   		    }
   			//删除学生的评估记录
   			$record->where(array('stu_id'=>"$stu_id"))->delete();
   			$other_values =M('other_items_value');
   			$other_values->where(array('stu_id'=>"$stu_id"))->delete();//删除对应的其他表的记录
   			$map['stu_id']=$arr[0];
   			$stu = M('stu_info');
   			$stu->where($map)->delete();  //删除在学生表中的具体信息
   			
   			if(cookie('stu_id')==$arr[0])//清除已有的cookie值
   			{
   			    cookie('stu_id',null);
   			}
   			M("sheet")->where('stu_id='.$stu_id)->delete();//删除对学生的分析信息
   			
   			$more = M("more_value");
   			$more->where('stu_id='.$stu_id)->delete(); //删除学生附加信息
   			M("plan")->where('stu_id='.$stu_id)->delete(); //删除教育计划
   			//M("suggest")->where('stu_id='.$stu_id)->delete();//删除建议
   			
   			$this->success('删除成功！',U("Stu/all_stu"),1);
   		}else{
   			$this->error('请先登录',U('Login/login'),1);
   		}
   	}
   	
   	function stu_list1()  //任课老师的页面
   	{
   		if(session(u_name)!=null)
   		{
   			$t_id = session(u_id);
   			$team= M('teach_team');
   			$sql="select class_info.c_id from (class_info inner join teach_team on teach_team.c_id = class_info.c_id)
   					inner join user_info on user_info.u_name = teach_team.t_name where user_info.u_id='$t_id' ";
   			$res= $team->query($sql);//获得对应的班级id
   			//dump($res);
   			$stu =M('stu_info');
   			$total =0;
   			foreach ($res as $v)
   			{
   				$data['c_id']=$v["c_id"];
   				$num=$stu->where($data)->count();
   				$total+=$num;
   			}
			
   			$per=12;   //每页的信息量
   			$page = new \Common\Common\Page($total,$per);
   			
   			
   			foreach ($res as $v1) {
    			foreach ($v1 as $v2) {
    				$sql1 = "select stu_info.stu_id,stu_info.stu_num,stu_info.class,stu_info.stu_name,stu_info.sex,stu_info.c_id from stu_info inner join class_info on 
    				stu_info.c_id =class_info.c_id where class_info.c_id='$v2' order by class_info.c_name ".$page->limit;
    				$res1[]=$stu->query($sql1); //获取班级对应的学生信息
    			}
   			}

   			if(isset($_POST['submit']))
   			{
   				$data['stu_num']= $_POST['stu_num'];
   				$res = $stu->where($data)->select();
   				$arr[]=$res ; 
   				if($res==null)
   				{
                    $stu_name=$_POST['stu_num'];
                    $res1 = $stu->where('stu_name="'.$stu_name.'"')->select();
                    if($res1==null){
                        echo "<script>alert('没有找到符合条件的信息!');window.location.href='stu_list1';</script>";
                    }
                    $this->assign('res',$res1);
                    $this->display();
                    exit;   
   				}else {
   					$this->assign('res',$arr);
   					$this->display();
   					exit;
   				}
   			
   			}
   			$this->assign('res',$res1);
   			
   			$pagelist = $page->fpage();
			$this->assign('pagelist',$pagelist);
   			$this->display();
   		}
   		else{
   			$this->error('请先登录',U('Login/login'),1);
   		}
   	}

   	public function checkNm()  //验证学生学号
   	{
   		$stu = M("stu_info");
   		$arr = $stu->getField('stu_id,stu_num');
   		if(in_array($_POST['n'], $arr))
   		{
   			$in = "<span style='font-size:0.7em;'>该学号已存在，请更换！";
   		}else{
   			$in="<span style='color:green;font-size:0.7em;'>✔,符合</span>";
   		}
   		echo $in;
   	}
   	
   	public function up()  //上传文件函数
   	{
   		$upload = new Upload(); //实例化上传类
   		$upload->maxSize = 3145728; //允许上传文件的大小
   		$upload->exts = array('jpg','jpeg','png'); //文件类型
   		$upload ->savePath = '/Pic/'; // 头像存储路径
   		$info  =$upload->upload();
   		if(!$info)
   		{
   			
   		}else{
   			foreach ($info as $file)
	 		$notice_file= $file['savepath'].$file['savename'];
   		}
   		return $notice_file;
   	}
   	 
   	public function more()  //添加学生家庭成员信息
   	{
   		if((session(u_name)!=null)||($_SESSION['admin_name']!=null))
   		{
   		   
   			$fam = M('family_info');
   			$stu_id= $_GET['stu_id'];
   			$this->assign('stu_id',$stu_id);  //获取学生的id
   			$data['main']='2';
   			if(isset($_POST['submit']))
   			{
   			    $stu_id=$_POST['stu_id'];
   				$data['stu_id']= $stu_id;
   				//echo $_POST['relation1'].$_POST['name1'].$_POST['age1'].$_POST['job1'].$_POST['edu1'].'<br/>';
   				if($_POST['name1']!=null)
   				{
   					$data['p_kind']=$_POST['relation1'];
   					$data['p_name']=$_POST['name1'];
   					$data['p_age']=$_POST['age1'];
   					$data['p_job']=$_POST['job1'];
   					$data['p_edu']=$_POST['edu1'];
   					if(($data['p_kind']=="父亲")||($data['p_kind']=="母亲"))
   					{
   						$data['main']='0';
   					}
   					$fam->add($data);
   				}
   				if($_POST['name2']!=null)
   				{
   					$data['p_kind']=$_POST['relation2'];
   					$data['p_name']=$_POST['name2'];
   					$data['p_age']=$_POST['age2'];
   					$data['p_job']=$_POST['job2'];
   					$data['p_edu']=$_POST['edu2']; 	
   					if(($data['p_kind']=="父亲")||($data['p_kind']=="母亲"))
   					{
   						$data['main']='0';
   					}
   					$fam->add($data);
   				}
   				if($_POST['name3']!=null)
   				{
   					$data['p_kind']=$_POST['relation3'];
   					$data['p_name']=$_POST['name3'];
   					$data['p_age']=$_POST['age3'];
   					$data['p_job']=$_POST['job3'];
   					$data['p_edu']=$_POST['edu3'];
   					if(($data['p_kind']=="父亲")||($data['p_kind']=="母亲"))
   					{
   						$data['main']='0';
   					}
   					$fam->add($data);
   				}
   				//$this->redirect('fam_info','',1,'添加成功...');
   				
   				$this->success('添加成功！！',U("Stu/fam_info/stu_id/{$stu_id}"),1);
   				exit;
   			}
   			
   			$this->display();
   		}else{
   			$this->error('请先登录',U('Login/login'),1);
   		}
   	}
   	
   	public function fam_info()  //家庭成员信息
   	{
   		if((session(u_name)!=null)||($_SESSION['admin_name']!=null))
   		{
	   		$data['stu_id'] = $_GET['stu_id'];
	   		$stu_id =$_GET['stu_id'];
	   		$fam = M('family_info');
	   		$res = $fam->where($data)->select();
	   		$this->assign('res',$res);
	   		$this->assign('stu_id',$stu_id);
	   		$this->display();
   		}
   		else{
   			$this->error('请先登录',U('Login/login'),1);
   		}
   	}
   	
   	public function all_info()//学生信息汇总
   	{
   	    if((session(u_name)!=null)||($_SESSION['admin_name']!=null))
   	    {
   	        $record = M('assess_record');
   	    
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
   	            $stu_id=cookie(stu_id);
   	            $plans=$this->Eduplan($stu_id);//个别化教育计划集合
   	            $ass = M("assess_record")->where('stu_id='.$stu_id)->order('a_id desc')->find();
   	            
   	            $sheet=$this->sheet($stu_id);
   	            $map['stu_id'] = $stu_id; //找出对应学生的详细信息
   	            $res= $stu->where($map)->select();
   	            $fam =M('family_info');//家庭成员信息
   	            $res4 = $fam->where($map)->select(); //获得家庭其他成员的信息
   	            $more = M("more_value")->where($map)->select();
   	            $info = $this->getPic();
   	            $arr = $info[0];
   	            $arr1 = $info[1];
   	            $info1=$this->act();
   	            $info2 =$this->cyc();
   	            $info3 = $this->allPlan($stu_id); //教育计划
   	            $this->assign('arr',$arr);
   	            $this->assign('arr1',$arr1);
   	            $this->assign('img',$info1[2]);
   	            $this->assign('res',$info1[3]);
   	            $this->assign('p',$info1[0]);
   	            $this->assign('e',$info1[1]);
   	            $this->assign('res1',$info2[0]);
   	            $this->assign('img1',$info2[2]);
   	            $this->assign('info',$info3);
   	            $this->assign('res',$res);
                $this->assign('more',$more);
   	            $this->assign('res4',$res4);
   	            $this->assign('power',$sheet[0]);
   	            $this->assign('status',$sheet[1]);
   	            $this->assign('aim',$sheet[2]);
   	            $this->assign('plan',$plans);
   	            $this->assign('ass',$ass);
   	        }
   	        $this->display();
   	    }else{
   	        $this->error('请先登录',U('Login/login'),1);
   	    }
   	}
   	
   	public function sheet($stu_id){  //评估分析表
   	    
   	    for($i=1;$i<9;$i++){
   	        $sh[] = M("sheet")->where(array('stu_id'=>$stu_id,'kind_id'=>$i))->order('a_id desc')->find();
   	    }
   	    foreach($sh as $k=>$v){
   	        $power[$k]=explode('??//??',$v["power"]);
   	        $status[$k]=explode('??//??',$v["status"]);
   	        $aim[$k]=$v["aim"];
   	    }
   	    $arr=[$power,$status,$aim];
//     	    dump($arr[0]);exit;
   	    return $arr;
   	}
   	
   	public function Eduplan($stu_id){  //个别化教育计划集合
   	    for($i=1;$i<9;$i++){
   	        $pla[] = M("plan")->where(array('stu_id'=>$stu_id,'kind_id'=>$i))->order('a_id desc')->find();
   	    }
   	    foreach($pla as $k=>$v){
   	        $a_id =$v["a_id"];
   	        if($a_id==null){
   	            $a[]='无';
   	        }else{
   	            $a[]=M("assess_record")->where('a_id='.$a_id)->getField(e);
   	        }
   	    }
   	    for($i=0;$i<count($a);$i++){
   	        if($a[$i]=='无'){
   	            continue;
   	        }else{
   	            $a[$i]=explode(',',$a[$i]);
   	        }
   	    }
   	    foreach($a as $k=>$v){
   	        if($v =='无'){ $s_id[$k][]='无'; continue; }
   	        for($i=0;$i<count($v)-1;$i++){
   	            $s_id[$k][]=M("items")->where('item_id='.$v[$i])->getField(s_id);
   	        }
   	    }
   	    for($i=0;$i<count($s_id);$i++){
   	        $s_id[$i]=array_unique($s_id[$i]); 
   	        //$s_title[$k][]=M("scales")->where('s_id='.$s_id)->getField(s_title);
   	    }
   	    for($i=0;$i<count($s_id);$i++)  //重新排列下标
   	    {
   	        $z=0;
   	        $m=max(array_keys($s_id[$i]));
   	        for($j=0;$j<$m+1;$j++)
   	        {
   	            if($s_id[$i][$j]!=''){
   	                $zs[$i][$z]=$s_id[$i][$j];
   	                ++$z;
   	            }
   	        }
   	    }
   	    foreach($zs as $k=>$v){
   	        foreach($v as $k1=>$v1){
   	            if($v1 =='无'){$s_title[$k][]='无'; continue;}
   	            $s_title[$k][]=M("scales")->where('s_id='.$v1)->getField(s_title);
                for($i=0;$i<count($a[$k])-1;$i++){
                    $s_id =M("items")->where('item_id='.$a[$k][$i])->getField(s_id);
                    if($s_id == $v1){
                       $item_title = M("items")->where('item_id='.$a[$k][$i])->getField(item_title); 
                        $items[$k][$k1][]= $item_title;
                    }
                }
//    	            
   	        }
   	    }
   	    $kind=['感知觉','粗大动作','精细动作','语言与沟通','认知','社会交往','生活自理','情绪与行为'];
//    	    dump($zs);
//    	    dump($items);
   	    $res =[$kind,$s_title,$items,$pla];
   	    return $res;
   	    
   	}
   	
   	
   	public function  downfile()
    {

     ob_start(); 
     $filename=$_GET['up'];
     $arr = explode('/',$filename);
     $file=$_GET['old'];
     $date=date("Ymd-H:i:m");
     header( "Content-type:  application/octet-stream "); 
     header( "Accept-Ranges:  bytes "); 
     header( "Content-Disposition:  attachment;  filename= {$file}"); 
     $size=readfile($filename); 
     header( "Accept-Length: " .$size);
    }

   	
	function _empty()  //空操作
	{
		$t= __ROOT__.'/Public/images/404.png';
		echo "<div style='margin-top:8em;'><center><img src='$t'></center></div>";
	}
}
