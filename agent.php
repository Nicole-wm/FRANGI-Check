<?php
error_reporting(0);
session_start();
header('Content-type: text/html; charset=utf-8');
require("data/head.php"); 
if (file_exists("themes/".$cf['agent_themes'])){
require("themes/".$cf['agent_themes']."/index.html");
}else{
echo "模板读取错误！请检测模板文件夹themes/{$cf['agent_themes']}是否存在!";	
}	
?>