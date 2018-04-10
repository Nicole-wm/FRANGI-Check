<?php
error_reporting(0);
session_start();
require('../data/head.php');
require("../data/session.php");
?>
<?php 
$sidmenu="fwm";
$submenu="addfwm";
$act = $_GET["act"];
?>
<!DOCTYPE html>
<html lang="zh_cn">
<head>
    <meta charset="utf-8">
	 <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $cf['page_desc']; ?>">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="<?php echo $cf['page_keywords']; ?>">
   
    <title><?php echo $cf['site_name']; ?></title>
	
	 <!-- Bootstrap core CSS -->
    <link href="<?php echo $cf['manage_themes']; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $cf['manage_themes']; ?>/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo $cf['manage_themes']; ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="<?php echo $cf['manage_themes']; ?>/assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $cf['manage_themes']; ?>/assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $cf['manage_themes']; ?>/assets/bootstrap-daterangepicker/daterangepicker.css" />
	
	<link href="<?php echo $cf['manage_themes']; ?>/css/jquery.searchableSelect.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="<?php echo $cf['manage_themes']; ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo $cf['manage_themes']; ?>/css/style-responsive.css" rel="stylesheet" /> 
  	<script src="<?php echo $cf['manage_themes']; ?>/layer/jquery.min.js"></script>
	
	
    <script src="<?php echo $cf['manage_themes']; ?>/js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo $cf['manage_themes']; ?>/js/jquery.searchableSelect.js"></script>
	
<!--弹窗JS -->

<script src="<?php echo $cf['manage_themes']; ?>/layer/layer.js"></script>

</head>

  <body>
  <section id="container" >
      <!--header start-->
     <?php require('head.php'); ?>
      <!--header end-->
      <!--sidebar start-->
       <?php require('left.php'); ?>
      <!--sidebar end-->
	 
  <section id="main-content">
  <section class="wrapper">
   <!--add start -->
     <div class="row">
	<div class="col-lg-12">
         <section class="panel">
            <header class="panel-heading">
            <h3> 批量生成防伪码</h3>
            </header>
           <div class="panel-body">
                             
							   <form class="form-horizontal tasi-form"  name="form1" method="post" action="?act=save_code">
                                <?php 
						$codepc=date("YmdHis", time()). rand(0,9) ; 
						$code_pici="$codepc";
						 ?> 
								 <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">生成批次</label>
                                      <div class="col-sm-3">
                                          <input type="text" class="form-control" name="riqi"  style="width:260px" value="<?php echo $code_pici;?>"  required >
                                      </div>
									   <div class="col-sm-7"> <p class="help-block">自动按时间生成,也可手工指定，方便溯源按批次调用等。</p></div>
                                  </div>
								
								  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">防伪码长度</label>
                                      <div class="col-sm-2">
                                          <input type="text" class="form-control"  style="width:100px;" name="code_length"  onKeyUp="value=value.replace(/[^12.34567890-]+/g,'')"  value="12" required >
                                      </div>
									   <div class="col-sm-8"> <p class="help-block">建议8-18位</p></div>
                                  </div>
								  
                                  <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">防伪码前缀</label>
                                      <div class="col-sm-3">
                                          <input type="text" class="form-control" name="code_pre"     style="width:100px;">
                                      </div>
									   <div class="col-sm-7"> <p class="help-block">如 : EW 建议2-4位,如果不要，可以不填写</p></div>
                                  </div>

                                 
								   <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">防伪码生成方式</label>
                                      <div class="col-sm-4">
                                          <select name="code_type" class="form-control" id="code_type"  style="width:220px;">
     <option value="0">前缀+数字和字母</option>
     <option value="1">前缀+字母(不限大小写)</option>
     <option value="2">前缀+数字</option>
     <option value="3">前缀+字母(大写)</option>
   </select>
                                      </div>
									   <div class="col-sm-6"> <p class="help-block">选择防伪码生成的样式</p></div>
                                  </div>
								 
								 
								    <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">物流码样式</label>
                                      <div class="col-sm-2">
                                          <select name="txm_type" class="form-control" id="txm_type"  style="width:180px;">
     <option value="2">纯数字</option>
     <option value="4">数字和字母</option>
     
   </select>
                                      </div>
									   <label class="col-sm-2 col-sm-2 control-label">物流码长度</label>
									   <div class="col-sm-2"> 
									   
									     <input type="text" class="form-control" name="txm_num"  onKeyUp="value=value.replace(/[^12.34567890-]+/g,'')"  value="8" required  >
									   
									  
									   
									   </div>
									   
									    <div class="col-sm-4"> <p class="help-block">物流码可用于扫码发货，流程记录和溯源管理等</p></div>
                                  </div>
								  
								 
								   <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">生成数量</label>
                                      <div class="col-sm-2">
                                          <input type="text" class="form-control" name="code_count"  onKeyUp="value=value.replace(/[^12.34567890-]+/g,'')"   required  >
                                      </div>
									   <div class="col-sm-8"> <p class="help-block">建议一次生成5万条以内。</p></div>
                                  </div>
								 
								  
								  
								     <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">防伪码所属产品</label>
                                      <div class="col-sm-3">
<select name="product" id="s1"   >
   <?php 
	$ew80 = mysql_query("SELECT * FROM  tgs_pro order by id desc ");
     while($row = mysql_fetch_array($ew80))
     {
   $pro_name = $row['pro_name'];
    $cpid = $row['id'];
	?>
	<option value="<?php echo $cpid; ?>"><?php echo $pro_name; ?></option><?php }?> 
    </select>
	
    <script>
		$(function (){
			$('#s1').searchableSelect();
		});
    </script>


	
                                         
                                      </div>
									 <div class="col-sm-7"> <p class="help-block"><span class="red">可以在发货时重新选择，或者批量修改。</span></p></div>
                                  </div>
								  																		
								 
								  
								   <div class="form-group">
                                      <label class="col-sm-2 col-sm-2 control-label">产品所属代理商</label>
                                      <div class="col-sm-3">
									  
									  
 <select name="zd1" id="s2" >
  <?php 
	$ew802 = mysql_query("SELECT * FROM  tgs_agent order by id desc ");
     while($row = mysql_fetch_array($ew802))
     {
   $name = $row['name'];
   $dlid = $row['id'];
	?>

	
	<option value="<?php echo $dlid; ?>"><?php echo $name; ?></option><?php }?> 
    </select>
	
    <script>
		$(function(){
			$('#s2').searchableSelect();
		});
    </script>
								
										 
	 
	
                                      </div>
									   <div class="col-sm-7"> <p class="help-block"><span class="red">可以在发货时重新选择,或者批量修改。</span></p></div>
                                  </div>
								  
							  
								  
								  
								   <div class="form-group">
								    <label class="col-sm-2 col-sm-2 control-label">是否启用防伪码</label>
                                     <div class="col-sm-2">
									 
									  <select name="qiyong" class="form-control" id="qiyong"  >
     <option value="yes">启用</option>
     <option value="no">不启用</option>   
   </select>
									
									</div>	  
									 <div class="col-sm-8"> <p class="help-block">只有启用的防伪码才能查询到。</p></div>  
                                  </div>
								  
								  <div class="form-group">							
                                          <div class="col-lg-offset-2 col-lg-10">
                                              
					    <span id="ts" ><input class="btn btn-danger" id="tj" type="submit" value="开始批量生成" />  </span>
					      <script>
$("form").submit(function() {
  $("#ts").html('<span class="label label-danger" style="font-size:14px;"><i class="icon-spinner icon-spin"></i> 正在批量生成中,请勿关闭或刷新窗口! </span>');
});
</script>
                                             
                                          </div>									  
                                      </div>
									  
								  </form>      
                                 </div>
                             
     </section>
	</div>
	</div>
	<!--add end -->
	
	
   </section>
   </section>
   </section>          
 

 <!-- js placed at the end of the document so the pages load faster -->
  
    <script src="<?php echo $cf['manage_themes']; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo $cf['manage_themes']; ?>/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo $cf['manage_themes']; ?>/js/jquery.nicescroll.js" type="text/javascript"></script>

    <script src="<?php echo $cf['manage_themes']; ?>/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo $cf['manage_themes']; ?>/js/jquery.dcjqaccordion.2.7.js"></script>

  <!--custom switch-->
  <script src="<?php echo $cf['manage_themes']; ?>/js/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="<?php echo $cf['manage_themes']; ?>/js/jquery.tagsinput.js"></script>
  <!--custom checkbox & radio-->
  <script type="text/javascript" src="<?php echo $cf['manage_themes']; ?>/js/ga.js"></script>

  <script type="text/javascript" src="<?php echo $cf['manage_themes']; ?>/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="<?php echo $cf['manage_themes']; ?>/assets/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="<?php echo $cf['manage_themes']; ?>/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="<?php echo $cf['manage_themes']; ?>/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
  <script type="text/javascript" src="<?php echo $cf['manage_themes']; ?>/assets/ckeditor/ckeditor.js"></script>

  <script type="text/javascript" src="<?php echo $cf['manage_themes']; ?>/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
  <script src="<?php echo $cf['manage_themes']; ?>/js/respond.min.js" ></script>


  <!--common script for all pages-->
    <script src="<?php echo $cf['manage_themes']; ?>/js/common-scripts.js"></script>

  <!--script for this page-->
  <script src="<?php echo $cf['manage_themes']; ?>/js/form-component.js"></script>
  
 
<?php

/////保存批量生成的防伪码

if($act == "save_code")
{
	
  if ($glqx>=3){
echo "<script language='javascript'>layer.msg('您的权限不足，请与管理员联系!');</script>";
exit;
}


    $riqi    = trim($_POST['riqi']); //生成批次
    $code_length = trim($_POST['code_length']); //防伪码长度
	$code_pre    = trim($_POST['code_pre']); //防伪码前缀
	$code_type   = $_POST['code_type']; //防伪码形式
	$txm_type   = $_POST['txm_type']; //条形码样式
	$txm_num   = $_POST['txm_num']; //条形码长度
	$code_count  = trim($_POST['code_count']); //数量		
	$product     = strreplace(trim($_POST['product']));  //所属产品	
	$zd1         = strreplace($_POST['zd1']); //代理商
	$qiyong   = $_POST['qiyong']; //是否启用防伪码
	$adddate     =date('Y-m-d');//生成时间
   

//开始对写入进行判断 
	if(strlen($code_pre)>= $code_length)

	{

	  echo "<script language='javascript'>layer.msg('防伪码长度不符合要求');</script>";

	  exit;

	}	

	if(!is_numeric($code_length))

	{

	  echo "<script language='javascript'>layer.msg('防伪码长度只能是数字');</script>";

	  exit;

	}

	if($code_length<4)

	{

	  echo "<script language='javascript'>layer.msg('防伪码长度不能低于4位');</script>";

	  exit;

	}

	if($product == "")

	{

	 echo "<script language='javascript'>layer.msg('请先添加产品');</script>";
	 exit;

	}

	
	$new_code_length = $code_length-strlen($code_pre);//防伪码长度
	set_time_limit(0);
	$sc_sum = $code_count/1000;
	if($sc_sum<0){$sc_sum=1;}
	for($u=0;$u<$sc_sum;$u++){
	
			for($i=0;$i<$code_count/$sc_sum;$i++)
			{
			$bianhao  = (string)$code_pre.genRandomString($new_code_length,$code_type);
			$txm  = (string)genRandomString($txm_num,$txm_type);
			
			/////开始判断是否有重复的防伪码和物流码
			
			$res = mysql_query("select bianhao from tgs_code  where  bianhao='".$bianhao."' limit 1");
			$arr = mysql_fetch_array($res);
			if(mysql_num_rows($res)>0){
			$code_count++;
			$mycount += 1;
			continue;
			}
			
			

			$res = mysql_query("select txm from tgs_code  where  txm='".$txm."' limit 1");
			$arr = mysql_fetch_array($res);
			if(mysql_num_rows($res)>0){
			$code_count++;
			$mycount += 1;
			 continue;
			}
			
			////检测重复完成 开始批量生成
			
			//$sql = "insert into tgs_code set bianhao = '".$bianhao."',product='".$product."',txm='".$txm."',qiyong='".$qiyong."',riqi='".$riqi."',zd1='".$zd1."',adddate='".$adddate."'";
			 mysql_query("insert into tgs_code (bianhao,product,txm,qiyong,riqi,zd1,adddate)VALUES('".$bianhao."','".$product."','".$txm."','".$qiyong."','".$riqi."','".$zd1."','".$adddate."')");
			
			ob_clean();
			
			}

	}
	
	$zs_count =$code_count-$mycount; 
	echo "<script language='javascript'>layer.confirm('<b>批量生成完成，共生成".$zs_count."组防伪码！',{ icon:1,btn:['确认']});</script>";
	
	

}
?>
  
  </body>
</html>
