<?php
error_reporting(0);
session_start();
header('Content-type: text/html; charset=utf-8');
//检测安装
if(!file_exists(dirname(__FILE__).'/install/install.lock'))
{
    header('Location:install/index.php');
    exit();
}
require("data/head.php"); 
if (file_exists("themes/".$cf['site_themes'])){
require("themes/".$cf['site_themes']."/index.html");
}else{
echo "模板读取错误！请检测模板文件themes/{$cf['site_themes']}是否存在!";	
}	
?>