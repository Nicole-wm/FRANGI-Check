/***************����϶������************************/

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
���check�����ǻ�ȡ�������ʵ����ĺ���
���������ʵ�����ų������µ�����
�������������϶������������ӵ������ajax����
*********************/
function check(obj)
{
  var b=document.getElementById(obj);          //��ȡIDΪa�Ķ��󲢸�ֵ��b
  var oRect=b.getBoundingClientRect();       //��ȡ�����getBoundingClientRect������
  var x=oRect.left;                             //��ȡ����ǰ��X������
  var y=oRect.top;                             //��ȡ����ǰ��Y������
  var count=document.getElementById('count').value;   //��ȡ���ݿ��ܹ��ж�������¼
  document.getElementById('count').value=parseInt(count)+2;     //Ϊ���ж��´��϶���ĸ���Ч����count+1
  url="move.php?id="+obj+"&x="+x+"&y="+y+"&count="+count;
  dopage(obj,url);   
}  


/*****************����϶���������********************/









/****************��һ�ο�ʼ�ľ���AJAX�ĵ��ú�����****************/

var http_request=false;

function send_request(url)          //��ʼ����ָ������������������ĺ���
{
  http_request=false;
    
  //��ʼ��ʼ��XMLHttpRequest����
  if(window.XMLHttpRequest)
  {
	 //Mozilla�����
     http_request=new XMLHttpRequest();
     if(http_request.overrideMimeType)
	 {
	   //����MIME���
       http_request.overrideMimeType("text/xml");
     }
  }
  else if(window.ActiveXObject)
  {
	  //IE�����
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
	 //�쳣����������ʵ��ʧ��
     window.alert("����XMLHttp����ʧ�ܣ�");
     return false;
    }
    //http_request.onreadystatechange=processrequest;
    //ȷ����������ʽ��URL�����Ƿ�ͬ��ִ���¶δ���
    http_request.open("GET",url,true);
    http_request.send(null);
}
 
 
//��������Ϣ�ĺ���
function processrequest()
{
	
   var img = "<img src='attach.gif' style='margin-top:130px; margin-left:250px'>";
   //����һ��Ϊ��ʾͼƬ�ĵ�ַ
   
   if(http_request.readyState==4)
   {
	 //�ж϶���״̬
     if(http_request.status==200)
	 {
	  //��Ϣ�ѳɹ����أ���ʼ������Ϣ
      document.getElementById(reobj).innerHTML=http_request.responseText;
     }
     else
	 {
	  //ҳ�治����
      alert("���������ҳ�治������");
     }
   }
   else
   {
	  document.getElementById(reobj).innerHTML = img;     
   }
   
}



//��Ҫ��ҳ���е��õĺ���
function dopage(obj,url)
{
   //document.getElementById(obj).innerHTML="�����ذ��˰�...";
   reobj = obj;
   send_request(url);
   //alert('ss');
}

/*******************AJAX�����������*******************/



/************����껬������ͻ�������Ըö����class�Ĳ���*****************/

 function over(obj)      //����꾭����ʱ�򣬶����calss���contenth
  {
    var obj=document.getElementById(obj);
	obj.className='contenth';
  }
  
  function out(obj)      //������Ƴ�ȥ��ʱ�򣬶����calss���content
  {
    var obj=document.getElementById(obj);
	obj.className='content';
  }

/*******************�Զ����class�������****************/

/********���û���  ���� �� ɾ�� ��ʱ�򵯳�����************/
function del(action)   //���û���  ���� �� ɾ�� ��ʱ�򵯳�����
{
  alert('     ���˱�����'+action+'����\n����������Ȥ�����п���');
}
/*********���û���  ���� �� ɾ�� ��ʱ�򵯳��������***********/