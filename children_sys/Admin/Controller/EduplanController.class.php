<?php
namespace  Admin\Controller;

class EduplanController extends CommonController{
    
    public function all_plan(){
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
                $res=$this->count_plan($stu_id);
                for($i=0;$i<count($res);$i++){
                   $a.=$res[$i][0];
                }
                if($a==''){
                    $this->error('暂时还没有个别化计划，请先对学生进行评估！',U('Record/add_record?stu_id='.$stu_id),2);
                }
                foreach($res as $k=>$v){
                    if($v==null){ $arr[$k][]='无'; continue;}
                    foreach($v as $k1=>$v2){
                        $k2 =$k1+1;
                        $kind_id = $k+1;
                        $arr[$k][]="<a href='plan_info?kind_id={$kind_id}&a_id={$v2['a_id']}'>第{$k2}次&nbsp;&nbsp;个别化教育计划</a>";
                    }
                }
                $kind=['感知觉','粗大动作','精细动作','语言与沟通','认知','社会交往','生活自理','情绪与行为'];
                $this->assign('kind',$kind);
                $this->assign('arr',$arr);
                $this->display('Sheet/plan_list');
            }
        }else{
            $this->error('请先登录',U('Login/login'),1);
        } 
    }
    
    public function count_plan($stu_id)
    {
        for($i=1;$i<9;$i++){
            $res[] =M("plan")->where(array('stu_id'=>$stu_id, 'kind_id'=>$i))->select();
        }
        return $res;
    }
    
    public function plan_info(){
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
                $a_id = $_GET['a_id'];
                $kind_id = $_GET['kind_id'];
                $kind_name= M('scale_kind')->where('kind_id='.$kind_id)->getField('kind_name'); 
                $res = M('assess_record')->where('a_id='.$a_id)->find();
                $pla = M("Plan")->where('a_id='.$a_id)->find();
                $t=$res['total'];
                $e=explode(',',$res['e']);
                $items = M('items');
                for($i=0;$i<count($e)-1;$i++){//E项
                    $ez[]=$items->where('item_id='.$e[$i])->getField('item_title'); 
                }
                $plan=$this->edu_Plan($kind_id, $a_id, $t,$ez,$pla);
//                 $stu_name = M("Stu_info")->where('stu_id='.$stu_id)->getField(stu_name);
//                 $res =$this->allPlan($stu_id);
//                 $this->assign('stu_name',$stu_name);
//                 $this->assign('d',$res[0]);
//                 $this->assign('zs',$res[1]);
//                 $this->assign('xs',$res[2]);
//                 $this->assign('all',$res[3]);
//                 $this->assign('time',$res[5]);
//                 $this->assign('a_er',$res[4]);
                $this->assign('res',$res);
                $this->assign('kind_name',$kind_name);
                $this->assign('plan',$plan[0]);
                $this->assign('items',$plan[1]);
                $this->assign('standard',$plan[2]);
                $this->assign('form',$plan[3]);
                $this->assign('longer',$plan[4]);
                $this->assign('start',$plan[5]);
                $this->assign('end',$plan[6]);
                $this->display('Sheet/plan_info');
            }
        }else{
            $this->error('请先登录',U('Login/login'),1);
        } 
    }
}