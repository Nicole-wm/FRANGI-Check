<?php
error_reporting(0);
header('Content-type: text/html; charset=utf-8');
require(dirname(__FILE__)."/../data/head.php");
$keyword = trim($_GET["keyword"]);	
//读取代理商信息
$sql="select * from tgs_agent where weixin='$keyword' or qq='$keyword' or phone='$keyword' or agentid='$keyword'  limit 1";
	$result=mysql_query($sql);
	$arr=mysql_fetch_array($result);
	$agentid      = $arr["agentid"];//代理编号
	$productid      = $arr["product"];//代理产品
	$quyu         = $arr["quyu"];//代理区域
	$addtime      = $arr["addtime"];//代理开始时间
	$jietime      = $arr["jietime"];//代理结束时间
	$name         = $arr["name"];//代理商姓名
	$phone        = $arr["phone"];//代理商手机号
	$qq           = $arr["qq"];//代理商QQ号
	$weixin       = $arr["weixin"];//代理商微信号
	$sjdl         = $arr["sjdl"];//上级代理商
	$idcard         = $arr["idcard"];//上级代理商
	$dljbid         = $arr["dengji"];//代理级别ID
	
////读取产品名称	
$sql0 = "select * from tgs_pro where id=".$productid." limit 1";
$res0 = mysql_query($sql0);
$arr0 = mysql_fetch_array($res0);
$product  = $arr0['pro_name'];
////读取代理级别	
$sql2 = "select * from tgs_dljb where id=".$dljbid." limit 1";
$res2 = mysql_query($sql2);
$arr2 = mysql_fetch_array($res2);
$dljb  = $arr2['dljb'];
$zsid  = $arr2['zsid'];
////读取证书分类
$sql3 = "select * from tgs_zsmb where id=".$zsid." limit 1";
$res3 = mysql_query($sql3);
$arr3 = mysql_fetch_array($res3);
$zsflid  = $arr3['id'];
$zsbg  = $arr3['zsbg'];
$myzsbg=$cf['site_url'].$zsbg;
$img_info = getimagesize($myzsbg); ///自动获取上传的证书高和宽
$width=$img_info[0];
$height= $img_info[1];
$img_info2 =pathinfo($myzsbg);///取得证书背景的格式

//根据背景图片的格式，来分析使用哪种

if($img_info2[extension]=="jpeg" or $img_info2[extension]=="jpg"){
$im = imagecreatefromjpeg($myzsbg);
}
if($img_info2[extension]=="png" ){
$im = imagecreatefrompng($myzsbg);
}

if($img_info2[extension]=="gif"){
$im = imagecreatefromgif($myzsbg);
}

//定义文字的位置 三个数字分别为斜度，X和Y坐标
$sqls="select * from tgs_zszdcs  where mbid=".$zsflid." ";
$zsarr=mysql_query($sqls);
while( $rows=mysql_fetch_array($zsarr) )
{
///颜色定义
$nc=explode(",",substr($rows['zdcolor'],5,-3));
$color=imagecolorallocate($im,$nc[0],$nc[1],$nc[2]);
//替换变量为实际值
$rows['zdcode']= str_replace("{{agentid}}",$agentid,$rows['zdcode']);
$rows['zdcode']= str_replace("{{phone}}",$phone,$rows['zdcode']);
$rows['zdcode']= str_replace("{{name}}",$name,$rows['zdcode']);
$rows['zdcode']= str_replace("{{weixin}}",$weixin,$rows['zdcode']);
$rows['zdcode']= str_replace("{{qq}}",$qq,$rows['zdcode']);
$rows['zdcode']= str_replace("{{idcoard}}",$idcard,$rows['zdcode']);
$rows['zdcode']= str_replace("{{quyu}}",$quyu,$rows['zdcode']);
$rows['zdcode']= str_replace("{{dengji}}",$dljb,$rows['zdcode']);
$rows['zdcode']= str_replace("{{sjdl}}",$sjdl,$rows['zdcode']);
$rows['zdcode']= str_replace("{{product}}",$product,$rows['zdcode']);
$rows['zdcode']= str_replace("{{addtime}}",$addtime,$rows['zdcode']);
$rows['zdcode']= str_replace("{{jietime}}",$jietime,$rows['zdcode']);
//开始读取内容
imagettftext($im,$rows['zdsize'],0,$rows['xzd'],$rows['yzd']+$rows['zdsize'],$color,"../font/".$rows['zdfontcode'],$rows['zdcode']);
}
$dest=imagecreatetruecolor($width,$height);
imagecopy($dest,$im,$color,$width,$height);
//设置图片输出类型
header('Content-type:image/png');
//生成图片
imagepng($im);
imagedestroy($im) ;
?>