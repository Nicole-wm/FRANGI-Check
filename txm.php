<?php
error_reporting(0);
session_start();
header('Content-type: text/html; charset=utf-8');
require("data/head.php");
?>
<?php
    $txm = trim($_GET["txm"]);	
	$sql="select * from tgs_code where txm='$txm' limit 1";
	$res=mysql_query($sql);	   
	$arr = mysql_fetch_array($res);
	$code_txm  =  $arr["txm"];	
    if($code_txm==""){
		
	$code_txm=trim($_GET["txm"]);
	}	
?>
<!DOCTYPE html>
<html>
 <head> 
  <meta charset="utf-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no" /> 
  <title></title> 
  <script type="text/javascript" src="txm/jquery-2.1.3.min.js"></script> 
  <script type="text/javascript" src="txm/JsBarcode.all.js"></script> 
     <link href="<?php echo $cf['manage_themes']; ?>/css/style.css" rel="stylesheet">
 </head> 
<body>
 
    
	<div style="margin:0 auto;text-align:center;color:#ff6c60;font-size:14px;">  
	 <svg id="svgcode"></svg> 
     
     <script>  
        $("#svgcode").JsBarcode('<?php echo $code_txm; ?>');
  </script>
		<p >物流码 条形码 样式预览</p><p class="green"><b>物流码也可根据需求印刷成 二维码 样式。</b></p>
		<p style="color:#333">将印刷的物流码粘贴在商品包装或外箱上，<br>方便扫码来进行发货，流程或溯源等操作。</p>
	</div>

	
	
	</body>
</html>
