<?php
/**
 * 图片相关
 */
namespace Admin\Controller;
use Think\Controller;

class ImageController extends Controller {
     
    public function kindupload()  //编辑器上传文件
    {
        $res = $this->upload();
        if($res===false) {
             $this->showKind(1,'添加失败');
        }else{
             $this->showKind(0, $res);
        }
    }
    
    public function upload()  //上传图片
    {
        $upload =new \Think\Upload();
        $upload->rootPath= 'Uploads/'; //根目录
         
        $res = $upload->upload();
        if($res){
            return '/Uploads/'. $res['imgFile']['savepath'] . $res['imgFile']['savename'];
        }else{
            return false;
        }
    }
    
    
    
    function showKind($status,$data)
    {
        if($status == 0) //上传成功
        {
            exit(json_encode(array("error"=>0, "url"=>$data)));
        }else{  //上传失败
            exit(json_encode(array("error"=>1, "message"=>'上传失败')));
        }
    }
    

}