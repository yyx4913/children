<?php
namespace Admin\Controller;

use Think\Controller;
class CodeController extends Controller{
    public function index()
    {
        //21232f297a57a5a743894a0e4a801fc3
        if($_POST){
            $code = $_POST['code'];
            $cd =md5('tmd'.$code);
            echo "<h1><center>序列号为：{$cd} </center></h1>";
            exit;
        }
        $this->display();
    }
  
    
}