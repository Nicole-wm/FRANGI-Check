<?php
header("Content-Type: text/html;charset=utf-8"); 
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
	 <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="">
  
<title>开始安装  易企云助理</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="layer/jquery-1.9.1.min.js"></script>
<script src="layer/layer.js"></script>

<script language="javascript">
function agree()
{
  if (document.getElementById('btn_license').checked)
	{
    document.getElementById('submit').disabled=false;
    document.getElementById('submit').className='btn';  
	
	}
  else
	{
    document.getElementById('submit').disabled='disabled';  
    document.getElementById('submit').className='btnGray';  
	}
}   
</script>
</head>

<body>
 
<?php
//检测安装文件是否存在
if (file_exists("install.lock"))
{
echo "<script language='javascript'>layer.msg('程序已经安装过，如需重新安装请先删除安装文件夹中的install.lock文件。',{icon:0,time: -1,shift: -1}, function(){location.href='index.php';});</script>";
exit;
}
?>
<div class="banner">
<div class="logo"><img src="img/logo.png"></img></div>
<div class="t1">感谢您使用易企云助理  </div>
<p>一站式防伪溯源和代理商管理系统</p>
<!--<div class="tbsm">特别说明：如果数据库已存在，安装程序会自动删除原有数据，请注意做好数据备份 。</div>-->
</div>

<form name="form1" method="POST" action="install.php"> 
<div class="steup">
 
   <div class="st_li">
   <div class="l">数据库地址：</div>
   <div class="r"><input type="text" class="iput_text"  name="db_host"  value="localhost"  ></div>
   </div>
   
   <div class="st_li">
   <div class="l">数据库端口：</div>
   <div class="r"><input type="text" class="iput_text"  name="db_port"   value="3306"   ></div>
   </div>
   

  <div class="st_li">
   <div class="l">数据库用户名：</div>
   <div class="r"><input type="text" class="iput_text"  name="db_user"   placeholder="填写数据库用户名"  ></div>
   </div>
   
   <div class="st_li">
   <div class="l">数据库密码：</div>
   <div class="r"><input type="text" class="iput_text"  name="db_pass"   placeholder="填写数据库密码"  ></div>
   </div>
   
   <div class="st_li">
   <div class="l">数据库名称：</div>
   <div class="r"><input type="text" class="iput_text"  name="db_name"   placeholder="填写数据库名称"  ></div>
   </div>
   
    <div class="st_li">
   <div class="l">授权序号：</div>
   <div class="r"><input type="text" class="iput_text"  name="sys_key"   placeholder="填写授权序列号"  ></div>
   </div>
   
    <div class="st_li">
 <div class="l"></div>  <div class="r"> <input type="submit" name="Submit"  class="btnGray" disabled="disabled"  id="submit"    value="点击安装"/>
 </div>
</div>

 <div class="st_li">
   <div class="l"></div>
   <div class="r"> 
 
   <label><input type="checkbox" onclick="agree();" align="absMiddle" id="btn_license" ><i>✓</i> 安装前请先同意</label>
   <a href="http://www.ew80.net/Home/about/xy.html" target="_blank" class="text">易网软件授权条款 </a>
</div>
   </div>
   


</form>
<div class="sm">Copyright © 2005-2017 ew80.net All Rights Reserved. 易网软件 版权所有</div>
</body>
</html>
