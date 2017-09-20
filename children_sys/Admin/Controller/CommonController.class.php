<?php
namespace  Admin\Controller;
use Think\Controller;

class CommonController extends Controller{
    
    public function pic(){
        $stu_name = M('stu_info')->where('stu_id="'.cookie('stu_id').'"')->getField('stu_name');
        $sql ='select max(a_id),kind_id from (select kind_id,a_id from assess_record order by a_id desc) as
	        t group by kind_id';
        $info =M('assess_record')->query($sql);
        //dump($info);
        foreach($info as $v)
        {
            $data['kind_id']=$v["kind_id"];
            $data['a_id']=$v["max(a_id)"];//对应的a_id
            if($v["kind_id"]==1) //感知觉
            {
                $data['items_values']='P';
                $g1 = M('item_values')->where($data)->count();//统计P的个数
                $data['items_values']='E';
                $g2 = M('item_values')->where($data)->count();//统计E的个数
                $data['items_values']='F';
                $g3 = M('item_values')->where($data)->count();//统计F的个数
            }elseif($v["kind_id"]==2) //粗大动作
            {
                $data['items_values']='P';
                $c1 = M('item_values')->where($data)->count();//统计P的个数
                $data['items_values']='E';
                $c2 = M('item_values')->where($data)->count();//统计E的个数
                $data['items_values']='F';
                $c3 = M('item_values')->where($data)->count();//统计F的个数
            }elseif($v["kind_id"]==3) //精细动作
            {
                $data['items_values']='P';
                $j1 = M('item_values')->where($data)->count();//统计P的个数
                $data['items_values']='E';
                $j2 = M('item_values')->where($data)->count();//统计E的个数
                $data['items_values']='F';
                $j3 = M('item_values')->where($data)->count();//统计F的个数
            }elseif($v["kind_id"]==4) //语言沟通
            {
                $data['items_values']='P';
                $y1 = M('item_values')->where($data)->count();//统计P的个数
                $data['items_values']='E';
                $y2 = M('item_values')->where($data)->count();//统计E的个数
                $data['items_values']='F';
                $y3 = M('item_values')->where($data)->count();//统计F的个数
            }elseif($v["kind_id"]==5) //认知
            {
                $data['items_values']='P';
                $r1 = M('item_values')->where($data)->count();//统计P的个数
                $data['items_values']='E';
                $r2 = M('item_values')->where($data)->count();//统计E的个数
                $data['items_values']='F';
                $r3 = M('item_values')->where($data)->count();//统计F的个数
            }elseif($v["kind_id"]==6) //社会交往
            {
                $data['items_values']='P';
                $s1 = M('item_values')->where($data)->count();//统计P的个数
                $data['items_values']='E';
                $s2 = M('item_values')->where($data)->count();//统计E的个数
                $data['items_values']='F';
                $s3 = M('item_values')->where($data)->count();//统计F的个数
            }elseif($v["kind_id"]==7) //生活自理
            {
                $data['items_values']='P';
                $l1 = M('item_values')->where($data)->count();//统计P的个数
                $data['items_values']='E';
                $l2 = M('item_values')->where($data)->count();//统计E的个数
                $data['items_values']='F';
                $l3= M('item_values')->where($data)->count();//统计F的个数
            }
        }
        $arr['labels'] =['感知觉','粗大动作','精细动作','语言与沟通','认知','社会交往','生活自理'];
        $p=[$g1,$c1,$j1,$y1,$r1,$s1,$l1];
        $e=[$g2,$c2,$j2,$y2,$r2,$s2,$l2];
        $f=[$g3,$c3,$j3,$y3,$r3,$s3,$l3];
        $datasets[0] = [
            'fillColor' => "rgba(151,187,205,0.5)",
            'strokeColor' => "rgba(113,157,180,0.5)",
            'data' => $p
        ];
        $datasets[1] = [
            'fillColor'=> "rgba(250,137,116,0.5)",
            'strokeColor' => "rgba(255,0,0,0.5)",
            'data' => $e
        ];
        $datasets[2] = [
            'fillColor'=> "rgba(121,111,242,0.5)",
            'strokeColor' => "rgba(80,64,108,0.5)",
            'data' => $f
        ];
    
        $arr['datasets']=$datasets;
        $arr= json_encode($arr);//柱状图
        //雷达图
        $arr1['labels'] =['感知觉','粗大动作','精细动作','语言与沟通','认知','社交','自理'];
        $score = [$g1*2+$g2,$c1*2+$c2,$j1*2+$j2,$y1*2+$y2,$r1*2+$r2,$s1*2+$s2,$l1*2+$l2];
        $datasets1[0] = [
            'fillColor' => "rgba(151,187,205,0.5)",
            'strokeColor' => "rgba(113,157,180,0.5)",
            'pointColor' => "rgba(220,220,220,1)",
            'pointStrokeColor' => "#fff",
            'data' => $score  //得分
        ];
    
        $arr1['datasets']=$datasets1;
        $arr1= json_encode($arr1);
        $info=[$arr,$arr1];
        return $info;
    }
    
    public function act(){  //行为表现图
        $stu_id=cookie(stu_id);
        $stu_name =M('stu_info')->where('stu_id ='.$stu_id)->getField('stu_name');
        $kind_id = 1;
        $record = M('assess_record');
        $sql ="select a_id,kind_id from assess_record a where stu_id =".$stu_id." and (select count(1) from assess_record
	                where kind_id = a.kind_id and a_id > a.a_id ) <4 and a.type=1 order by kind_id asc ,a_id desc";
        $res = $record->query($sql);
        foreach ($res as $v){
            if($v["kind_id"]==1){
                $gz[]=$v["a_id"];
                continue;
            }elseif ($v["kind_id"]==2){
                $cd[]=$v["a_id"];
                continue;
            }elseif ($v["kind_id"]==3){
                $jx[]=$v["a_id"];
                continue;
            }elseif ($v["kind_id"]==4){
                $yg[]=$v["a_id"];
                continue;
            }elseif ($v["kind_id"]==5){
                $rz[]=$v["a_id"];
                continue;
            }elseif ($v["kind_id"]==6){
                $sj[]=$v["a_id"];
                continue;
            }elseif ($v["kind_id"]==7){
                $zl[]=$v["a_id"];
                continue;
            }
        }
        $gz =$this->push($gz);
        $cd =$this->push($cd);
        $jx =$this->push($jx);
        $yg =$this->push($yg);
        $rz =$this->push($rz);
        $sj =$this->push($sj);
        $zl =$this->push($zl);
        for($i=0;$i<3;$i++){
            if($gz[$i]+$cd[$i]+$jx[$i]+$yg[$i]+$rz[$i]+$sj[$i]+$zl[$i] ==0){
                break;
            }
            $final[$i]=[$gz[$i],$cd[$i],$jx[$i],$yg[$i],$rz[$i],$sj[$i],$zl[$i]];
        }
        if($final ==NULL){
            $info=[];
            return $info;
        }
        $info=$this->act2($final);
        if($info ==''){
            $info=[$final,$stu_name];
        }else{
            $info[3]=$final;
            $info[4]=$stu_name;
        }
        return $info;
    }
    
    public function act2($arr){
        if($_GET['times']!=''&&is_numeric($_GET['times'])){
            $k =$_GET['times'];
        }else{
            $k = count($arr)-1;
        }
        for($i=0;$i<7;$i++){
            $data['a_id']=$arr[$k][$i];
            $data['items_values']='P';
            $p[] = M('item_values')->where($data)->count();//统计P的个数
            $data['items_values']='E';
            $e[] = M('item_values')->where($data)->count();//统计E的个数
        }
        $sum =0;
        $sum1=0;
        for($i=0;$i<7;$i++){
           $sum1+=$p[$i];
           $sum+=$p[$i]+$e[$i];
           $total[] = $p[$i]+$e[$i];
        }
        $p[7]=$sum1;
        $total[7]=$sum;
        $y[0]=[211,295,350,387,433,466,480,527,558,596,626,643,680,688,697,705,713];
        $y1[0]=[55,52,47,44,40,37,34,29,27,21,19,16,10,5,2,1,0];
        $y[1] = [180,279,296,349,388,419,480,503,542,558,580,612,635,650,665,674];
        $y1[1]=[72,65,64,47,46,35,34,24,22,21,19,7,6,5,1,0];
        $y[2]=[180,287,296,312,327,350,373,388,403,433,449,488,512,527,543,557,566,612,634,641,657,673,688,698];
        $y1[2] =[66,63,62,51,50,49,48,47,39,35,34,33,24,23,22,21,20,11,9,4,3,2,1,0];
        $y[3] =[195,295,395,466,489,558,604,636,665,673,681,689,698];
        $y1[3] = [79,76,67,55,52,36,27,21,18,8,2,1,0];
        $y[4] = [180,211,295,389,480,558,581,604,620,634,650,675];
        $y1[4]= [55,50,42,30,20,10,9,5,4,2,1,0];
        $y[5] =[196,298,373,467,537,558,583,605,651,675,689,699];
        $y1[5] = [47,45,40,30,24,19,15,14,11,4,1,0];
        $y[6] = [180,295,388,465,480,513,558,581,595,612,627,650,674,682,697];
        $y1[6] = [67,62,46,34,33,18,15,12,8,6,5,3,2,1,0];
        $y[7]=[180,196,211,296,313,327,351,374,389,396,405,420,435,450,466,481,490,504,512,527,535,544,558,582,597,
                605,612,620,628,636,643,651,660,667,675,682,689,698,705,715];
        $y1[7] = [441,421,416,405,330,329,328,323,312,267,253,249,248,244,243,234,192,167,163,160,157,152,149,
                123,93,89,79,75,73,68,58,51,28,27,26,16,9,2,1,0];
        $dots = $this->dian($p,$y1,$y);
        $dots1 =$this->dian($total,$y1,$y);
            //dump($dots);exit;
        header("Content-type: image/png");//将图像输出到浏览器
        $img = imagecreate(710, 750);//创建一个650X750像素的图像
        $bg = imagecolorallocatealpha($img, 255, 255, 255,127);//设置图像的背景颜色
        $red=imagecolorallocate($img, 255, 0, 0);//设置绘制图像的线的颜色
        $color1 = imagecolorallocate($img, 255, 0, 40);//设置标记线的颜色
        $color2 = imagecolorallocate($img, 8, 67, 255);//设置标记线的颜色
        $black = imagecolorallocate($img, 0, 0, 0);//设置绘制图像的线的颜色
        $x=[130,197,263,326,393,458,522,590];
        for($i=0;$i<7;$i++){
            imageline($img, $x[$i], $dots[$i], $x[$i+1], $dots[$i+1], $black);//绘制一条线
            imageline($img, $x[$i], $dots1[$i], $x[$i+1], $dots1[$i+1], $red);//绘制一条线
        }
        //儿童生理年龄线
        $stu_age = M("stu_info")->where('stu_id='.cookie(stu_id))->getField(brith);
        $time=strtotime(date('Y-m-d',time()));
        $age =floor(($time- strtotime($stu_age))/2592000); //将获得时间转化为月
        $style = array($color2, $color2, $color2,$color2, $black, $bg, $bg, $bg, $bg);
        imagesetstyle($img, $style);
        imageline($img, 30, (720-$age*54/7), 710,(720-$age*54/7),  IMG_COLOR_STYLED);//绘制标记线
        
        $style = array($black, $black, $black,$black, $black, $bg, $bg, $bg, $bg);
        imagesetstyle($img, $style);
        imageline($img, 610, $dots[7], 710, $dots[7],  IMG_COLOR_STYLED);//绘制标记线
        
        $style = array($color1, $color1, $color1,$color1, $color1, $bg, $bg, $bg, $bg);
        imagesetstyle($img, $style);
        imageline($img, 610, $dots1[7], 710, $dots1[7], IMG_COLOR_STYLED);//绘制标记线
        $filename =date('Y-m-d',time()).mt_rand(1000, 100000).'.png';
        imagepng($img,"images/".$filename);     //在我们的当前目录下就可以看到一个filename.png图片
        imagedestroy($img);
        $img=__ROOT__.'/images/'.$filename;
        $res=[$p,$e,$img]; 
        return $res;
    }
    
    public function push($arr){
        if(count($arr)<3){
            for($i=count($arr);$i<3;$i++){
                $arr[$i] = 0;
            }
            return $arr;
        }else{
            $tmp = $arr[0];
            $arr[0]=$arr[2];
            $arr[2] =$tmp;
            return $arr;
        }
        
    }
    
    public function dian($dd,$arr,$arr1){ //定点
        for($i=0;$i<count($dd);$i++){
            for($j=0;$j<count($arr[$i]);$j++){
                if($dd[$i]<$arr[$i][$j]){
                    continue;
                }else{
                    //echo $dd[$i].'??'.$arr[$i][$j].'/';
                    $dots[]=($dd[$i]-$arr[$i][$j])/($arr[$i][$j-1]-$arr[$i][$j])*($arr1[$i][$j-1]-$arr1[$i][$j])+$arr1[$i][$j];
                    break;
                }
            }
        }
        return $dots;
    }
    
    public function cyc(){  //行为表现图
        $stu_id=cookie(stu_id);
        $stu_name =M('stu_info')->where('stu_id ='.$stu_id)->getField('stu_name');
        $data['kind_id']=8;
        $data['stu_id']=$stu_id;
        $data['type']=1;
        $res=M('assess_record')->where($data)->order(array('a_id'=>'desc'))->limit(3)->select();
        if(count($res)!=0){
            $img =$this->cyc1($res);
            $arr = [$res,$stu_name,$img];  
        }else{
            $arr='';
        }
        return $arr;
    }
    
    public function cyc1($arr){
            $k = $_GET['times']?$_GET['times']:($arr[count($arr)-1]["a_id"]);
            $info=M('item_values')->where('a_id='.$k)->select();
            $arr = $this->oval($info);
            header("content-type: image/png");
            $im = imagecreate(650, 700);//创建一个650X750像素的图像
            $bg = imagecolorallocatealpha($im, 255, 255, 255,127);//设置图像的背景颜色
            $red = imagecolorallocate($im,255,0,0);//创建一个颜色，以供使用
            for($i=0;$i<51;$i++){
                imageline($im, $arr[0][$i], $arr[1][$i], $arr[0][$i+1], $arr[1][$i+1], $red);//绘制一条线
            }
            imageline($im, $arr[0][51], $arr[1][51], $arr[0][0], $arr[1][0], $red);//绘制一条线
            $filename =date('Y-m-d',time()).mt_rand(1000, 100000).'.png';
            imagepng($im,"images/".$filename);
            imagedestroy($im);
            $img=__ROOT__.'/images/'.$filename;
            return $img;
    }
    
    public function oval($arr) //定点
    {
        foreach($arr as $k=>$v){
            $du = 270+$k*360/52;
            if($v["items_values"] =="S"){
                $x[] =312.5+132.5*cos($du*3.14/180); //小圆X坐标
                $y[] =307.5+132.5*sin($du*3.14/180);//小圆Y坐标
            }elseif ($v["items_values"] =="M"){
                $x[] =314+199*cos($du*3.14/180);//中圆X坐标
                $y[] =306+199*sin($du*3.14/180);//中圆Y坐标
            }elseif ($v["items_values"] =="A"){
                $x[] =314+266*cos($du*3.14/180);//大圆X坐标
                $y[] =304+270*sin($du*3.14/180);//大圆Y坐标
            }else{
                $x[] =314+266*cos($du*3.14/180);//大圆X坐标
                $y[] =304+270*sin($du*3.14/180);//大圆Y坐标
            }
        }
        $res[0]=$x;
        $res[1]=$y;
        return $res;
    }
    
    public function getPef($kind_id)  //获取P、E、F、A/M/S
    {
        switch ($kind_id){
            case '1':
                $kind_name1='感知觉';
                break;
            case '2':
                $kind_name1='粗大动作';
                break;
            case '1':
                $kind_name1='精细动作';
                break;
            case '1':
                $kind_name1='语言与沟通';
                break;
            case '1':
                $kind_name1='认知';
                break;
            case '1':
                $kind_name1='社会交往';
                break;
            case '1':
                $kind_name1='生活自理';
                break;
            case '1':
                $kind_name1='情绪行为';
                break;
        }
        $data['kind_id']= $_GET['kind_id'];
        $scale_kind = M('scale_kind');
        $res1 = $scale_kind->limit(8)->select();  //分类菜单      
        $kind_name = $scale_kind->where($data)->getField('kind_name');
        $stu = M('stu_info');
        $data['stu_id'] = cookie('stu_id');
        $stu_name = $stu->where($data)->getField('stu_name');
        $items_values = M('item_values');
        $assess = M('assess_record');
        $data['type']=1;
        $arr = $assess->where($data)->order('a_id desc')->limit(3)->select();//三次记录
        $aa = $assess->where($data)->order('a_id desc')->select(); //所有记录
        foreach($aa as $k=>$v)
        {
            $a_id= $v["a_id"] ;
            $sql = "select count(v_id) from ((((item_values inner join items on item_values.item_id = items.item_id
            and item_values.items_values='P')
            inner join scales on items.s_id = scales.s_id) inner join modules_scales on scales.s_m_id =
            modules_scales.s_m_id) inner join scale_kind on modules_scales.kind_id = scale_kind.kind_id)
            where scale_kind.kind_id = '$kind_id' and item_values.a_id='$a_id'  ";
            $ee[] = $items_values->query($sql); //计算P的值
            $sql4 = "select count(v_id) from ((((item_values inner join items on item_values.item_id = items.item_id
            and item_values.items_values='A')
            inner join scales on items.s_id = scales.s_id) inner join modules_scales on scales.s_m_id =
            modules_scales.s_m_id) inner join scale_kind on modules_scales.kind_id = scale_kind.kind_id)
            where scale_kind.kind_id = '$kind_id' and item_values.a_id='$a_id'";
            $az[] = $items_values->query($sql4); //计算A的值
        }
        $allE[0]='0';
        $Et[0] ='';
        for($j=count($ee)-1,$i=0;$j>=0;$j--,$i++)
        {
            $allE[$i+1]= $ee[$j][0]["count(v_id)"]; //E的数组
            $Et[$i+1] = $i+1;
        }
        $allA[0]='0';
        $At[0] ='';
        for($j=count($az)-1,$i=0;$j>=0;$j--,$i++)
        {
            $allA[$i+1]= $az[$j][0]["count(v_id)"]; //E的数组
            $At[$i+1] = $i+1;
        }
        
        foreach($arr as $k=>$v)
        {
            $a_id= $v["a_id"] ;
            $sql = "select count(v_id) from ((((item_values inner join items on item_values.item_id = items.item_id
            and item_values.items_values='P')
            inner join scales on items.s_id = scales.s_id) inner join modules_scales on scales.s_m_id =
            modules_scales.s_m_id) inner join scale_kind on modules_scales.kind_id = scale_kind.kind_id)
            where scale_kind.kind_id = '$kind_id' and item_values.a_id='$a_id' ";
            $res[] = $items_values->query($sql); //计算P的值
            	
            $sql2 = "select count(v_id) from ((((item_values inner join items on item_values.item_id = items.item_id
            and item_values.items_values='E')
            inner join scales on items.s_id = scales.s_id) inner join modules_scales on scales.s_m_id =
            modules_scales.s_m_id) inner join scale_kind on modules_scales.kind_id = scale_kind.kind_id)
            where scale_kind.kind_id = '$kind_id' and item_values.a_id='$a_id'  ";
            $res2[] = $items_values->query($sql2); //计算E的值
            	
            $sql3 = "select count(v_id) from ((((item_values inner join items on item_values.item_id = items.item_id
            and item_values.items_values='F')
            inner join scales on items.s_id = scales.s_id) inner join modules_scales on scales.s_m_id =
            modules_scales.s_m_id) inner join scale_kind on modules_scales.kind_id = scale_kind.kind_id)
            where scale_kind.kind_id = '$kind_id' and item_values.a_id='$a_id' ";
            $res3[] = $items_values->query($sql3); //计算F的值
            	
            $sql4 = "select count(v_id) from ((((item_values inner join items on item_values.item_id = items.item_id
            and item_values.items_values='A')
            inner join scales on items.s_id = scales.s_id) inner join modules_scales on scales.s_m_id =
            modules_scales.s_m_id) inner join scale_kind on modules_scales.kind_id = scale_kind.kind_id)
            where scale_kind.kind_id = '$kind_id' and item_values.a_id='$a_id'";
            $res4[] = $items_values->query($sql4); //计算A的值
            	
            $sql5 = "select count(v_id) from ((((item_values inner join items on item_values.item_id = items.item_id
            and item_values.items_values='M')
            inner join scales on items.s_id = scales.s_id) inner join modules_scales on scales.s_m_id =
            modules_scales.s_m_id) inner join scale_kind on modules_scales.kind_id = scale_kind.kind_id)
            where scale_kind.kind_id = '$kind_id' and item_values.a_id='$a_id' ";
            $res5[] = $items_values->query($sql5); //计算M的值
            	
            $sql6 = "select count(v_id) from ((((item_values inner join items on item_values.item_id = items.item_id
            and item_values.items_values='S')
            inner join scales on items.s_id = scales.s_id) inner join modules_scales on scales.s_m_id =
            modules_scales.s_m_id) inner join scale_kind on modules_scales.kind_id = scale_kind.kind_id)
            where scale_kind.kind_id = '$kind_id' and item_values.a_id='$a_id' ";
            $res6[] = $items_values->query($sql6); //计算S的值
            	
        }
        $sum2[0]='0';
        $sum5[0]=0;
        $times[0] ='';
        $num=count($res)>3 ?count($res)-3:0;
        for($j=count($res)-1,$i=0;$j>=0;$j--,$i++)
        {
            $sum[$i]= $res[$j][0]["count(v_id)"]; //P的数组
            $sum2[$i+1]= $res2[$j][0]["count(v_id)"]; //E的数组
            $sum5[$i+1]= $res5[$j][0]["count(v_id)"]; //M的数组
            $sum3[$i]= $res3[$j][0]["count(v_id)"]; //F的数组
            $sum4[$i]= $res2[$j][0]["count(v_id)"]; //E的数组
            $sum6[$i]= $res4[$j][0]["count(v_id)"]; //A的数组
            $sum8[$i]= $res5[$j][0]["count(v_id)"]; //M的数组
            $sum7[$i]= $res6[$j][0]["count(v_id)"]; //S的数组
            	
            $times[$i+1] = "第".($i+1)."次".'　评估人：'.$arr[$j]['a_er'];
            $times1[$i] = "第".($i+1)."次".'　评估人：'.$arr[$j]['a_er'];;
        }
        //折线图
        $arr1['labels']=$Et;
        $datasets1 = array('fillColor'=>"rgba(151,187,205,0.5)",'strokeColor' =>"rgba(13,85,126,1)",
            'pointColor' => "rgba(151,187,205,1)",'pointStrokeColor'=>"#fff");
        $datasets1['data'] = $allE;
        $datasets = array(0 => $datasets1);
        $arr1['datasets'] =$datasets;
        $arr1 =json_encode($arr1);
        
        $arr3['labels']=$At;
        $datasets8 = array('fillColor'=>"rgba(151,187,205,0.5)",'strokeColor' =>"rgba(13,85,126,1)",
            'pointColor' => "rgba(151,187,205,1)",'pointStrokeColor'=>"#fff");
        $datasets8['data'] = $allA;
        $datasets8 = array(0 => $datasets8);
        $arr3['datasets'] =$datasets8;
        $arr3 =json_encode($arr3);
        //dump($arr1);
        
        //柱状图
        $arr2['labels']=$times1;
        $datasets3 = array('fillColor'=>"rgba(151,187,205,0.5)",'strokeColor' =>"rgba(13,85,126,0.5)",
            'highlightFill' => "rgba(151,187,205,1)",'highlightStroke'=>"#fff");
        $datasets3['data'] = $sum;
        $datasets5 =array('fillColor'=>"rgba(30,10,247,0.5)",'strokeColor'=>"rgba(41,13,1,0.5)",
            ' highlightFill'=>"rgba(151,187,205,1)",'highlightStroke'=>"#fff");
        $datasets5['data'] = $sum3;
        $datasets4 = array('fillColor'=>"rgba(247,46,10,0.5)",'strokeColor' =>"rgba(245,52,15,0.5)",
            ' highlightFill' => "rgba(10,47,150,1)",'highlightStroke'=>"#fff");
        $datasets4['data'] = $sum4;
        $datasets6 = array(0 => $datasets3,1=>$datasets4,2=>$datasets5);
        $arr2['datasets']=$datasets6;
        $arr2 =json_encode($arr2);
        //A、M、S的柱状图
        $arr4['labels']=$times1;
        $datasets9 = array('fillColor'=>"rgba(151,187,205,0.5)",'strokeColor' =>"rgba(13,85,126,0.5)",
            'highlightFill' => "rgba(151,187,205,1)",'highlightStroke'=>"#fff");
        $datasets9['data'] = $sum6;
        $datasets10 =array('fillColor'=>"rgba(30,10,247,0.5)",'strokeColor'=>"rgba(41,13,1,0.5)",
            ' highlightFill'=>"rgba(151,187,205,1)",'highlightStroke'=>"#fff");
        $datasets10['data'] = $sum8;
        $datasets11 = array('fillColor'=>"rgba(247,46,10,0.5)",'strokeColor' =>"rgba(245,52,15,0.5)",
            ' highlightFill' => "rgba(10,47,150,1)",'highlightStroke'=>"#fff");
        $datasets11['data'] = $sum7;
        $datasets12 = array(0 => $datasets9,1=>$datasets10,2=>$datasets11);
        $arr4['datasets']=$datasets12;
        $arr4 =json_encode($arr4);
        $info=[$kind_name1,$arr1,$arr2,$arr3,$arr4,$res1,$stu_name];
        return $info;
    }
    
    public function getPic(){
        $stu_name = M('stu_info')->where('stu_id="'.cookie('stu_id').'"')->getField('stu_name');
        $sql ='select max(a_id),kind_id from (select kind_id,a_id from assess_record order by a_id desc) as
	        t group by kind_id';
        $info =M('assess_record')->query($sql);
        //dump($info);
        foreach($info as $v)
        {
            $data['kind_id']=$v["kind_id"];
            $data['a_id']=$v["max(a_id)"];//对应的a_id
            if($v["kind_id"]==1) //感知觉
            {
                $data['items_values']='P';
                $g1 = M('item_values')->where($data)->count();//统计P的个数
                $data['items_values']='E';
                $g2 = M('item_values')->where($data)->count();//统计E的个数
                $data['items_values']='F';
                $g3 = M('item_values')->where($data)->count();//统计F的个数
            }elseif($v["kind_id"]==2) //粗大动作
            {
                $data['items_values']='P';
                $c1 = M('item_values')->where($data)->count();//统计P的个数
                $data['items_values']='E';
                $c2 = M('item_values')->where($data)->count();//统计E的个数
                $data['items_values']='F';
                $c3 = M('item_values')->where($data)->count();//统计F的个数
            }elseif($v["kind_id"]==3) //精细动作
            {
                $data['items_values']='P';
                $j1 = M('item_values')->where($data)->count();//统计P的个数
                $data['items_values']='E';
                $j2 = M('item_values')->where($data)->count();//统计E的个数
                $data['items_values']='F';
                $j3 = M('item_values')->where($data)->count();//统计F的个数
            }elseif($v["kind_id"]==4) //语言沟通
            {
                $data['items_values']='P';
                $y1 = M('item_values')->where($data)->count();//统计P的个数
                $data['items_values']='E';
                $y2 = M('item_values')->where($data)->count();//统计E的个数
                $data['items_values']='F';
                $y3 = M('item_values')->where($data)->count();//统计F的个数
            }elseif($v["kind_id"]==5) //认知
            {
                $data['items_values']='P';
                $r1 = M('item_values')->where($data)->count();//统计P的个数
                $data['items_values']='E';
                $r2 = M('item_values')->where($data)->count();//统计E的个数
                $data['items_values']='F';
                $r3 = M('item_values')->where($data)->count();//统计F的个数
            }elseif($v["kind_id"]==6) //社会交往
            {
                $data['items_values']='P';
                $s1 = M('item_values')->where($data)->count();//统计P的个数
                $data['items_values']='E';
                $s2 = M('item_values')->where($data)->count();//统计E的个数
                $data['items_values']='F';
                $s3 = M('item_values')->where($data)->count();//统计F的个数
            }elseif($v["kind_id"]==7) //生活自理
            {
                $data['items_values']='P';
                $l1 = M('item_values')->where($data)->count();//统计P的个数
                $data['items_values']='E';
                $l2 = M('item_values')->where($data)->count();//统计E的个数
                $data['items_values']='F';
                $l3= M('item_values')->where($data)->count();//统计F的个数
            }
        }
        $arr['labels'] =['感知觉','粗大动作','精细动作','语言与沟通','认知','社会交往','生活自理'];
        $p=[$g1,$c1,$j1,$y1,$r1,$s1,$l1];
        $e=[$g2,$c2,$j2,$y2,$r2,$s2,$l2];
        $f=[$g3,$c3,$j3,$y3,$r3,$s3,$l3];
        $datasets[0] = [
            'fillColor' => "rgba(151,187,205,0.5)",
            'strokeColor' => "rgba(113,157,180,0.5)",
            'data' => $p
        ];
        $datasets[1] = [
            'fillColor'=> "rgba(250,137,116,0.5)",
            'strokeColor' => "rgba(255,0,0,0.5)",
            'data' => $e
        ];
        $datasets[2] = [
            'fillColor'=> "rgba(121,111,242,0.5)",
            'strokeColor' => "rgba(80,64,108,0.5)",
            'data' => $f
        ];
        
        $arr['datasets']=$datasets;
        $arr= json_encode($arr);//柱状图
        //雷达图
        $arr1['labels'] =['感知觉','粗大动作','精细动作','语言与沟通','认知','社会交往','生活自理'];
        $score = [$g1*2+$g2,$c1*2+$c2,$j1*2+$j2,$y1*2+$y2,$r1*2+$r2,$s1*2+$s2,$l1*2+$l2];
        $datasets1[0] = [
            'fillColor' => "rgba(151,187,205,0.5)",
            'strokeColor' => "rgba(113,157,180,0.5)",
            'pointColor' => "rgba(220,220,220,1)",
            'pointStrokeColor' => "#fff",
            'data' => $score  //得分
        ];
        
        $arr1['datasets']=$datasets1;
        $arr1= json_encode($arr1);
        $res = [$arr,$arr1, $stu_name];
        return $res;
    }
    
    public function allPlan($stu_id,$res1){   //教育计划
        $res =M("Plan")->where('stu_id='.$stu_id)->select();
        if(count($res)!=0){
            foreach($res1 as $k=>$v){
                $all[$k] =[$v["standard"],$v["form"],$v["longer"],$v["start"],$v["end"]];
                if($v !=null){
                    $total[]=M("assess_record")->where('a_id='.$v["a_id"])->getField(e);//获取e
                }
                
            }
            foreach($total as $v){
                $e[]=explode(',',$v);
            }
            
            foreach($e as $k=>$v1)  //小模块
            {
                foreach ($v1 as $v2){
                    if($v2 !=''){
                        $x[]=M("items")->where('item_id='.$v2)->getField('item_title');
                        $xx[]=M("items")->where('item_id='.$v2)->getField('s_id');
                        $sql = "select distinct scales.s_title from (scales inner join items on scales.s_id = items.s_id) where items.item_id='$v2' ";
                        $z= M("items")->query($sql); //计算E/M的值
                        $zz[$k][]=$z[0]["s_title"];
                    }
                }
            }
            
            foreach($zz as &$v){  //去除重复值
                $v = array_unique($v);
            }
            for($i=0;$i<count($zz);$i++)  //重新排列下标
            {
                $z=0;
                $m=max(array_keys($zz[$i]));
                for($j=0;$j<$m+1;$j++)
                {
                    if($zz[$i][$j]!=''){
                        $zs[$i][$z]=$zz[$i][$j];
                        ++$z;
                    }
                }
            }
            for($i=1;$i<9;$i++){  //大模块
                $d[$i-1][]=M("scale_kind")->where('kind_id='.$i)->getField(kind_name);
            }
            $j=0;
            for($i=0;$i<count($xx);$i++)  //子模块
            {
                if($xx[$i]==$xx[$i+1]){
                    $ix[$j][$i]=$x[$i];
                }else{
                    $ix[$j][$i]=$x[$i];
                    ++$j;
                }
            }
            $mm=0;
            for($i=0;$i<count($zs);$i++){   //子模块重组
                for($j=0;$j<count($zs[$i]);$j++){
                    $zm[$i][$j]=$ix[$mm];
                    $mm++;
                }
            }
            //dump($zm);exit;
            
            for($i=0;$i<count($zm);$i++)  //子模块重新排列下标
            {
                for($j=0;$j<count($zm[$i]);$j++)
                {
                    $p=0;
                    $m=max(array_keys($zm[$i][$j]));
                    for($z=0;$z<$m+1;$z++){
                        if($zm[$i][$j][$z]!=''){
                            $xs[$i][$j][$p]=$zm[$i][$j][$z];
                            ++$p;
                        }
                    }
                }
            }
    
            
             
            //                        dump($f);
//                                  dump($d); //大模块
                                // dump($zs); //小模块
            //                    dump($xs);  //子模块
            //                      exit;
            //exit;
            $time=M("assess_record")->where('stu_id='.$stu_id)->getField(a_time);
            $a_er=M("assess_record")->where('stu_id='.$stu_id)->getField(a_er);
            $arr=[$d,$zs,$xs,$all,$a_er,$time];
            return $arr;
        }else{
            $this->error('暂时还没有教育计划，请先对学生进行评估！',U('Record/add_record?stu_id='.$stu_id),2);
        }
    }
    
    public function edu_Plan($kind_id,$a_id,$t,$ez,$pla)
    {  //教育计划
    $stu_name = M('stu_info')->where('stu_id='.cookie('stu_id'))->getField('stu_name');
    $a_er =M('assess_record')->where('a_id='.$a_id)->find(); //获得评估者
    $kind_name= M('scale_kind')->where('kind_id='.$kind_id)->getField('kind_name');
    $total = explode('*',$t);
    $e=explode(',',$total[1]);
    $items=M("items");
    foreach($e as $v)
    {
        $sql = "select scales.s_title from (scales inner join items on scales.s_id = items.s_id) where items.item_id='$v' ";
        $res= $items->query($sql); //计算E/M的值
        $arr[]=$res[0]["s_title"];
    }
    array_pop($arr); //去除末尾空值
    $j=0;
    if($pla !=""){
        $standard = $pla["standard"];
        $form=$pla["form"];
        $longer=$pla["longer"];
        $start=$pla["start"];
        $end=$pla["end"];
    
    }
    $ee[0][0]=$ez[0];
    // 		$ff[0][0]=$form[0];
    // 		$ll[0][0]=$longer[0];
    // 		$ss[0][0]=$start[0];
    // 		$nn[0][0]=$end[0];
    for($i=0;$i<count($arr)-1;$i++)
    {
        if($arr[$i]==$arr[$i+1]){
            $ee[$j][$i+1]=$ez[$i+1];
            // 		       $ff[$j][$i+1]=$form[$i+1];
            // 		       $ll[$j][$i+1]=$longer[$i+1];
            // 		       $ss[$j][$i+1]=$start[$i+1];
            // 		       $nn[$j][$i+1]=$end[$i+1];
        }else{
            ++$j;
            $ee[$j][$i+1]=$ez[$i+1];
            // 		       $ff[$j][$i+1]=$form[$i+1];
            // 		       $ll[$j][$i+1]=$longer[$i+1];
            // 		       $ss[$j][$i+1]=$start[$i+1];
            // 		       $nn[$j][$i+1]=$end[$i+1];
        }
    }
    
    $arr=array_unique($arr); //去除重复值
    $j=0;
    foreach($arr as $k=>$v){
        if($v==''){
            unset($v);
        }else{
            $jn[$j][0]=$v;
            $j++;
        }
    }
    $res=[$jn,$ee,$standard,$form,$longer,$start,$end];
    return $res;
    }
    
}