<?php
////该页为后台测试防伪码内容页效果，请不要删除。
error_reporting(0);
session_start();
header('Content-type: text/html; charset=utf-8');
require(dirname(__FILE__)."/../data/head.php");
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
	 <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $cf['page_desc']; ?>">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="<?php echo $cf['page_keywords']; ?>">
    
    <title><?php echo $cf['site_name']; ?></title>
	
	 <link media="all" type="text/css" href="css/wap.css" rel="stylesheet" />
	 <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery.event.drag-1.5.min.js"></script>
<script type="text/javascript" src="js/jquery.touchSlider.js"></script>
<script src="layer/layer.js"></script>
<script type="text/javascript">
$(document).ready(function(){

	$(".main_visual").hover(function(){
		$("#btn_prev,#btn_next").fadeIn()
	},function(){
		$("#btn_prev,#btn_next").fadeOut()
	});
	
	$dragBln = false;
	
	$(".main_image").touchSlider({
		flexible : true,
		speed : 200,
		btn_prev : $("#btn_prev"),
		btn_next : $("#btn_next"),
		paging : $(".flicking_con a"),
		counter : function (e){
			$(".flicking_con a").removeClass("on").eq(e.current-1).addClass("on");
		}
	});
	
	$(".main_image").bind("mousedown", function() {
		$dragBln = false;
	});
	
	$(".main_image").bind("dragstart", function() {
		$dragBln = true;
	});
	
	$(".main_image a").click(function(){
		if($dragBln) {
			return false;
		}
	});
	
	timer = setInterval(function(){
		$("#btn_next").click();
	}, 5000);
	
	$(".main_visual").hover(function(){
		clearInterval(timer);
	},function(){
		timer = setInterval(function(){
			$("#btn_next").click();
		},5000);
	});
	
	$(".main_image").bind("touchstart",function(){
		clearInterval(timer);
	}).bind("touchend", function(){
		timer = setInterval(function(){
			$("#btn_next").click();
		}, 5000);
	});
	
});
</script> 
	</head>
	
	<body>
	
<div class="ajaxbox">
<?php
     $txm2 = trim($_GET["txm"]);		
	if($txm2 == ""){			
	echo "<script language='javascript'>layer.msg('获取失败！',{icon:0,time: 3000,shift: -1}, function());</script>";
	exit();
	  }

	 $addtime = $GLOBALS['tgs']['cur_time'];
     $addip = $GLOBALS['tgs']['cur_ip'];

	$sql="select * from tgs_code where txm='$txm2' limit 1";
	$res=mysql_query($sql);
	   
		   $arr = mysql_fetch_array($res);
		   $fwm     =  $arr["bianhao"];
		   $bianhao     =  $arr["bianhao"];
		   $txm     =  $arr["txm"];
		   $riqi        =  $arr["riqi"];
		   $product     =  $arr["product"];
		   $zd1         =  $arr["zd1"];
		   $suyuan      =  $arr["suyuan"];
		   $qiyong      =  $arr["qiyong"];
		   $query_time  = $arr["query_time"];
		   $hits        = $arr['hits'];	
		   if($query_time==""){
			 $query_time=date('Y-m-d H:i:s');
		   }
	   
 $cp = mysql_query("select * from tgs_pro where id='$product' limit 1");
 $arr = mysql_fetch_array($cp);
 $pro_name  = $arr['pro_name'];
 $cppic  = $arr['cppic'];
 $cppic2  = $arr['cppic2'];
 $cppic3  = $arr['cppic3'];
 $cppic4  = $arr['cppic4'];
 $cpms  = $arr['cpms'];
 
 $dls = mysql_query("select * from tgs_agent where id='$zd1' limit 1");
 $arr = mysql_fetch_array($dls);
 $agentid  = $arr['agentid'];
 $phone  = $arr['phone'];
 $weixin  = $arr['weixin'];
 $qq  = $arr['qq'];
 $dlname  = $arr['name'];
 $tel  = $arr['tel'];
 $about  = $arr['about'];
	 	 
           
		   if ($hits == 0){
		   
		    $results     = "7";
		   $msg1        = str_replace("{{product}}",$pro_name,unstrreplace($cf['notice_1']));
		   
		   }

		   if($hits>0){		
			   $results = "8";
			   $msg1        = str_replace("{{product}}",$pro_name,unstrreplace($cf['notice_2']));
			
		   }
		    
	       $msg1        = str_replace("{{bianhao}}",$bianhao,$msg1);
		   $msg1        = str_replace("{{riqi}}",$riqi,$msg1);
		   $msg1        = str_replace("{{txm}}",$txm,$msg1);
		   $msg1        = str_replace("{{zd1}}",$dlname,$msg1);
		   $msg1        = str_replace("{{hits}}",$hits+1,$msg1);
		   $msg1        = str_replace("{{addtime}}",$addtime,$msg1);
		   $msg1        = str_replace("{{query_time}}",$query_time,$msg1);
	       $msg1        = str_replace("{{addip}}",$addip,$msg1);		      
		    
		  
		  ////如果查询的防伪码不存在
		   if($fwm=="")
	       {
		 $results = "9";	 
		 $msg1   = str_replace("{{bianhao}}",$bianhao,unstrreplace($cf['notice_3']));
		 
	      }
		  
	   ?>
		
	  <!--如果产品轮翻图片不为空执行图片轮翻 否则不显示 -->  
	   <div class="banner">
	<?php if($cppic2 !="" ){ ?>
<div class="main_visual">
	<div class="flicking_con">
		<a href="#">1</a>
		<a href="#">2</a>
		<a href="#">3</a>
	</div>
	<div class="main_image">
		<ul>
			<li><img src="<?php echo $cppic2; ?>" class="img"></li>
			<li><img src="<?php echo $cppic3; ?>" class="img"></li>
			<li><img src="<?php echo $cppic4; ?>" class="img"></li>
		</ul>
		<a href="javascript:;" id="btn_prev"></a>
		<a href="javascript:;" id="btn_next"></a>
	</div>
</div>  
	</div>
	<?php } ?>
	
 <!--开始展示 -->  	
     <div class="fwm_box">
	 
	   
	   <?php if($hits>=$cf['fwm_max_so'] or $qiyong =="no"){ 
		$cf['notice_3']        = str_replace("{{bianhao}}",$bianhao,$cf['notice_3']);
	   echo $cf['notice_3'];
        exit;} ?>
	   
	  
      
	 <!--如果防伪码参数设置中，显示防伪码信息且防伪码状态为开启 -->
	   <?php if($cf['fwm_view']=="yes" ){ ?>	   
	   <?php echo $msg1; ?>    
	   <?php }  ?>
	   
	   
	   <!--如果防伪码参数设置中显示产品详细描述信息  -->
	   <div style="margin-top:20px;margin-bottom:20px;">
	  <?php if($cf['cp_view']=="yes"){ ?>
	   <?php
	   
        $cpms        = str_replace("{{bianhao}}",$bianhao,$cpms);	 
        $cpms        = str_replace("{{product}}",$pro_name,$cpms);	
		$cpms        = str_replace("{{txm}}",$txm,$cpms);	
		$cpms        = str_replace("{{zd1}}",$dlname,$cpms);	 
        $cpms        = str_replace("{{riqi}}",$riqi,$cpms);	
		$cpms        = str_replace("{{hits}}",$hits,$cpms);	 
        $cpms        = str_replace("{{query_time}}",$query_time,$cpms);	
		$cpms        = str_replace("{{addip}}",$addip,$cpms);	
		
      echo $cpms;
	   ?>
	   <?php }  ?>
	  </div>
	  

<!--展示流程记录信息  -->
	   <div style="margin-bottom:20px;">
	    <?php if($cf['lc_view']=="yes"){ ?>
	  <!--流程展示标题框样式  -->
     <section  style="margin: 5px 0px; width: 100%; display: inline-block;  border-color: rgb(89, 195, 249);">
        <section style="float: left; height: 36px; width: 8px; color: rgb(255, 255, 255); border-color: rgb(89, 195, 249); background-color: rgb(89, 195, 249);"></section>
        <section style="padding: 0px 30px 0px 10px; float: left; height: 36px; line-height: 36px; color: rgb(255, 255, 255); border-color: rgb(89, 195, 249); background-color: rgb(89, 195, 249);">
            <section style="box-sizing: border-box; color: inherit; border-color: rgb(89, 195, 249);">
                <span style="color: inherit; font-size: 16px; border-color: rgb(89, 195, 249);">流程追溯记录</span>
            </section>
        </section>
        <section  style="margin: 0px; padding: 0px; box-sizing: border-box; width: 0px; height: 0px; border-left-width: 15px; border-left-style: solid; border-color: transparent rgb(89, 195, 249); border-top-width: 18px; border-top-style: solid; border-bottom-width: 18px; border-bottom-style: solid; float: left; color: inherit;"></section>
        <section  style="margin-right: 15px; box-sizing: border-box; float: left; border-color: rgb(89, 195, 249); color: inherit;">
            <section class="96wx-bdc" style="border-color: rgb(89, 195, 249); color: inherit;">
                <section style="margin-right: 5px; width: 8px; height: 18px; float: left; transform: skewX(40deg); color: rgb(255, 255, 255); border-color: rgb(89, 195, 249); background-color: rgb(89, 195, 249);"></section>
            </section>
            <section style="clear: both; border-color: rgb(89, 195, 249); color: inherit;">
                <section  style="margin-right: 5px; width: 8px; height: 18px; float: left; transform: skewX(-40deg); color: rgb(255, 255, 255); border-color: rgb(89, 195, 249); background-color: rgb(89, 195, 249);"></section>
            </section>
        </section>
</section>

<p>
    <br/>
</p>
 <!--标题框样式 end  -->
 
	  <div class="track-rcol">
			<div class="track-list">
				<ul>
					
					<?php $ew80 = mysql_query("SELECT * FROM  tgs_lc where txm='".$txm."' and zt='yes' order by czdate desc ");
     while($row = mysql_fetch_array($ew80))
     {
	$i++;	
    $lcid  = $row['lcid'];
 $zrr  =  $row['zrr'];
 $czy  =  $row['czy'];
 $czdate  =  $row['czdate'];
 $lcsm  =  $row['lcsm'];
 $zt  =  $row['zt'];
 ?>
 
					<li <?php if($i==1){echo "class='first'";}?>>
						<i class="node-icon"></i>
						<span class="lcname">
						<?php 
						$sql = "select * from tgs_lcfl where id=".$lcid." limit 1";
 $res = mysql_query($sql);
 $arr = mysql_fetch_array($res);
 $lc_name = $arr['lcname'];
 echo $lc_name;
						?>
						</span>
						
						
						<br>
						<span class="txt"><?php echo $lcsm; ?></span>
						<br>
						<span class="time"><?php echo $czdate;?>&nbsp; &nbsp;负责人:<?php echo $zrr;?> </span>
						
					</li>
					<?php 
	
	 }
?>
				</ul>
			</div>
		</div> 
	 
	  </div>
		<?php }?>	   
 <!--end -->  

	  
	   <!--如果溯源信息存在  -->
	   <div style="margin-bottom:20px;">
	  <?php if($suyuan!=""){ ?>
	  <?php	   
 $res = mysql_query("select * from tgs_suyuan where sid='$suyuan' limit 1");
 $arr = mysql_fetch_array($res);		
 $v_suyuan  = $arr['suyuan'];
 		$v_suyuan        = str_replace("{{bianhao}}",$bianhao,$v_suyuan);	 
        $v_suyuan        = str_replace("{{product}}",$pro_name,$v_suyuan);	
		$v_suyuan        = str_replace("{{txm}}",$txm,$v_suyuan);	
		$v_suyuan        = str_replace("{{zd1}}",$dlname,$v_suyuan);	 
        $v_suyuan        = str_replace("{{riqi}}",$riqi,$v_suyuan);	
		$v_suyuan        = str_replace("{{hits}}",$hits,$v_suyuan);	 
        $v_suyuan        = str_replace("{{query_time}}",$query_time,$v_suyuan);	
		$v_suyuan        = str_replace("{{addip}}",$addip,$v_suyuan);	
 echo $v_suyuan;
	   ?>
	   <?php }  ?>
	  </div>
	  
	  
	  
	  
	  
	  	<!--如果显示关联的代理商信息  -->
	   <div style="margin-bottom:20px;">
	  <?php if($cf['agent_view']=="yes" ){ ?>
	 <!--标题框样式  -->
     <section  style="margin: 5px 0px; width: 100%; display: inline-block;  border-color: rgb(89, 195, 249);">
        <section style="float: left; height: 36px; width: 8px; color: rgb(255, 255, 255); border-color: rgb(89, 195, 249); background-color: rgb(89, 195, 249);"></section>
        <section style="padding: 0px 30px 0px 10px; float: left; height: 36px; line-height: 36px; color: rgb(255, 255, 255); border-color: rgb(89, 195, 249); background-color: rgb(89, 195, 249);">
            <section style="box-sizing: border-box; color: inherit; border-color: rgb(89, 195, 249);">
                <span style="color: inherit; font-size: 16px; border-color: rgb(89, 195, 249);">代理商详情      </span>
            </section>
        </section>
        <section  style="margin: 0px; padding: 0px; box-sizing: border-box; width: 0px; height: 0px; border-left-width: 15px; border-left-style: solid; border-color: transparent rgb(89, 195, 249); border-top-width: 18px; border-top-style: solid; border-bottom-width: 18px; border-bottom-style: solid; float: left; color: inherit;"></section>
        <section  style="margin-right: 15px; box-sizing: border-box; float: left; border-color: rgb(89, 195, 249); color: inherit;">
            <section class="96wx-bdc" style="border-color: rgb(89, 195, 249); color: inherit;">
                <section style="margin-right: 5px; width: 8px; height: 18px; float: left; transform: skewX(40deg); color: rgb(255, 255, 255); border-color: rgb(89, 195, 249); background-color: rgb(89, 195, 249);"></section>
            </section>
            <section style="clear: both; border-color: rgb(89, 195, 249); color: inherit;">
                <section  style="margin-right: 5px; width: 8px; height: 18px; float: left; transform: skewX(-40deg); color: rgb(255, 255, 255); border-color: rgb(89, 195, 249); background-color: rgb(89, 195, 249);"></section>
            </section>
        </section>
</section>

<p>
    <br/>
</p>
 <!--标题框样式 end  -->
	  <div class="agent">
	   所属代理商：<?php echo $dlname; ?><br>
	   代理商编号：<?php echo $agentid; ?><br>
	   手机号：<?php echo $phone; ?><br>
	   微信号：<?php echo $weixin; ?><br>
	   QQ号：<?php echo $qq; ?><br>
	   联系电话：<?php echo $tel; ?><br>
	   联系地址：<?php echo $dizhi; ?><br>
	   <?php echo $about; ?>
	   </div>
	   <?php }  ?>
	  </div>
	   
 
	
     </div>	
	
 <!--end -->  	
	 
	
</BODY>
</HTML>