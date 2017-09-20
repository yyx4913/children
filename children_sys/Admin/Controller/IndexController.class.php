<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
       // $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    	if($_SESSION['admin_name']!=null)
    	{
    		$this->display();
    	}else{
    		$this->redirect('Login/login');
    	}
    }
    
    public function s_index()  //班主任登录页
    {
    	if($_SESSION['u_name']!=null)
    	{
    		$this->display();
    	}else{
    		$this->error('请先登录',U('Login/login'),1);
    	}
    }
    
    public function t_index() //任课老师登录页
    {
    	if($_SESSION['u_name']!=null)
    	{
    		$this->display();
    	}else{
    		$this->error('请先登录',U('Login/login'),1);
    	}
    }
    
    public function right()
    {
    	if($_SESSION['admin_name']!=null)
    	{
    		$user =  M("user_info"); // 用户信息
    		$total = $user->count(); //信息总量
    		$per=10;   //每页的信息量
    		$page = new \Common\Common\Page($total,$per); //引入统计页码的函数
    		$sql="select * from user_info " .$page->limit;
    		$res = $user->query($sql);
    		$pagelist = $page->fpage();
    		if($res ==null)
    		{
    			$this->display('right1');
    			return;
    		}
    		if(isset($_POST['submit']))
    		{
    		    $data['u_name']= $_POST['user_name'];
    		    $info = $user->where($data)->select();
    		    if($info==null)
    		    {
    		   		echo "<script>alert('没有找到符合条件的信息!');window.location.href='right';</script>";
    		    }else {
    		   		$this->assign('res',$info);
    		   		$this->display();
    		   	    exit;
    		    }
    		
    		}
    		$this->assign('res',$res);
    		$this->assign('pagelist',$pagelist);
    		$this->display();
    	}else{
    		$this->error('请先登录',U('Login/login'),1);
    	}
    }
    
    public function left()
    {
    	if($_SESSION['admin_name']!=null)
    	{
    		$this->display();
    	}else{
    		$this->error('请先登录',U('Login/login'),1);
    	}
    }
    
    public function s_right()
    {
    	if($_SESSION['u_name']!=null)
    	{
    		$id= session(u_id);
    		$stu = M('stu_info');   //学生信息
    		$sql1="select count(stu_info.stu_id) from ((stu_info inner join t_stu_info on t_stu_info.stu_id=stu_info.stu_id) inner
    		join user_info ON t_stu_info.u_id=user_info.u_id) WHERE user_info.u_id ='$id' ";
    		$sum= $stu->query($sql1);  //信息量
			$total = $sum[0]["count(stu_info.stu_id)"];
    		if($total==0)
    		{
    			$this->display();
    		}else{
    			$this->display('Stu/stu_list');
    		}
    	}else{
    		$this->error('请先登录',U('Login/login'),1);
    	}
    }
    public function config(){
        if($_POST['unit']!=''){
            $data['conf_name']=$_POST['unit'];
            M('config')->where('conf_id=1')->save($data);
            $res=array(
                'status'=>0,
                'message'=>'修改成功');
        }else{
            $res=array(
                'status'=>0,
                 'message'=>'修改失败');
        }
        echo  json_encode($res);
        return json_encode($res);
    }
    public function footer()
    {
        $footer=M('config')->select();
        $this->assign('footer',$footer);
        $this->display();
    }
    
    function sysInfo()  //系统配置 
    {
        $footer=M('config')->select();
        $this->assign('footer',$footer);
        $this->display();
    }
}