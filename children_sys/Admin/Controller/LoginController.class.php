<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;
use Admin\Model\Admin_infoModel;

class LoginController extends Controller{
	
	public function verifyImg()//编写验证码
	{
		$config  =	array(
				'imageH'    =>  35,               // 验证码图片高度
				'imageW'    =>  105,               // 验证码图片宽度
				'fontSize'  =>  14,              // 验证码字体大小(px)
				'fontttf'   =>  '5.ttf',              // 验证码字体，不设置随机获取
        		'useNoise'  =>  false,            // 是否添加杂点
				'bg'        =>  array(200, 241, 254),  // 背景颜色
				'length'    =>  4,               // 验证码位数
		);
		$verify= new Verify($config);
		$verify->entry();
	}
	
	
	public function login()
	{
	    $conf_name=M('config')->where('conf_id=3')->getField(conf_name);
		if(isset($_POST['submit']))
		{
			if((!empty($_POST['username']))&&(!empty($_POST['pwd'])))
			{
				$verify =new \Think\Verify();
				if($verify->check($_POST['yanzheng']))
				{
// 					if($_POST['kind']=="super")
// 					{
					$pwd = str_replace(' ', '', $_POST['pwd']); //去除空格
				    $admin= new \Admin\Model\Admin_infoModel();
				    $admin = $admin->isGet($_POST['username']);
					if($admin)
					{
					    if($admin['admin_pw']==md5($pwd))
					    {
					        $status =M("sysinfo")->where('id=1')->getField(status);
					        if($status ==0){  //激活系统
					            $r= mt_rand(1000,9999);
					            $data["code"] = md5('tmd'.$r);
					            M("sysinfo")->where('id=1')->save($data);
					            $this->assign('r',$r);  
					            $this->display('jihuo');
					            return;
					        }
					        session('admin_id',$admin['admin_id']);
					        session('admin_name',$admin['admin_name']);
					        session('admin_pw',$admin['admin_pw']);
					        $this->redirect('Index/index');
					    }else{
					        echo"<script>alert('用户名或是密码错误！！')</script>";
					    }
					}else{
					     
						  $user= new \Admin\Model\User_infoModel();
						  $pwd = str_replace(' ', '', $_POST['pwd']); //去除空格
						  $res=$user->checkNamePwd($_POST['username'],md5($pwd));
						  if($res==false)
						  {
						      echo"<script>alert('用户名或是密码错误！！')</script>";
						  }else{
						      session('u_id',$res['u_id']);
						      session('u_name',$res['u_name']);
						      session('u_pw',$res['u_pw']);
                              if(strpos($res['role'],'班主任')!==false)  //有班主任权限的页面
						      {
						         $this->redirect('Index/s_index');
						      }else{
						         $this->redirect('Index/t_index'); //没有班主任权限的页面
						      }
						  }
					}
						
				}

				else{
					echo"<script>alert('验证码错误！')</script>";
				}
			}
			else{
				echo"<script>alert('用户名或是密码不能为空！！')</script>";
			}	 
		}
		
		$this->assign('conf_name',$conf_name);
		$this->display();
	}
	
	public function jihuo() //系统激活
	{
	    $code = $_POST['code'];
	    $cd = M("sysinfo")->where('id=1')->getField(code);
	    if($code == $cd){
	        $data['status'] =1;
	        M("sysinfo")->where('id=1')->save($data);
	        $admin = M("admin_info")->where('admin_id=1')->find();
	        
	        session('admin_id',$admin['admin_id']);
	        session('admin_name',$admin['admin_name']);
	        session('admin_pw',$admin['admin_pw']);
	        
	        $this->success('激活成功',U('Index/index'),1);
	    }else{
	        $this->error('激活失败',U('Login/login'),1);
	    }
	}
	
	public function logout()
	{
		session(null);
		$this->redirect('Login/login');
	}
	
	
	function _empty()  // 空操作
	{
		$this->redirect("Login/login");
	}
}
