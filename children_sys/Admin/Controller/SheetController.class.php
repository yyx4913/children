<?php
namespace Admin\Controller;

class SheetController extends CommonController{
    
    public function index(){  //填写评估分析表
        if((session(u_name)!=null)||($_SESSION['admin_name']!=null))
        {
           $kind_id=$_POST['kind_id'];
           $data["kind_id"]=$kind_id;
           $a_id=$_POST['a_id'];
           $data["a_id"]= $a_id;
           $data["power"]=implode('??//??', $_POST['arr']);
           $data["stu_id"]=cookie(stu_id);
           $data["status"] = implode('??//??', $_POST['arr1']);
           $data["aim"]=$_POST['aim'];
           $data["admin_er"] = session(admin_name);
           $data["time"] = date('Y-m-d',time());
           $res =M("Sheet")->where('a_id='.$a_id)->find();
           if($res !=''){
               M("Sheet")->where('a_id='.$a_id)->save($data);
           }else{
               M("Sheet")->add($data);
           }
           $data['standard']=$_POST["standard"];
           $data["form"]=$_POST["form"];
           $data['longer']= $_POST["longer"];
           $data['start']= $_POST["start"];
           $data['end']=$_POST["end"];
           $res1 =M("Plan")->where('a_id='.$a_id)->find();
           if($res1 !=''){
               M("Plan")->where('a_id='.$a_id)->save($data);
               $this->success('修改成功！',U("Record/add_record"),1);
           }else{
               M("Plan")->add($data);
               $this->success('添加成功！',U("Record/add_record"),1);
           }    
        }else{
            $this->error('请先登录',U('Login/login'),1);
        }
    }
    
    
    public function all_sheet()  //评估分析表信息汇总
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
                $stu_id = cookie(stu_id);
                $res=$this->count_sheet($stu_id);
                foreach($res as $k=>$v){
                    if($v==null){ $arr[$k][]='无'; continue;}
                    foreach($v as $k1=>$v2){
                        $k2 =$k1+1;
                        $kind_id = $k+1;
                        $arr[$k][]="<a href='/Sheet/sheet_info?kind_id={$kind_id}&a_id={$v2['a_id']}'>第{$k2}次&nbsp;&nbsp;评估结果分析表</a>";
                    }
                }
                $kind=['感知觉','粗大动作','精细动作','语言与沟通','认知','社会交往','生活自理','情绪与行为'];
                $this->assign('kind',$kind);
                $this->assign('arr',$arr);
                $this->display('sheet_list');
                
                
//                 $stu_id = cookie(stu_id);
//                 $info = M("Stu_info")->where('stu_id='.$stu_id)->find();
//                 $res =M("Sheet")->where('stu_id='.$stu_id)->select();  
//                 if(count($res)!=0){
//                     $sql="select a.* from sheet a where a_id = (select max(a_id) from sheet where kind_id = a.kind_id) order by a.kind_id";
//                     $res1 = M("Sheet")->query($sql);
//                     foreach($res1 as $v){
//                        $power[] = explode('??//??',$v["power"]); 
//                        $status[] =explode('??//??',$v["status"]);
//                        $aim[]= $v["aim"];
//                     }
                    
//                     $this->assign('er',$res[0]['admin_er']);
//                     $this->assign('time',$res[0]['time']);
//                     $this->assign('info',$info);
//                     $this->assign('power',$power);
//                     $this->assign('status',$status);
//                     $this->assign('aim',$aim);
//                     $this->display();               
            }
         }else{
            $this->error('请先登录',U('Login/login'),1);
        }
    }
    
    public function count_sheet($stu_id){
        for($i=1;$i<9;$i++){
            $res[] =M("Sheet")->where(array('stu_id'=>$stu_id, 'kind_id'=>$i))->select();
        }
        return $res;
    }
    
    public function sheet_info()
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
                $a_id=$_GET['a_id'];
                $kind_id=$_GET['kind_id'];
                $kind_name= M('scale_kind')->where('kind_id='.$kind_id)->getField('kind_name'); 
                $sheet =M("Sheet")->where('a_id='.$a_id)->find();
                $power = explode('??//??',$sheet["power"]);
                $status =explode('??//??',$sheet["status"]);
                $aim= $sheet["aim"];
                $this->assign('power',$power);
                $this->assign('kind_name',$kind_name);
                $this->assign('status',$status);
                $this->assign('aim',$aim);
                $this->display();
            }
        }
    }
}
