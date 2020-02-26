/*
Copyright snowsoft.co.kr
2006/01.24
*/
var t_words = Array();t_word_hits = Array();t_word_orders = Array();
function Total_Word(url) 
{
	if (document.implementation && document.implementation.createDocument) 
	{
		var totaldoc = document.implementation.createDocument("", "", null);
		totaldoc.onload = function(  ) { TotalRss(totaldoc); }
		totaldoc.load(url);

	}
	else if (window.ActiveXObject) 
	{ 

		var totaldoc = new ActiveXObject("Microsoft.XMLDOM");   
		totaldoc.onreadystatechange = function(  ) 
		{            
			if (totaldoc.readyState == 4) TotalRss(totaldoc);
		}
		totaldoc.load(url);                                  
	}
}
	 

function TotalRss(totaldoc) 
{
	var items = totaldoc.getElementsByTagName("item");
	if(items[0])
	{
		var e = items[0];
		cnt = e.getElementsByTagName("word").length;
		for(i=0;i<cnt;i++)
		{
			t_words[i] = e.getElementsByTagName("word")[i].firstChild.data;
			t_word_hits[i] = e.getElementsByTagName("word_hit")[i].firstChild.data;
			t_word_orders[i] = e.getElementsByTagName("word_order")[i].firstChild.data;
		}
		if(cnt)Total_Word_View(cnt,0);
	}
}

function Total_Word_View(cnt,end_cnt)
{
	var divid = document.getElementById("total_word_view");ht="";order="";
	no = end_cnt+1;
	if(!t_word_orders[end_cnt] || t_word_orders[end_cnt]==0)
	{
		order_img = "<img src=\""+url+"img/new.gif\" border=\"0\" alt=\"이전순위 : 순위밖 총 검색수 : "+t_word_hits[end_cnt]+"\">";
		order = "";
	}
	else if(t_word_orders[end_cnt]>no)
	{
		order_img = "<img src=\""+url+"img/up.gif\" border=\"0\" alt=\"이전순위 :"+t_word_orders[end_cnt]+"위 총 검색수 : "+t_word_hits[end_cnt]+"\">";
		order = t_word_orders[end_cnt]-no;
	}
	else if(t_word_orders[end_cnt]==no)
	{
		order_img = "";
		order = "-";
	}
	else
	{
		order_img = "<img src=\""+url+"img/down.gif\" border=\"0\" alt=\"이전순위 :"+t_word_orders[end_cnt]+"위 총 검색수 : "+t_word_hits[end_cnt]+"\">";
		order = no-t_word_orders[end_cnt];
	}
	ht += "<div style=\"height:20px;\"><span style=\"padding-left:5px;width:10%;\">"+no+"</span><span style=\"padding-left:20px;width:78%;\"><a href=\""+search_link+t_words[end_cnt]+"\" title=\""+t_words[end_cnt]+"\">"+naver_string_cut(t_words[end_cnt],String_cnt)+"</a></span><span style=\"padding-left:5px;width:12%;\"><a href=\"javascript:;\" title=\"이전순위 :"+t_word_orders[end_cnt]+"위 총 검색수 : "+t_word_hits[end_cnt]+"\">"+order_img+order+"</a></span></div>";
	end_cnt++;

	divid.innerHTML += ht;
	if(cnt!=end_cnt)
	{
		setTimeout("Total_Word_View("+cnt+","+end_cnt+")",String_time);
	}
	else
	{
		divid.innerHTML += "<div title=\"제작 : http://snowsoft.co.kr\" align=\"center\" style=\"padding-right:8px;font-size:5pt;color:#FFFFFF;\">Copyright snowsoft.co.kr</div>";
	}
}
Total_Word(url+"total_hit_word.php");