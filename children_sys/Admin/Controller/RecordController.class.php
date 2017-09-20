<?php
namespace Admin\Controller;

class RecordController extends CommonController{
	public function show_record()   //获取学生的测试记录信息
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
    			if($_GET['kind_id']==null)
    			{
    				$_GET['kind_id']=1;
    			}
    			$scale_kind = M('scale_kind');
    			$res1 = $scale_kind->limit(8)->select();  //分类菜单
    			$data['stu_id']=cookie('stu_id');
    			$stu_id =cookie('stu_id');
    			$stu = M('stu_info');
    			$stu_name = $stu->where($data)->getField('stu_name');
    			$per=8;   //每页的信息量
    			$kind_id = $_GET['kind_id'];
    			if($_GET['kind_id']<15)
    			{
    				$data['kind_id']= $_GET['kind_id'];
    				$kind_name = $scale_kind->where($data)->getField('kind_name');
    				$res2=$record ->where($data)->order('a_time')->select();
    				$total = count($res2);  //信息的总量
    				$page = new \Common\Common\Page($total,$per);
    				$sql1 = "select * from assess_record where kind_id ='$kind_id' and stu_id='$stu_id' order by a_time  ".$page->limit;;
    				$res=$record->query($sql1);
    			}else{
    				$kind_name = '其他';
    				$res2=$record ->where('kind_id>8')->order('a_time')->select();
    				$total = count($res2);  //信息的总量
    				$page = new \Common\Common\Page($total,$per);
    				$sql1 = "select * from assess_record where kind_id >'8' and stu_id='$stu_id' order by a_time  ".$page->limit;;
    				$res=$record->query($sql1);
    			}
    			$pagelist = $page->fpage();
    			$this->assign('pagelist',$pagelist);
	    		$this->assign('res',$res);  //获取测试记录表
	    		$this->assign('res1',$res1);  //分类菜单
	    		$this->assign('kind_name',$kind_name);//对应的表头
	    		$this->assign('stu_name',$stu_name); //获取备试的姓名
	    		//$this->assign('kind_id',$kind_id);
    		}
    		if(session(admin_name)=='admin'){
    		    $this->display();
    		}else{
    		    $this->display('show_record1');
    		}
    		
    	}
    	else{
    		$this->error('请先登录',U('Login/login'),1);
    	}
	}
	
	public function add_record()  //添加对应的评估记录
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
				$stu_age = $stu->where($data)->getField('brith');
				$res=$record ->where($data)->order('a_id desc')->limit(3)->select(); //显示最新三次测试记录
				$this->assign('res',$res);  //获取测试记录表
				$this->assign('res1',$res1);  //分类菜单
				$this->assign('kind_name',$kind_name);//对应的表头
				$this->assign('stu_name',$stu_name); //获取备试的姓名
				$this->assign('kind_id',$kind_id);  //获得大分类的id
				
				if(isset($_POST['submit']))
				{
				    $assess_record = M('assess_record'); //学生测试表
				  
				    $time=strtotime(date('Y-m-d',time()));
				    $age =floor(($time- strtotime($stu_age))/2592000); //将获得时间转化为月
				    $year = floor($age/12);
				    $month = $age-12*$year;
				    $stu_age= $year.'岁'.$month.'月'; //学生的测试年龄
				    if(session(admin_name)==null)
				    {
				        $data['a_er'] = session(u_name);
				    }else{
				        $data['a_er'] = session(admin_name);
				    }
				    $data['a_time'] = date('Y-m-d',time());  //获取时间
				    $data['a_age']  = $stu_age;
				    $a_id=$assess_record->add($data);  //插入数据得到的id
				    $this->redirect("Record/scale?kind_id={$kind_id}&a_id={$a_id}");
					exit;
				}
			}
    		$this->display();	 
		}else{
    		$this->error('请先登录',U('Login/login'),1);
    	}
	}
	
	
	public function scale()  //最终生成的量表
	{
		if((session(u_name)!=null)||(session(admin_name)!=null))
		{
			$data['kind_id']= $_GET['kind_id'];  //对应的大分类id
			$kind_id  = $_GET['kind_id'];
			$a_id  = $_GET['a_id']; //对应的测试记录id
			$scale_kind = M('scale_kind');
			$res = $scale_kind->limit(8)->select(); 
			$kind_name = $scale_kind->where($data)->getField('kind_name');
			$stu = M('stu_info');
			$data['stu_id'] = cookie('stu_id');
			$stu_name = $stu->where($data)->getField('stu_name');
			$this->assign('res',$res);  //对应的大分类
			$this->assign('kind_name',$kind_name);//对应的表头
			$this->assign('stu_name',$stu_name);
			$this->assign('kind_id',$kind_id);
			$this->assign('a_id',$a_id);
			$items = M('items');
			switch($_GET['kind_id'])
			{
				case 1:
					$res2=$items->where('item_id'<81)->select();
					$this->assign('res2',$res2);
					$this->display('gz_scale');
					break;
				case 2:
					$res2=$items->where('item_id <153 AND item_id>80')->select();
			 		$this->assign('res2',$res2);
					$this->display('cd_scale');
					break;
				case 3:
					$res2=$items->where('item_id <298 AND item_id>231')->select();
					$this->assign('res2',$res2);
					$this->display('jx_scale');
					break;
				case 4:
					$res2=$items->where('item_id <232 AND item_id>152')->select();
					$this->assign('res2',$res2);
					$this->display('yg_scale');
					break;
				case 5:
					$res2=$items->where('item_id <353 AND item_id>297')->select();
					$this->assign('res2',$res2);
					$this->display('rz_scale');
					break;
				case 6:
					$res2=$items->where('item_id <400 AND item_id>352')->select();
					$this->assign('res2',$res2);
					$this->display('sj_scale');
					break;
				case 7:
					$res2=$items->where('item_id <467 AND item_id>399')->select();
					$this->assign('res2',$res2);
					$this->display('sz_scale');
					break;
				case 8:
					$res2=$items->where('item_id <521 AND item_id>466')->select();
					$this->assign('res2',$res2);
					$this->display('qx_scale');
					break;
				default:
				$this->redirect("Record/other_scale_info?kind_id={$kind_id}&a_id={$a_id}");
			}	
		}
		else{
			$this->error('请先登录',U('Login/login'),1);
		}
	}
	 
	public function scale_info()  //获取提交的量表数据和修改数据
	{
		if((session(u_name)!=null)||(session(admin_name)!=null))
		{
		    if(isset($_POST['submit'])){
		        $type=1;
		    }else{
		        $type=0;
		    }
				$item_values = M('item_values');  //记录表
				$kind_id= $_POST['kind_id'];
				$a_id  = $_POST['a_id'];
				$arr1 = $_POST['gz'];   //备注
				$arr  = $_POST['g'];    // 记录值
				for($i=0;$i<count($arr);$i++){
				    $a.=$arr[$i];
				}
// 				if((!isset($_POST['save']))&&($a =='')){ return $a;}
				if($a=='') { 
				    echo"<script>alert('评估不能为空！');history.go(-1);</script>";
				    exit;
				}
				if($kind_id<9)  //已有的量表
				{
					$kind_modules =M('kind_modules'); //小分类
					$items = M('items');
					$sql = " select * from kind_modules where kind_id ='$kind_id' ";
					$res = $kind_modules->query($sql); //小分类
					if($res==null)  //没有小分类时
					{
						$sql1 = "select item_id from ((items inner join scales on scales.s_id= items.s_id)
						inner join modules_scales on modules_scales.s_m_id =scales.s_m_id) where
						modules_scales.kind_id = '$kind_id'";
					}else{  //有小分类时
						$sql1 = "select item_id from (((items inner join scales on scales.s_id= items.s_id)
					inner join modules_scales on modules_scales.s_m_id =scales.s_m_id) inner join
					kind_modules on kind_modules.m_id =modules_scales.m_id) where
					modules_scales = ''";  //小分类对应的量表
					}
					$res1 = $items->query($sql1); //获得测试条目的id
					$data['a_id']=$a_id;  //对应的第几次测试记录
					$info= $item_values->where(array('a_id'=>"$a_id"))->select();//判断是否已有信息记录
					if($info!=null) //有则是修改
					{
					    $type=M("assess_record")->where('a_id='.$a_id)->getField(type);
						if((session(admin_name)=='admin')||($type==0))
						{
						    M("assess_record")->where('a_id='.$a_id)->save($data);
						    for($i=0;$i<count($arr);$i++)
						    {
						        $item_id = $res1[$i]["item_id"]; //对应量表id
						        $data['items_values'] = $arr[$i];  //记录值
						        if($arr[$i]=='P'){$numP.=$item_id.','; $countP+=1;} //P的值
						        elseif($arr[$i]=='E'){$numE.=$item_id.','; $countE+=1;} //E的值
						        elseif($arr[$i]=='F'){$numF.=$item_id.',';} //F的值
						        elseif($arr[$i]=='A'){$numA.=$item_id.','; $countA+=1;} //A的值
						        elseif($arr[$i]=='M'){$numM.=$item_id.','; $countM+=1;} //M的值
						        elseif($arr[$i]=='S'){$numS.=$item_id.',';} //S的值
						        //elseif($arr[$i]==''){$num.=$item_id.',';} //空值
						        $data['remark'] =$arr1[$i];  //备注
						        $item_values->where(array('item_id'=>"$item_id",'a_id'=>"$a_id"))->save($data);
						    }
						    if($kind_id !=8){
						        $e= $numE;
						        $total= $numP.'*'.$numE.'*'.$numF;
						        $num = $countP.','.$countE;
						    }else{
						        $e=$numM;
						        $total= $numA.'*'.$numM.'*'.$numS;
						        $num = $countA.','.$countM;
						    }
						    $data['e']=$e;
						    $data['nums']=$num;
						    $data['total']=$total;
						    if(isset($_POST['save'])){
						        $data['type']=0;
						        M("assess_record")->where('a_id='.$a_id)->save($data);
						        echo"<script>alert('数据保存成功，可提交评估结果！');history.go(-1);</script>";
						        exit;
						    }else{
						        $data['type']=1;
						        M("assess_record")->where('a_id='.$a_id)->save($data);
						        if(session(admin_name)=='admin'){
						            $this->success('修改成功！',U("Record/all_info?kind_id={$kind_id}&total={$total}&a_id={$a_id}&num={$num}"),2);
						        }else{
						            $this->success('评估成功！',U("Record/all_info?kind_id={$kind_id}&total={$total}&a_id={$a_id}&num={$num}"),2);
						        }
						        exit;
						    }
						    
						   
						}   
					}else{  //没有则是添加信息
						for($i=0;$i<count($arr);$i++)
						{
						    static $countP,$countE,$countA,$countM;
						    $item_id = $res1[$i]["item_id"]; //对应量表id
							$data['item_id'] = $res1[$i]["item_id"]; //对应量表id
							$data['items_values'] = $arr[$i];  //记录值
							if($arr[$i]=='P'){$numP.=$item_id.','; $countP+=1;} //P的值
							elseif($arr[$i]=='E'){$numE.=$item_id.','; $countE+=1;} //E的值
							elseif($arr[$i]=='F'){$numF.=$item_id.',';} //F的值
							elseif($arr[$i]=='A'){$numA.=$item_id.','; $countA+=1;} //A的值
							elseif($arr[$i]=='M'){$numM.=$item_id.','; $countM+=1;} //M的值
							elseif($arr[$i]=='S'){$numS.=$item_id.',';} //S的值
							//elseif($arr[$i]==''){$num.=$item_id.',';} //空值
							$data['remark'] =$arr1[$i];  //备注
							$item_values->add($data);
						}
					    if($kind_id !=8){
					        $e= $numE;
						    $total= $numP.'*'.$numE.'*'.$numF;
						    $num = $countP.','.$countE;
						}else{
						    $e= $numM;
						    $total= $numA.'*'.$numM.'*'.$numS;
						    $num = $countA.','.$countM;
						}
						$data['e']=$e;
						$data['nums']=$num;
						$data['total']=$total;
						M("assess_record")->where('a_id='.$a_id)->save($data);
						$data["type"]=$type;
						M("assess_record")->where('a_id='.$a_id)->save($data);
						if($type == 0){
						    echo"<script>alert('数据保存成功，可提交评估结果！');history.go(-1);</script>";
						    exit;
						}elseif($type == 1){
						    $this->success('评估成功！',U("Record/all_info?kind_id={$kind_id}&total={$total}&a_id={$a_id}&num={$num}"),1);
						    exit;
						}
					}	
				}else{
					$other_items = M('other_items');
					$other_items_value = M('other_items_value');
					$sql = "select * from other_items where kind_id = $kind_id";
					$res= $other_items ->query($sql);//获取对应的条目id
					$data['a_id']=$a_id;
					$info= $other_items_value->where(array('a_id'=>"$a_id"))->select();//判断是否已有信息记录
					if($info!=null) //有则是修改
					{
						for($i=0;$i<count($arr);$i++)
						{
							$item_id = $res[$i]["other_item_id"]; //对应量表id
							$data['other_value'] = $arr[$i];  //记录值
							$data['other_remark'] =$arr1[$i];  //备注
							$other_items_value->where(array('other_item_id'=>"$item_id"))->save($data);
						}
						
						$this->success('修改成功！',U("Record/show_record?kind_id=15"),1);
						exit;
					}else{
						for($i=0;$i<count($arr);$i++)
						{
							$data['other_item_id']=$res[$i]["other_item_id"];
							$data['stu_id'] = cookie(stu_id);
							$data['other_value'] = $arr[$i];  //记录值
							$data['other_remark'] =$arr1[$i];  //备注
							$other_items_value->add($data);
						}
						$this->success('添加成功！',U("Record/show_record?kind_id=15"),1);
						exit;
					}
					
				}	
// 			}
		}
		else{
			$this->error('请先登录',U('Login/login'),1);
		}
	}
	
	public function tongji($kind_id,$a_id,$t,$n){ //统计数据函数
	    $stu_name = M('stu_info')->where('stu_id='.cookie('stu_id'))->getField('stu_name');
	    $a_er =M('assess_record')->where('a_id='.$a_id)->find(); //获得评估者
	    $kind_name= M('scale_kind')->where('kind_id='.$kind_id)->getField('kind_name'); 
	    $total = explode('*',$t);
	    $p=explode(',',$total[0]);
	    $e=explode(',',$total[1]);
	    $f=explode(',',$total[2]);
	    
	    //$n=explode(',',$total[3]);
	    $items = M('items');
	    for($i=0;$i<count($p)-1;$i++){//P项
	        $pz[]=$items->where('item_id='.$p[$i])->getField('item_title');
	    }
	    for($i=0;$i<ceil(count($pz)/3);$i++){//P项
	        for($j=0;$j<3;$j++){
	            $pValue[$i][$j]=$pz[$i*3+$j];
	        }
	    }
	    
	    for($i=0;$i<count($e)-1;$i++){//E项
	        $ez[]=$items->where('item_id='.$e[$i])->getField('item_title');
	        
	    }
	    for($i=0;$i<ceil(count($ez)/3);$i++){//P项
	        for($j=0;$j<3;$j++){
	            $eValue[$i][$j]=$ez[$i*3+$j];
	        }
	    }
	    for($i=0;$i<count($f)-1;$i++){//F项
	        $fz[]=$items->where('item_id='.$f[$i])->getField('item_title');
	    }
	    for($i=0;$i<ceil(count($fz)/3);$i++){//P项
	        for($j=0;$j<3;$j++){
	            $fValue[$i][$j]=$fz[$i*3+$j];
	        }
	    }
	    $num =explode(',',$n);
	    switch ($kind_id){
	        case 1:
	            $img = "/images/gz.png";
	            $y[0]=[211,295,350,387,433,466,480,527,558,596,626,643,680,688,697,705,713];
	            $y[1]=[55,52,47,44,40,37,34,29,27,21,19,16,10,5,2,1,0];
	            $power = ["视觉","听觉","触觉","味觉","嗅觉"];
	            break;
	        case 2:
	            $img = "/images/cd.png";
	            $y[0] = [180,279,296,349,388,419,480,503,542,558,580,612,635,650,665,674];
	            $y[1]=[72,65,64,47,46,35,34,24,22,21,19,7,6,5,1,0];
	            $power = ["操作活动"];
	            break;
	        case 3:
	            $img = "/images/jx.png";
	            $y[0]=[180,287,296,312,327,350,373,388,403,433,449,488,512,527,543,557,566,612,634,641,657,673,688,698];
	            $y[1] =[66,63,62,51,50,49,48,47,39,35,34,33,24,23,22,21,20,11,9,4,3,2,1,0];
	            $power = ["基本操作能力","手眼协调","握笔写画"];
	            break;
	        case 4:
	            $img = "/images/yg.png";
	            $y[0] =[195,295,395,466,489,558,604,636,665,673,681,689,698];
	            $y[1] = [79,76,67,55,52,36,27,21,18,8,2,1,0];
	            $power = ["语言模仿","语言理解","语言表达"];
	            break;
	        case 5:
	            $img = "/images/rz.png";
	            $y[0] = [180,211,295,389,480,558,581,604,620,634,650,675];
	            $y[1]= [55,50,42,30,20,10,9,5,4,2,1,0];
	            $power = ["经验与表征","因果关系和概念形成"];
	            break;
	        case 6:
	            $img = "/images/sj.png";
	            $y[0] =[196,298,373,467,537,558,583,605,651,675,689,699];
	            $y[1] = [47,45,40,30,24,19,15,14,11,4,1,0];
	            $power = ["社交前基本能力","社交技巧"];
	            break;
	        case 7:
	            $img = "/images/zl.png";
	            $y[0] = [180,295,388,465,480,513,558,581,595,612,627,650,674,682,697];
	            $y[1] = [67,62,46,34,33,18,15,12,8,6,5,3,2,1,0];
	            $power = ["进食","穿衣","梳洗","如厕"];
	            break;
	        case 8 :
	            $img = "/images/tu2.png";
	            $power = ["情绪表达与调节","特殊行为"];
	            break;
	             
	    }
	    if($kind_id !=8){
	        $pic = $this->getImg($y,$num);
	    }else{
	        $a[0]["a_id"] =$a_id;
	        $pic = $this->cyc1($a);
	    }
	    
	    $all=[$stu_name,$img,$pic,$pValue,$eValue,$fValue,$a_er,$kind_name,$ez,$e,$power];
	    return $all;
	}
	
	public function all_info() //评估结束后的信息汇总
	{
	    $kind_id =$_GET['kind_id']; 
	    $a_id =$_GET['a_id'];
	    $type=M("assess_record")->where('a_id='.$a_id)->getField(type);
	    if($type!=1){
	        echo"<script>alert('请先完成评估！');history.go(-1);</script>";
	        exit;
	    }
	    $t= $_GET['total'];
	    $n= $_GET['num'];
// 	    $p = M("modules_scales")->where('kind_id='.$kind_id)->select();
// 	    foreach($p as $v){
// 	        $power[] =$v["s_m_title"];
// 	    }
	    
	    $all=$this->tongji($kind_id, $a_id, $t, $n);
        $power = $all[10];
	    $pla = M("Plan")->where('a_id='.$a_id)->find();
	    $plan=$this->edu_Plan($kind_id, $a_id, $t,$all[8],$pla);
	    $sheet =M("Sheet")->where('a_id='.$a_id)->find();
	    $p1 = explode('??//??',$sheet["power"]);
	    for($i=0;$i<count($p1);$i++){
	        $tt.=$p1[$i];
	    }
	    if($tt !=''){
	        $power=$p1;
	    }
	    $status =explode('??//??',$sheet["status"]);
	    $aim= $sheet["aim"];
	    if($kind_id<8){
	        $tide = ['P','E','F'];
	    }else{
	        $tide = ['A','M','S'];
	    }
	    
	    $this->assign('pic',$all[2]);
	    $this->assign('kind_id',$kind_id);
	    $this->assign('stu_name',$all[0]);
	    $this->assign('a_id',$a_id);
	    $this->assign('img',$all[1]);
	    $this->assign('power',$power);
	    $this->assign('tide',$tide);
	   
	    $this->assign('status',$status);
	    $this->assign('aim',$aim);
	    $this->assign('pValue',$all[3]);
	    $this->assign('eValue',$all[4]);
	    $this->assign('fValue',$all[5]);
	    $this->assign('a_er',$all[6]);
	    $this->assign('kind_name',$all[7]);
	    $this->assign('plan',$plan[0]);
	    $this->assign('items',$plan[1]);
	    $this->assign('e',$all[8]);
	    $this->assign('standard',$plan[2]);
	    $this->assign('form',$plan[3]);
	    $this->assign('longer',$plan[4]);
	    $this->assign('start',$plan[5]);
	    $this->assign('end',$plan[6]);
	    
	    if($kind_id==8){
	        $this->display('all_info2');
	    }else{
	        $this->display();
	    }
	   
	}
	
	public function all_info1(){  //查看数据
	    $kind_id =$_GET['kind_id'];
	    $a_id =$_GET['a_id'];
	    $type=M("assess_record")->where('a_id='.$a_id)->getField(type);
	    if($type!=1){
	        echo"<script>alert('请先完成评估！');history.go(-1);</script>";
	        exit;
	    }
	    $t= $_GET['total'];
	    $n= $_GET['num'];
	    $pla = M("Plan")->where('a_id='.$a_id)->find();
	    $all=$this->tongji($kind_id, $a_id, $t, $n);
	    $plan=$this->edu_Plan($kind_id, $a_id, $t,$all[8],$pla);
	    $sheet =M("Sheet")->where('a_id='.$a_id)->find();
	    $power = explode('??//??',$sheet["power"]);
	    $status =explode('??//??',$sheet["status"]);
	    if($kind_id<8){
	        $tide = ['P','E','F'];
	    }else{
	        $tide = ['A','M','S'];
	    }
	    $aim= $sheet["aim"];
	    $this->assign('pic',$all[2]);
	    $this->assign('kind_id',$kind_id);
	    $this->assign('stu_name',$all[0]);
	    $this->assign('a_id',$a_id);
	    $this->assign('tide',$tide);
	    $this->assign('img',$all[1]);
	    $this->assign('pValue',$all[3]);
	    $this->assign('eValue',$all[4]);
	    $this->assign('fValue',$all[5]);
	    $this->assign('a_er',$all[6]);
	    $this->assign('power',$power);
	    $this->assign('kind_name',$all[7]);
	    $this->assign('status',$status);
	    $this->assign('aim',$aim);
	    $this->assign('plan',$plan[0]);
	    $this->assign('items',$plan[1]);
	    $this->assign('standard',$plan[2]);
	    $this->assign('form',$plan[3]);
	    $this->assign('longer',$plan[4]);
	    $this->assign('start',$plan[5]);
	    $this->assign('end',$plan[6]);
	    if($kind_id==8){
	        $this->display('all_info2');
	    }else{
	        $this->display();
	    }
	}
	
	public function getImg($arr,$num){
	    for($i=0;$i<51;$i++){  //P
	        if($num[0]>=$arr[1][$i]){
	            $y=($arr[1][$i-1]-$num[0])/($arr[1][$i-1]-$arr[1][$i])*($arr[0][$i]-$arr[0][$i-1])+$arr[0][$i-1];
	            break;
	        }
	    }
	    for($i=0;$i<51;$i++){
	        $nu = $num[0]+$num[1]; //P+E
	        if($nu>=$arr[1][$i]){
	            $x=($arr[1][$i-1]-$nu)/($arr[1][$i-1]-$arr[1][$i])*($arr[0][$i]-$arr[0][$i-1])+$arr[0][$i-1];
	            break;
	        }
	    }
	    $stu_age = M("stu_info")->where('stu_id='.cookie(stu_id))->getField(brith);
	    $time=strtotime(date('Y-m-d',time()));
	    $age =floor(($time- strtotime($stu_age))/2592000); //将获得时间转化为月
	    header("content-type: image/png");
	    $im = imagecreate(200, 700);//创建一个650X750像素的图像
	    $bg = imagecolorallocatealpha($im, 255, 255, 255,127);//设置图像的背景颜色
	    $red = imagecolorallocate($im,255,0,0);//创建一个颜色，以供使用
	    $color = imagecolorallocate($im, 8, 67, 255); //生理年龄线
	    $black = imagecolorallocate($im,0,0,0);//创建一个颜色，以供使用
	    
	    imageline($im, 30, $y, 140, $y, $black);//绘制一条线
	    imageline($im, 30, $x, 140, $x, $red);//绘制一条线
	    imageline($im, 30, (720-$age*54/7), 140,(720-$age*54/7),$color);
	    $filename =date('Y-m-d',time()).mt_rand(1000, 100000).'.png';
	    imagepng($im,"images/".$filename);
	    imagedestroy($im);
	    $img=__ROOT__.'/images/'.$filename;
	    return $img;
	}
	
// 	public function scale()
// 	{
// 		if(!empty(session(admin_name)))
// 		{
// 			$data['kind_id']= $_GET['kind_id'];  //对应的大分类id
// 			$kind_id = $_GET['kind_id'];  
// 			$scale_kind = M('scale_kind');
// 			$res = $scale_kind->limit(8)->select();
// 			$kind_name = $scale_kind->where($data)->getField('kind_name');
// 			$stu = M('stu_info');
// 			$data['stu_id'] = cookie('stu_id');
// 			$stu_name = $stu->where($data)->getField('stu_name');
// 			if($_POST['submit'])
// 			{
// 				dump($_POST['gz']);  //备注
// 				dump($_POST['g']);   //测试值
// 			}
// 			$kind_modules  = M('kind_modules');  //小分类
// 			$modules_scales = M('modules_scales');//大模块
// 			$scales = M('scales');   //小模块
// 			$items = M('items');  //具体量表
// 			$res1 = $kind_modules->where(array('kind_id'=>"$kind_id"))->select(); //小分类
// 			if(empty($res1))
// 			{
				
// 				$res1 = $modules_scales->where(array('kind_id'=>"$kind_id"))->select(); //大模块
// 				foreach($res1 as $k=>$v)
// 				{
// 					$sql = "select * from scales where s_m_id = '$v[s_m_id]'";
// 					$res2[] = $scales->query($sql);
// 					$sql3 = "select * from (items inner join scales on scales.s_id=items.s_id) where scales.s_m_id = '$v[s_m_id]'";
// 					$res3[] = $items->query($sql3);
// 				}
// // 				foreach ($res2 as $k=>$v)
// // 				{
// // 					foreach( $v as $k1=>$v1)
// // 					{
// // 						$sql4="select count(item_id) from ((scales inner join  items on items.s_id = scales.s_id)inner join modules_scales
// // 						on modules_scales.s_m_id = scales.s_m_id) WHERE scales.s_id ='$v1[s_id]' ";
// // 						$res4[$k1] = $scales->query($sql4);
// // 					}	
// // 					$res5[] =$res4; 
// // 				}
//  			}
// 			//$this->assign('res5',$res5);  //小模块对应的长度
// 			//dump($res5);
// 			$this->assign('res3',$res3);  //具体的量表条目
// 			$this->assign('res',$res);  //对应的大分类
// 			$this->assign('res1',$res1);  //对应的大模块
// 			$this->assign('res2',$res2);  //对应的小模块
// 			$this->assign('kind_name',$kind_name);//对应的表头
// 			$this->assign('stu_name',$stu_name);
// 			$this->display('Record/gz_scale');
// 		}
// 		else{
// 			$this->error('请先登录',U('Login/login'),1);
// 		}
// 	}
    public function fenlei($a_id,$kind_id)
    {
        $item_values = M('item_values');
        $data['a_id']= $a_id;   //对应的记录id
        //$a_id = $_GET['a_id'];
        $res1 = $item_values ->where($data)->select();
        $data['kind_id']= $kind_id;  //对应的大分类id
        //$kind_id  = $_GET['kind_id'];
        
        $scale_kind = M('scale_kind');
        $res = $scale_kind->limit(8)->select();
        $kind_name = $scale_kind->where($data)->getField('kind_name');
        $stu = M('stu_info');
        $data['stu_id'] = cookie('stu_id');
        $stu_name = $stu->where($data)->getField('stu_name');
        $arr=[$res1,$res,$kind_name,$stu_name];
        return $arr;
    }
    
    public function changeRec($kind_id,$b)
    {
        $items = M('items');
        switch($kind_id)
        {
            case 1 :
                $res2=$items->where('item_id'<81)->select();
                $this->assign('res2',$res2);
                if($b ==1){
                    $this->display('Record/edit_record1');
                }else{
                    $this->display('Record/see_record1');
                }
                break;
            case 2:
                $res2=$items->where('item_id <153 AND item_id>80')->select();
                $this->assign('res2',$res2);
                if($b ==1){
                    $this->display('Record/edit_record2');
                }else{
                    $this->display('Record/see_record2');
                }
                break;
            case 3:
                $res2=$items->where('item_id <298 AND item_id>231')->select();
                $this->assign('res2',$res2);
                if($b ==1){
                    $this->display('Record/edit_record3');
                }else{
                    $this->display('Record/see_record3');
                }
                break;
            case 4:
                $res2=$items->where('item_id <232 AND item_id>152')->select();
                $this->assign('res2',$res2);
                if($b ==1){
                    $this->display('Record/edit_record4');
                }else{
                    $this->display('Record/see_record4');
                }
                break;
            case 5:
                $res2=$items->where('item_id <353 AND item_id>297')->select();
                $this->assign('res2',$res2);
                if($b ==1){
                    $this->display('Record/edit_record5');
                }else{
                    $this->display('Record/see_record5');
                }
                break;
            case 6:
                $res2=$items->where('item_id <400 AND item_id>352')->select();
                $this->assign('res2',$res2);
                if($b ==1){
                    $this->display('Record/edit_record6');
                }else{
                    $this->display('Record/see_record6');
                }
                break;
            case 7:
                $res2=$items->where('item_id <467 AND item_id>399')->select();
                $this->assign('res2',$res2);
                if($b ==1){
                    $this->display('Record/edit_record7');
                }else{
                    $this->display('Record/see_record7');
                }
                break;
            case 8:
                $res2=$items->where('item_id <521 AND item_id>466')->select();
                $this->assign('res2',$res2);
                if($b ==1){
                    $this->display('Record/edit_record8');
                }else{
                    $this->display('Record/see_record8');
                }
                break;
            default:
                $this->redirect("Record/see_other_scale/kind_id/{$kind_id}/a_id/{$a_id}");
        }
    }
	
	public function see_record()   //查看具体的量表信息记录
	{
		if((session(u_name)!=null)||($_SESSION['admin_name']!=null))
		{
		     $a_id=$_GET['a_id'];
		     $kind_id=$_GET['kind_id'];
			 $arr =$this->fenlei($a_id, $kind_id);
			 $this->assign('res',$arr[1]);  //对应的大分类
			 $this->assign('kind_name',$arr[2]);//对应的表头
			 $this->assign('stu_name',$arr[3]);
			 $this->assign('res1',$arr[0]);//记录值 
			 $this->assign('a_id', $a_id);
			 $this->assign('kind_id',$kind_id);//对应的id
			 $this->changeRec($kind_id); 
		}else{
			$this->error('请先登录',U('Login/login'),1);
		}
	}
	
	function edit_record(){    //管理员admin修改数据
	    if(session(admin_name)=='admin'){
	        $a_id=$_GET['a_id'];
	        $b =$_GET['b'] ; //标记值
		     $kind_id=$_GET['kind_id'];
			 $arr =$this->fenlei($a_id, $kind_id);
			 $this->assign('res',$arr[1]);  //对应的大分类
			 $this->assign('kind_name',$arr[2]);//对应的表头
			 $this->assign('stu_name',$arr[3]);
			 $this->assign('res1',$arr[0]);//记录值 
			 $this->assign('a_id', $a_id);
			 $this->assign('kind_id',$kind_id);//对应的id
			 $this->changeRec($kind_id,$b); 
	    }
	}
	
	function other_scale()  //新增其他量表
	{
		if(session(admin_name)!=null)
		{
			if(isset($_POST['submit']))
			{
				if(($_POST['kind_name']!=null)&&($_POST['item_name']!=null))
				{
					$scale_kind = M('scale_kind'); //种类
					$other_items = M('other_items'); //量表条目
					$data['kind_name'] = $_POST['kind_name']; //种类名
					$kind_id = $scale_kind ->add($data);
					$data['kind_id'] = $kind_id;
					$data['other_item_name'] =$_POST['item_name'];
					$other_items->add($data);
					$arr  = $_POST['scale'];
					for($i=0;$i<count($arr);$i++)
					{
						if($arr[$i]!=null)
						{
							$data['other_item_name'] = $arr[$i];
							$other_items->add($data);
						}
					}
					$this->success('增加量表成功！',U('Record/other_scale_list'));
				}else{
					$this->error('请补充完整信息',U("Record/other_scale"),1);
				}
				exit;
			}
			$this->display();
		}else{
			$this->error('请先登录',U('Login/login'),1);
		}
				
	}
	
	function other_scale_list()   //其他量表总列表
	{
		if((session(u_name)!=null)||($_SESSION['admin_name']!=null))
		{
			$scale_kind = M('scale_kind');
			$per =12;
			$total = $scale_kind ->where('kind_id>8')->count('kind_id');
			if($total==0)
			{
				$this->error('暂时没有其他量表，请添加',U("Record/other_scale"),2);
			}else{
				$page = new \Common\Common\Page($total,$per);
				$sql ="select * from scale_kind where kind_id>8 ".$page->limit;
				$res = $scale_kind ->query($sql);
				$pagelist = $page->fpage();
				
				
				$this->assign('pagelist',$pagelist);
				$this->assign('res',$res);
				if(session(admin_name)!=null)
				{
				    $this->display();
				}else{
				   $this->display(other_scale_list1); 
				}
			}
			
		}
		else{
			$this->error('请先登录',U('Login/login'),1);
		}
	}
	
	function other_scale_info()   //查看量表信息
	{
		if((session(u_name)!=null)||($_SESSION['admin_name']!=null))
		{
		   
			$data['kind_id']= $_GET['kind_id'];
			$kind_id  =$data['kind_id'];
			$scale_kind = M('scale_kind');
			$kind_name = $scale_kind ->where($data)->getField('kind_name');
			$other_items = M('other_items');
			$res= $other_items->where($data)->select();
			$this->assign('kind_id',$kind_id);
			//$this->assign('a_id',$a_id);
			$this->assign('kind_name',$kind_name);
			$this->assign('res',$res);
			$this->display();
		}
		else{
			$this->error('请先登录',U('Login/login'),1);
		}
	}
	 
	function other_scale_add()   //添加其他表信息
	{
	    if((session(u_name)!=null)||($_SESSION['admin_name']!=null))
	    {
    	    if((($_GET['stu_id']!=null)&&(cookie('stu_id')==null))||
    	        (($_GET['stu_id']!=null)&&($_GET['stu_id']!=cookie('stu_id'))))
    	    {
    	        cookie('stu_id',$_GET['stu_id']);
    	    
    	    }
    	    $stu_id =cookie(stu_id);
    	    	
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
    	        $stu =M('stu_info');
    	        $stu_age = $stu->where(array('stu_id'=>"$stu_id"))->getField('brith');
    	        $assess_record = M('assess_record'); //学生测试表
    	        $time=strtotime(date('Y-m-d',time()));
    	        $age =floor(($time- strtotime($stu_age))/2592000); //将获得时间转化为月
    	        $year = floor($age/12);
    	        $month = $age-12*$year;
    	        $stu_age= $year.'岁'.$month.'月'; //学生的测试年龄
    	        if(session(admin_name)==null)
    	        {
    	            $data['a_er'] = session(u_name);
    	        }else{
    	            $data['a_er'] = session(admin_name);
    	        }
    	        $data['stu_id']=$stu_id;
    	        $data['a_time'] = date('Y-m-d',time());  //获取时间
    	        $data['a_age']  = $stu_age;
    	        $data['kind_id']= $_GET['kind_id'];
    	        $kind_id  =$data['kind_id'];
    	        $a_id=$assess_record->add($data);  //插入数据得到的id
    			$scale_kind = M('scale_kind');
    			$kind_name = $scale_kind ->where($data)->getField('kind_name');
    			$other_items = M('other_items');
    			$res= $other_items->where($data)->select();
    			$this->assign('kind_id',$kind_id);
    			$this->assign('a_id',$a_id);
    			$this->assign('kind_name',$kind_name);
    			$this->assign('res',$res);
    			
    	        $this->display();
    	    }
	    }else{
	        $this->error('请先登录',U('Login/login'),1);
	    }
	}
	
	function see_other_scale()  //查看填写的其他量表信息
	{ 
		if((session(u_name)!=null)||($_SESSION['admin_name']!=null))
		{
			$data['kind_id']= $_GET['kind_id'];
			$a_id = $_GET['a_id'];
			$other_items_value =M('other_items_value');
			$info =$other_items_value->where(array('a_id'=>"$a_id"))->select();
			$kind_id  =$data['kind_id'];
			$scale_kind = M('scale_kind');
			$kind_name = $scale_kind ->where($data)->getField('kind_name');
			$other_items = M('other_items');
			$res= $other_items->where($data)->select();
			$this->assign('kind_id',$kind_id);
			$this->assign('a_id',$a_id);
			$this->assign('kind_name',$kind_name);
			$this->assign('res',$res);
			$this->assign('info',$info);
			$this->display();
		}
		else{
			$this->error('请先登录',U('Login/login'),1);
		}
	}
	
// 	function other_scale_list1()
// 	{
// 		if((session(u_name)!=null)||($_SESSION['admin_name']!=null))
// 		{
// 			$scale_kind = M('scale_kind');
// 			$per =12;
// 			$total = $scale_kind ->where('kind_id>12')->count('kind_id');
// 			if($total==0)
// 			{
// 				$this->error('暂时没有其他量表，请添加',U("Record/other_scale"),2);
// 			}else{
// 				$page = new \Common\Common\Page($total,$per);
// 				$sql ="select * from scale_kind where kind_id>12 ".$page->limit;
// 				$res = $scale_kind ->query($sql);
// 				$pagelist = $page->fpage();
			
			
// 				$this->assign('pagelist',$pagelist);
// 				$this->assign('res',$res);
// 				$this->display();
// 			}
// 		}
// 	}
	
	function chart()  //数据分析表
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
				}
				exit;
			}else{
				if($_GET['kind_id']==null)
				{
					$_GET['kind_id']=1;
				}
				$kind_id = $_GET['kind_id'];
				$arr = $this->getPef($kind_id);
				$this->assign('kind_name',$arr[0]);
				$this->assign('stu_id',cookie(stu_id)); //获取学生的stu_id
				$this->assign('arr1',$arr[1]); //获取到P的值
				$this->assign('arr2',$arr[2]); //获取到P/E/F的值
				$this->assign('arr3',$arr[3]); //获取到M的值
				$this->assign('arr4',$arr[4]); //获取到A.M.S的值
				$this->assign('res1',$arr[5]);  //分类菜单
				$this->assign('stu_name',$arr[6]);
				if($kind_id<8)
				{
				    $this->display();
				}else{

				    $this->display('chart1');
				}
			}
		}else{
			$this->error('请先登录',U('Login/login'),1);
		}
	}

	function delRecord() //删除对应的记录
	{
		$kind_id = $_GET['kind_id'];
		$assess = M('assess_record');
		$data['a_id']= $_GET['a_id'];
		$assess->where($data)->delete();
		$values =M('item_values');
		$values->where($data)->delete();
		M("sheet")->where($data)->delete(); //删除对应的评估分析表
	    M("plan")->where($data)->delete(); //删除对应的个别化计划
		$this->success('删除成功！',U('show_record?kind_id='."{$kind_id}"),1);
	}
	
	public function all_kind() //所有信息汇总
	{ 
	    $info = $this->getPic();
	    $arr = $info[0];
	    $arr1 = $info[1];
	    $this->assign('arr',$arr);
	    $this->assign('arr1',$arr1);
	    $this->assign('stu_name',$info[2]);
	    $this->display();
	}
	
	public function active() //行为表现图
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
	            }
	            exit;
	        }else{
	            $arr=$this->act();
	            if(count($arr)>2){
	                $this->assign('img',$arr[2]);
	                $this->assign('res',$arr[3]);
	                $this->assign('p',$arr[0]);
	                $this->assign('e',$arr[1]);
	                $this->assign('stu_name',$arr[4]);
	                $this->display('active1');
	                exit();
	            } 
                $this->display();
               
	        }
	    }else{
	        $this->error('请先登录',U('Login/login'),1);
	    }
	}
	public function Cycle()
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
	            }
	            exit;
	        }else{
	            $arr=$this->cyc();
	            if($arr[2]!=''){
	                $this->assign('stu_name',$arr[1]);
	                $this->assign('res',$arr[0]);
	                $this->assign('img',$arr[2]);
	                $this->display('cycle1');
	                exit;
	            }
	         $this->assign('stu_name',$arr[1]);
	         $this->assign('res',$arr[0]);
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