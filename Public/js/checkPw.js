function checkOld(str) //判断原始密码
	{
		var info = "n="+str;
		var url="Check_OldPwd";
		if(str.length==0)
		{
			document.getElementById("old").innerHTML="* 必填信息";
			return;
		}
		// Ajax开始
		var xmlhttp;
		// Ajax开始
		if (window.XMLHttpRequest)
		{// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		}
		
		xmlhttp.onreadystatechange=function()
		{
		  if (xmlhttp.readyState==4)
		  {
			  document.getElementById("old").innerHTML=xmlhttp.responseText;
		  }
		}
		xmlhttp.open('post',url);
		xmlhttp.setRequestHeader("content-type","application/x-www-form-urlencoded"); //使用post必须加上
		xmlhttp.send(info);
	}
//判断密码的长度
function checkLength(str)
{
    if(str.length==0)
    {
        document.getElementById("pw").innerHTML="* 必填信息";
    }else if((str.length<6)&&(str.length>0))
    {
        document.getElementById("pw").innerHTML="密码长度小于六,请重新设置！";
        document.getElementById("new_pwd1").readOnly=true;
    }else{
        document.getElementById("pw").innerHTML="<span style='color:green;'>✔</span>";
        document.getElementById("new_pwd1").readOnly=false;
    }
}

 //验证密码
function checkPw(string) {
    if(string.length >=6) {
        if(/[a-zA-Z]+/.test(string) && /[0-9]+/.test(string) && /\W+\D+/.test(string)) {
            noticeAssign(1); //强的模式
        }else if(/[a-zA-Z]+/.test(string) || /[0-9]+/.test(string) || /\W+\D+/.test(string)) {
            if(/[a-zA-Z]+/.test(string) && /[0-9]+/.test(string)) {
                noticeAssign(-1);  //中等模式
            }else if(/\[a-zA-Z]+/.test(string) && /\W+\D+/.test(string)) {
                noticeAssign(-1);
            }else if(/[0-9]+/.test(string) && /\W+\D+/.test(string)) {
                noticeAssign(-1);
            }else{
                noticeAssign(0); //弱的模式
            }
        }
    }else{

        return ; 
    }
}
 
function noticeAssign(num) {
    if(num == 1) {
        $('#weak').css({backgroundColor:''});
        $('#middle').css({backgroundColor:''});
        $('#strength').css({backgroundColor:'#6CA100'});
        $('#weak').html('弱');
        $('#middle').html('中');
        $('#strength').html('强');
    }else if(num == -1){
        $('#weak').css({backgroundColor:''});
        $('#middle').css({backgroundColor:'#F97F10'});
        $('#strength').css({backgroundColor:''});
        $('#weak').html('弱');
        $('#middle').html('中');
        $('#strength').html('强');
    }else if(num ==0) {
        $('#weak').css({backgroundColor:'#EA3D01'});
        $('#middle').css({backgroundColor:''});
        $('#strength').css({backgroundColor:''});
        $('#weak').html('弱');
        $('#middle').html('中');
        $('#strength').html('强');
    }else{
        
    }
}

//判断确认密码的值
function reCheck(str)
{

    if(str.length!=0)
    {
        var pwd= document.getElementById('new_pwd').value;
        if(str==pwd)
        {
            document.getElementById("pw1").innerHTML="<span style='color:green;'>✔</span>";
        }else{
            document.getElementById("pw1").innerHTML="两次输入的密码不相等！"
        }
    }   
}
//判断添加的用户信息
function inputNm(str)
{
	var info = "n="+str;
	var url="checkNm";
	if(str.length==0)
	{
		document.getElementById("Um").innerHTML="* 必填信息";
		return;
	}
	// Ajax开始
	var xmlhttp;
	// Ajax开始
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	}
	
	xmlhttp.onreadystatechange=function()
	{
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	  {
	    document.getElementById("Um").innerHTML=xmlhttp.responseText;
	  }
	}
	xmlhttp.open('post',url);
	xmlhttp.setRequestHeader("content-type","application/x-www-form-urlencoded"); //使用post必须加上
	xmlhttp.send(info);
}

function checkNum(str)  //判断学号是否有重复
{
	var info = "n="+str;
	var url="checkNm";
	if(str.length==0)
	{
		document.getElementById("num").innerHTML="<span style='color:red;'>&nbsp;&nbsp;*</span>";
		return;
	}
	// Ajax开始
	var xmlhttp;
	// Ajax开始
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	}
	
	xmlhttp.onreadystatechange=function()
	{
	  if (xmlhttp.readyState==4)
	  {
		  document.getElementById("num").innerHTML=xmlhttp.responseText;
	  }
	}
	xmlhttp.open('post',url);
	xmlhttp.setRequestHeader("content-type","application/x-www-form-urlencoded"); //使用post必须加上
	xmlhttp.send(info);
}

function setDetailMsgRow(rowID) {   //添加家庭其他成员
	var r = document.getElementById(rowID);
    if (r != null) {
        if (r.style.display == (document.all ? "block" : "table-row")) {
            r.style.display = "none";
        }
        else {
            r.style.display = (document.all ? "block" : "table-row");
        }
    }
}
function onCheck()  //添加其他障碍信息
{
	if(document.getElementById("check1").checked){
	    
		document.getElementById("others").readOnly=false;
		
	}else{
		document.getElementById("others").readOnly=true;
	}
}
function change_img(str) //更换头像
{
	if(str=="女")
	{
		document.getElementById("im").src=pub+"/images/girl.png";
	}else{
		document.getElementById("im").src=pub+"/images/boy.png";
	}
} 

function add(){   //添加量表信息
    var input1 = document.createElement('input');
    input1.setAttribute('type', 'text');
    input1.setAttribute("name", "scale[]");
    var btn1 = document.getElementById("org");
    btn1.insertBefore(input1,null);
}

