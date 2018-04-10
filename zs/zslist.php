<?php
error_reporting(0);
session_start();
header('Content-type: text/html; charset=utf-8');
require(dirname(__FILE__)."/../data/head.php");
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo $cf['page_desc']; ?>">
	<meta name="author" content="Mosaddek">
	<meta name="keyword" content="<?php echo $cf['page_keywords']; ?>">
	<link rel="shortcut icon" href="favicon.png">
	<title><?php echo $cf['site_name']; ?></title>
	
	<link media="all" type="text/css" href="css/style.css" rel="stylesheet" />
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.event.drag-1.5.min.js"></script>
	<script type="text/javascript" src="js/jquery.touchSlider.js"></script>
	<script src="../<?php echo $cf['manage_themes']; ?>/layer/layer.js"></script>
</head>

<body>
	
	<div class="ajaxbox">
		<?php

		$keyword = trim($_GET["keyword"]);	
		$yzm = trim($_GET["yzm"]);
	//如果没有输入	
		if($keyword == ""){		
			
			echo "<script language='javascript'>layer.msg('查询条件不能为空！',{icon:0,time: 3000,shift: -1}, function(){location.href='../agent.php';});</script>";
			exit();
		}
		
		if($cf['yzm_status'] == 1 && $yzm != $_SESSION['authnum_session'])
		{
			echo "<script language='javascript'>layer.msg('验证码错误！',{icon:0,time: 3000,shift: -1}, function(){location.href='../agent.php';});</script>";	
			exit();
		}    
		$sql="select * from tgs_agent where weixin='$keyword' or qq='$keyword' or phone='$keyword' or agentid='$keyword' or name='$keyword'  limit 1";
		$res=mysql_query($sql);
	   //如果查询到数据
		if(mysql_num_rows($res)>0){
			$arr = mysql_fetch_array($res);
			$agentid  =  $arr["agentid"];
			$product  =  $arr["product"];
			$quyu     =  $arr["quyu"];
			$qudao    =  $arr["qudao"];
			$addtime  =  $arr["addtime"];
			$jietime  =  $arr["jietime"];		   
			$name     =  $arr["name"];
			$phone    =  $arr["phone"];
			$qq       =  $arr["qq"];
			$weixin   =  $arr["weixin"];
			$hmd      =  $arr["hmd"];		
			$shzt    =  $arr["shzt"];	
			$dljbid         = $arr["dengji"];  
			$query_time  = $arr["query_time"];
			$hits        = $arr['hits'];	
			$dqts = date('Y-m-d');
			
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



if($shzt == "2"){
	echo "<script language='javascript'>layer.msg('该代理还在审核中！',{icon:0,time: 3000,shift: -1}, function(){location.href='../agent.php';});</script>";
	exit;
	
}	
if($hmd == "1"){
	echo "<script language='javascript'>layer.msg('该代理已被列为黑名单！',{icon:0,time: 3000,shift: -1}, function(){location.href='../agent.php';});</script>";
	exit;
	
}	

if( $jietime < $dqts){
	echo "<script language='javascript'>layer.msg('对不起，该代理授权到期，请联系我们续签代理！',{icon:0,time: 3000,shift: -1}, function(){location.href='../agent.php';});</script>";
	exit;
}   
$results     = "1";
$msg1        = "<img src=myzs.php?&keyword=$keyword>  >";
		   //获得搜索时间
if($_SESSION['s_query_time']==""){
	$_SESSION['s_query_time'] = $query_time;
}
		   //如果搜索次数大于0		   
if($hits>0){		
	$results = "2";
	$msg1        = "<img src='myzs.php?&keyword=$keyword' >";
}
mysql_query("update tgs_agent set hits=hits+1,query_time='".$GLOBALS['tgs']['cur_time']."' where agentid='".$agentid."' limit 1");	  
$msg0 = 1;
}
	   //如果查不到记录做以下记录
else
{
	$results = "3";	 
	echo "<script language='javascript'>layer.msg('没有找到相关的代理商信息！',{icon:0,time: 3000,shift: -1}, function(){location.href='../agent.php';});</script>";
	$sql = "insert into tgs_hisagent  set keyword='".$keyword."',results='".$results."',addtime='".date('Y-m-d H:i:s')."',addip='".$GLOBALS['tgs']['cur_ip']."'";
	mysql_query($sql);
	exit;
}

?>



<!--顶部菜单 -->  
<div class="header">
	<div class="hd c_float">
		<div class="bd_w70">
			
			<div class="f_left left_wp">
				<img class="logo" src="images/logo.png" alt="LOGO" />
			</div>
			
			<div class="f_right right_wp c_float">
				<div class="c_float f_left pg_wrap">
					<p class="f_left index_pg">
						<a class="color_yellow" href="http://fw.ewsaas.com" target="_blank">官方网站</a></p>
						<p class="f_left index_pg"><a class="color_f" href="http://www.ew80.com" target="_blank" >系统购买</a></p>
						<p class="f_left user_pg"><a class="color_f" href="/agent.php" >返回重查</a></p>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="banner"><h1>证书已直接生成图片，右键可另存为！</h1> </div>
	
	<!--开始展示查询结果 -->  	
	<div class="zs_box" style="width:<?php echo $img_info[0];?>px; ">
		
		<?php 
		echo $msg1;
		?>
		
	</div>
	<div class="fgx"></div>
	<div class="cl footer">版权所有：上海拉丽丝商贸有限公司 www.frangi.cn</div>	  

</div>	

<!--end -->  	
<?php	 
$sql = "insert into tgs_hisagent  set keyword='".$keyword."',results='".$results."',addtime='".date('Y-m-d H:i:s')."',addip='".$GLOBALS['tgs']['cur_ip']."'";
mysql_query($sql);
exit;
?>
</BODY>
</HTML>


