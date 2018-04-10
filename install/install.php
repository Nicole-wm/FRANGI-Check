<?php 
header("Content-Type: text/html;charset=utf-8"); 
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
	 <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Mosaddek">  
<title>开始安装  易网防伪防窜货溯源系统 </title>
<link href="css/style.css" rel="stylesheet" type="text/css" />

<script src="layer/jquery-1.9.1.min.js"></script>
<script src="layer/layer.js"></script>
</head>

<body>
<?php 
$files="../data/conn.php"; 
if(!is_writable($files)){ 
echo "<script language='javascript'>layer.msg('安装失败，date文件夹中的conn.php不可写！',{icon:2,time: 3000,shift: -1}, function(){location.href='index.php';});</script>";
}else{ 
$config_str = "<?php"; 
$config_str .= "\n"; 
$config_str .= '$db_host = "' . $_POST['db_host'] . '"; //数据库主机名'; 
$config_str .= "\n"; 
$config_str .= '$db_user = "' . $_POST['db_user'] . '";//数据库用户名'; 
$config_str .= "\n"; 
$config_str .= '$db_pwd = "' . $_POST['db_pass'] . '";//数据库密码'; 
$config_str .= "\n"; 
$config_str .= '$db_name = "' . $_POST['db_name'] . '";//数据库名称'; 
$config_str .= "\n"; 
$config_str .= '$db_port = "' . $_POST['db_port'] . '";//数据库端口'; 
$config_str .= "\n"; 
$config_str .= '$sys_key = "' . $_POST['sys_key'] . '";//授权码'; 
$config_str .= "\n"; 
$config_str .= '?>'; 
$ff = fopen($files, "w+"); 
fwrite($ff, $config_str);
}
fclose($ff); 
$file_name = '../dbback/bf.sql';//要导入的SQL文件名
$dbhost=$_POST['db_host'].':'.$_POST['db_port']; //数据库主机名
$dbuser=$_POST['db_user']; //数据库用户名
$dbpass=$_POST['db_pass']; //数据库密码
$dbname=$_POST['db_name']; //数据库名
set_time_limit(0); //设置超时时间为0，表示一直执行。当php在safe mode模式下无效，此时可能会导致导入超时，此时需要分段导入
$fp = @fopen($file_name, "r") or die("<script language='javascript'>layer.msg('安装失败，dbback中的bf.sql文件不存在！',{icon:2,time: 3000,shift: -1}, function(){location.href='index.php';});</script>");//打开文件
$conn=mysql_connect($dbhost, $dbuser, $dbpass) or die("<script language='javascript'>layer.msg('安装失败，无法连接到数据库！',{icon:2,time: 3000,shift: -1}, function(){location.href='index.php';});</script>");//连接数据库
mysql_query("set names utf8",$conn); 
$sql="DROP DATABASE $dbname"; // 如果数据库存在,会删除.
mysql_query($sql);
$sql="CREATE DATABASE $dbname"; // 如果资料表存在,也会删除.
mysql_query($sql);

mysql_select_db($dbname) or die ("<script language='javascript'>layer.msg('无法打开数据库！',{icon:2,time: 3000,shift: -1}, function(){location.href='index.php';});</script>");//打开数据库 
//echo "正在安装中......";
while($SQL=GetNextSQL()){
if (mysql_query($SQL)){
echo mysql_error();//如果错误提示
//echo "SQL语句为：".$SQL."<BR>"; //为了用户体验,隐藏执行SQL过程
echo "";
};}
fclose($fp) or die("<script language='javascript'>layer.msg('无法关闭数据库！',{icon:2,time: 3000,shift: -1}, function(){location.href='index.php';});</script>");//关闭文件
mysql_close(); 
function GetNextSQL() {
global $fp;
$sql="";
while ($line = @fgets($fp, 40960)) {
$line = trim($line);

//以下三句在高版本php中不需要
$line = str_replace("\\\\","\\",$line);
$line = str_replace("\'","'",$line);
$line = str_replace("\\r\\n",chr(13).chr(10),$line);
// $line = stripcslashes($line);
if (strlen($line)>1) {
if ($line[0]=="-" && $line[1]=="-") {
continue;
}
}
$sql.=$line.chr(13).chr(10);
if (strlen($line)>0){
if ($line[strlen($line)-1]==";"){
break;
}}
}
return $sql;
}
//锁定安装
$installlock = fopen("install.lock", "w");
$txt = "易网软件提示您：安装已完成！";
fwrite($installlock, $txt);
fclose($installlock);
echo "<script language='javascript'>layer.msg('系统安装成功，稍后将进入后台......！',{icon:1,time: 5000,shift: -1}, function(){location.href='../manage/';});</script>"; 
?>
</body>
</html>