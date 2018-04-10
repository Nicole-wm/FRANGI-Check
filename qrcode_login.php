<?php
error_reporting(0);
session_start();
header('Content-type: text/html; charset=utf-8');
require("data/head.php");
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
    <title>经销商扫码登录</title>
  <script src="./themes/manage/js/qrcode.js"></script>

<style>
body{margin:5; padding:0; font-size:16px; font-family:"微软雅黑"; color:#c3c3c3;}
#qrcode{
text-align:center;
margin:0 auto; 
width: 160px;
height: 160px;
}
    </style>


</head>
<body>
<div id="qrcode">
</div>

<script>
    window.onload =function(){
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            width : 160,//设置宽高
            height : 160
        });
        qrcode.makeCode("<?php echo $cf['site_url']; ?>/agent");        
    }
</script>


</body>	
</html>