/***************鼠标拖动层代码************************/

var nn6=document.getElementById&&!document.all;
var isdrag=false;
var y,x;
var oDragObj;
var oZindex;

function myMoveMouse(evt) {
	if (isdrag) {
		evt = evt || window.event;
		oDragObj.style.top  =  (nTY + evt.clientY - y)+"px";
		oDragObj.style.left  =  (nTX + evt.clientX - x)+"px";
		return false;
	} 
} 

function initDrag(evt) {
	var oe = nn6 ? evt.target : event.srcElement;
	//var topElement = "HTML";
	while (oe.tagName!="HTML" && oe.style.position!="relative" && oe.style.position!="absolute"){
		oe = nn6 ? oe.parentNode : oe.parentElement;
	} 
	isdrag = true;
	if(!oDragObj){
		oZindex = oe.style.zIndex;
		oe.style.zIndex = 100;
	}
	if (oDragObj && oe!=oDragObj){
		oDragObj.style.zIndex = oZindex;
		oZindex = oe.style.zIndex;
		oe.style.zIndex = 100;
	}
	nTY = parseInt(oe.style.top+0);
	y = nn6 ? evt.clientY : event.clientY;
	nTX = parseInt(oe.style.left+0);
	x = nn6 ? evt.clientX : event.clientX;
	oDragObj = oe;
	document.onmousemove=myMoveMouse;
	//alert('aaa');
	return false;
} 
/*document.onmousedown=initDrag;
document.onmouseup=function(){
	isdrag=false;
}*/
function upDrag(obj){
    //alert('dadwa');
	check(obj);
	isdrag=false;
}





/********************
这个check函数是获取对象的真实坐标的函数
这个函数其实是起着承上启下的作用
连接上面的鼠标拖动函数，又连接到下面的ajax函数
*********************/
function check(obj)
{
  var b=document.getElementById(obj);          //获取ID为a的对象并赋值给b
  var oRect=b.getBoundingClientRect();       //获取对象的getBoundingClientRect的属性
  var x=oRect.left;                             //获取对象当前的X轴坐标
  var y=oRect.top;                             //获取对象当前的Y轴坐标
  var count=document.getElementById('count').value;   //获取数据库总共有多少条记录
  document.getElementById('count').value=parseInt(count)+2;     //为了判断下次拖动层的覆盖效果，count+1
  url="move.php?id="+obj+"&x="+x+"&y="+y+"&count="+count;
  dopage(obj,url);   
}  


/*****************鼠标拖动层代码结束********************/









/****************这一段开始的就是AJAX的调用函数了****************/

var http_request=false;

function send_request(url)          //初始化，指定处理函数，发送请求的函数
{
  http_request=false;
    
  //开始初始化XMLHttpRequest对象
  if(window.XMLHttpRequest)
  {
	 //Mozilla浏览器
     http_request=new XMLHttpRequest();
     if(http_request.overrideMimeType)
	 {
	   //设置MIME类别
       http_request.overrideMimeType("text/xml");
     }
  }
  else if(window.ActiveXObject)
  {
	  //IE浏览器
     try
	 {
      http_request=new ActiveXObject("Msxml2.XMLHttp");
     }
	 catch(e)
	 {
      try
	  {
      http_request=new ActiveXobject("Microsoft.XMLHttp");
      }
	  catch(e)
	  {
		  
	  }
     }
    }
    if(!http_request)
	{
	 //异常，创建对象实例失败
     window.alert("创建XMLHttp对象失败！");
     return false;
    }
    //http_request.onreadystatechange=processrequest;
    //确定发送请求方式，URL，及是否同步执行下段代码
    http_request.open("GET",url,true);
    http_request.send(null);
}
 
 
//处理返回信息的函数
function processrequest()
{
	
   var img = "<img src='attach.gif' style='margin-top:130px; margin-left:250px'>";
   //上面一张为显示图片的地址
   
   if(http_request.readyState==4)
   {
	 //判断对象状态
     if(http_request.status==200)
	 {
	  //信息已成功返回，开始处理信息
      document.getElementById(reobj).innerHTML=http_request.responseText;
     }
     else
	 {
	  //页面不正常
      alert("您所请求的页面不正常！");
     }
   }
   else
   {
	  document.getElementById(reobj).innerHTML = img;     
   }
   
}



//需要在页面中调用的函数
function dopage(obj,url)
{
   //document.getElementById(obj).innerHTML="天拉地啊人啊...";
   reobj = obj;
   send_request(url);
   //alert('ss');
}

/*******************AJAX函数调用完毕*******************/



/************当鼠标滑到对象和滑出对象对该对象的class的操作*****************/

 function over(obj)      //当鼠标经过的时候，对象的calss变成contenth
  {
    var obj=document.getElementById(obj);
	obj.className='contenth';
  }
  
  function out(obj)      //当鼠标移出去的时候，对象的calss变成content
  {
    var obj=document.getElementById(obj);
	obj.className='content';
  }

/*******************对对象的class操作完成****************/

/********当用户点  管理 和 删除 的时候弹出警告************/
function del(action)   //当用户点  管理 和 删除 的时候弹出警告
{
  alert('     本人保留对'+action+'操作\n如果大家有兴趣请自行开发');
}
/*********当用户点  管理 和 删除 的时候弹出警告完成***********/