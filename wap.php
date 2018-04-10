<?php
error_reporting(0);
session_start();
header('Content-type: text/html; charset=utf-8');
require("data/head.php"); 
require_once "wx/jssdk.php";
$jssdk = new JSSDK($cf['AppID'], $cf['AppSecret']);  
$signPackage = $jssdk->GetSignPackage();
if (file_exists("themes/".$cf['site_themes'])){
require("themes/".$cf['site_themes']."/wap.html");
}else{
echo "模板读取错误！请检测模板文件themes/{$cf['site_themes']}是否存在!";	
}	
?>