/*
Copyright snowsoft.co.kr
2006/01.24
*/
var words = Array();word_hits = Array();word_orders = Array();
function Now_Word(url) 
{
	if (document.implementation && document.implementation.createDocument) 
	{
		var nowdoc = document.implementation.createDocument("", "", null);
		nowdoc.onload = function(  ) { NowRss(nowdoc); }
		nowdoc.load(url);

	}
	else if (window.ActiveXObject) 
	{ 

		var nowdoc = new ActiveXObject("Microsoft.XMLDOM");   
		nowdoc.onreadystatechange = function(  ) 
		{            
			if (nowdoc.readyState == 4) NowRss(nowdoc);
		}
		nowdoc.load(url);                                  
	}
}
	 

function NowRss(nowdoc) 
{
	var items = nowdoc.getElementsByTagName("item");
	if(items[0])
	{
		var e = items[0];
		cnt = e.getElementsByTagName("word").length;
		for(i=0;i<cnt;i++)
		{
			words[i] = e.getElementsByTagName("word")[i].firstChild.data;
			word_hits[i] = e.getElementsByTagName("word_hit")[i].firstChild.data;
			word_orders[i] = e.getElementsByTagName("word_order")[i].firstChild.data;

		}
		if(cnt)Now_Word_View(cnt,0);
	}
}

function Now_Word_View(cnt,end_cnt)
{
	var divid = document.getElementById("now_word_view");ht="";order="";
	if(!end_cnt)divid.innerHTML="";
	no = end_cnt+1;
	if(!word_orders[end_cnt] || word_orders[end_cnt]==0)
	{
		order_img = "<img src=\""+url+"img/new.gif\" border=\"0\" alt=\"이전순위 : 순위 밖 총 검색수 : "+word_hits[end_cnt]+"\">";
		order = "";
	}
	else if(word_orders[end_cnt]>no)
	{
		order_img = "<img src=\""+url+"img/up.gif\" border=\"0\" alt=\"이전순위 :"+word_orders[end_cnt]+"위 총 검색수 : "+word_hits[end_cnt]+"\">";
		order = word_orders[end_cnt]-no;
	}
	else if(word_orders[end_cnt]==no)
	{
		order_img = "";
		order = "-";
	}
	else
	{
		order_img = "<img src=\""+url+"img/down.gif\" border=\"0\" alt=\"이전순위 :"+word_orders[end_cnt]+"위 총 검색수 : "+word_hits[end_cnt]+"\">";
		order = no-word_orders[end_cnt];
	}

	ht += "<div style=\"height:20px;\"><span style=\"padding-left:5px;width:10%;\">"+no+"</span><span style=\"padding-left:20px;width:78%;\"><a href=\""+search_link+words[end_cnt]+"\" title=\""+words[end_cnt]+"\">"+naver_string_cut(words[end_cnt],String_cnt)+"</a></span><span style=\"padding-left:5px;width:12%;\"><a href=\"javascript:;\" title=\"이전순위 : "+word_orders[end_cnt]+" 총 검색수 : "+word_hits[end_cnt]+"\">"+order_img+order+"</a></span></div>";
	end_cnt++;

	divid.innerHTML += ht;
	if(cnt!=end_cnt)
	{
		setTimeout("Now_Word_View("+cnt+","+end_cnt+")",String_time);
	}
	else
	{
		divid.innerHTML += "<div title=\"제작 : http://snowsoft.co.kr\" align=\"center\" style=\"padding-right:8px;font-size:5pt;color:#FFFFFF;\">Copyright snowsoft.co.kr</div>";
	}
}
Now_Word(url+'now_hit_word.php');
setInterval("Now_Word('"+url+"now_hit_word.php')",new_retime);