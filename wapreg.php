<?php
error_reporting(0);
session_start();
header('Content-type: text/html; charset=utf-8');
require("data/head.php"); 
include_once("sms/Sms.php");
if (file_exists("themes/".$cf['agent_themes'])){
require("themes/".$cf['agent_themes']."/wapreg.html");
}else{
echo "模板读取错误！请检测模板文件夹themes/{$cf['agent_themes']}是否存在!";	
}	
?>
<?php
if($act == "regagent")
{

    $agentid      = trim($_REQUEST["agentid"]);

	$product      = trim($_REQUEST["product"]);

	$quyu         = trim($_REQUEST["quyu"]);

	$idcard        = trim($_REQUEST["idcard"]);

	$url          = strreplace(trim($_REQUEST["url"]));

	$qudao        = trim($_REQUEST["qudao"]);

	$about        = strreplace(trim($_REQUEST["about"]));

	$addtime      = trim($_REQUEST["addtime"]);

	$jietime      = trim($_REQUEST["jietime"]);

	$name         = trim($_REQUEST["name"]);

	$tel          = trim($_REQUEST["tel"]);

	$phone        = trim($_REQUEST["phone"]);

	$qq           = trim($_REQUEST["qq"]);

	$weixin       = trim($_REQUEST["weixin"]);

	$sjdls     = trim($_REQUEST["sjdls"]);

	$dizhi        = strreplace(trim($_REQUEST["dizhi"]));

	$beizhu       = strreplace(trim($_REQUEST["beizhu"]));

    $shzt       = trim($_REQUEST["shzt"]);
	
	$hmd      = trim($_REQUEST["hmd"]);
	
	$yzm = trim($_REQUEST["yzm"]);
	
	$password       = md5(trim($_REQUEST["password"]));
	
	$applytime       = trim($_REQUEST["applytime"]);

   $dengji       = trim($_REQUEST["dengji"]);
   
   if($agentid=="")

	{

	echo "<script>layer.open({content: '代理商编号不能为空!',skin: 'footer',time: 2});</script>";
	exit;

	}
	
	if($name=="")
	{
	echo "<script>layer.open({content: '姓名不能为空!',skin: 'footer',time: 2});</script>";
	exit;
	}
	if($phone=="")
	{
	echo "<script>layer.open({content: '手机号码不能为空!',skin: 'footer',time: 2});</script>";
	exit;
	}
	if (strlen($phone) != "11") {
 
   echo "<script>layer.open({content: '手机号格式不对!',skin: 'footer',time: 2});</script>";
   exit;
   }
	if($weixin=="")
	{
	echo "<script>layer.open({content: '微信号不能为空!',skin: 'footer',time: 2});</script>";
	exit;
	}
	if($idcard=="")
	{
	echo "<script>layer.open({content: '身份证号不能为空!',skin: 'footer',time: 2});</script>";
	exit;
	}
	if($quyu=="")
	{
	echo "<script>layer.open({content: '期待代理的区域不能为空!',skin: 'footer',time: 2});</script>";
	exit;
	}
	if($cf['yzm_status'] == 1 && $yzm != $_SESSION['authnum_session'])
		{
	echo "<script>layer.open({content: '验证码错误!',skin: 'footer',time: 2});</script>";
	exit;
		}    

		
	 ///获取上级代理商关联信息
	$sql2="select * from tgs_agent where weixin='$sjdls' limit 1";
	$result2=mysql_query($sql2);
	$arrr=mysql_fetch_array($result2);
	$sjdlid      = $arrr["id"];
	$sjphone      =$arrr['phone'];
	$mysjdl      =$arrr['name'];
	
	///获取关联等级名称
	$sql3="select * from tgs_dljb where id='$dengji' limit 1";
	$result3 = mysql_query($sql3);
	$arr3=mysql_fetch_array($result3);
	$mydljb = $arr3['dljb'];
	
	///获取关联代理产品名称
	$sql4="select * from tgs_pro where id='$product' limit 1";
	$result4 = mysql_query($sql4);
	$arr4=mysql_fetch_array($result4);
	$myproduct = $arr4['pro_name'];	
		
		
		
	if(empty($sjdls)){
}
else{

	if($sjdlid=="")

	{

	  
	  echo "<script>layer.open({content: '上级代理微信号不存在!',skin: 'footer',time: 2});</script>";

	  exit;

	}
}
	
	
	

	$sql = "select * from tgs_agent where weixin='".$weixin."' limit 1";

	$res = mysql_query($sql);

	$arr = mysql_fetch_array($res);

	if(mysql_num_rows($res)>0){

	   echo "<script>layer.open({content: '微信号已存在!',skin: 'footer',time: 2});</script>";

	  exit;

	}
	
	$sql = "select * from tgs_agent where phone='".$phone."' limit 1";

	$res = mysql_query($sql);

	$arr = mysql_fetch_array($res);

	if(mysql_num_rows($res)>0){

	  echo "<script>layer.open({content: '手机号已存在!',skin: 'footer',time: 2});</script>";

	  exit;

	}

	$sql="insert into tgs_agent (agentid,product,quyu,idcard,about,addtime,jietime,name,tel,phone,weixin,dizhi,beizhu,sjdl,hmd,shzt,password,applytime,qq,dengji)values('$agentid','$product','$quyu','$idcard','$about','$addtime','$jietime','$name','$tel','$phone','$weixin','$dizhi','$beizhu','$sjdlid','$hmd','$shzt','$password','$applytime','$qq','$dengji')";

	mysql_query($sql);

	
	///短信通知开始，调用阿里大于短信
if($sjphone==""){$sjphone = $cf['admin_phone'];}
$demo = new SmsDemo(
    $cf['sms_user'],
    $cf['sms_key']
);
$response = $demo->sendSms(
    $cf['sms_qm'], // 短信签名
    $cf['sms_mb_txsh'], // 短信模板编号
	$sjphone, // 短信接收者
    Array(  // 短信模板中字段的值
        "name"=> $name,
        "phone"=> $phone,
		"sjdl"=> $mysjdl,
        "dljb"=> $mydljb,
		"dlbh"=> $agentid,
		"weixin"=>$weixin,
		"product"=>$myproduct,
        "quyu"=>$quyu,
		"kssj"=>$addtime,
		"dqsj"=>$jietime,
        "sfz"=>$idcard,
		"qq"=>$qq
    ),
    "123"
);
$response = $demo->queryDetails(
    $sjphone,  // phoneNumbers 电话号码
    date("Y-m-d"), // sendDate 发送时间
    10, // pageSize 分页大小
    1 // currentPage 当前页码
    // "abcd" // bizId 短信发送流水号，选填
);
////短信发送完成。
    echo "<script>layer.open({content: '申请提交成功，请等待审核！<br>审核通过后，我们会短信通知您！',skin: 'msg',time: 10});</script>";
	

}
?>

