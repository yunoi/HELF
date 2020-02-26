<?php
require_once str_replace("\\","/",dirname(__FILE__)."/")."lib.php";
?>
<style>
body, td, th, caption, input, select, textarea, caption, p {font-size:9pt; font-family:����;}
A:link    { text-decoration: none; color:#444444;}
A:visited { text-decoration: none; color:#444444;}
A:hover   { text-decoration: underline; color:#FF6600;}
.scroll
{
scrollbar-face-color: #FFFFFF;
scrollbar-shadow-color: #CCCCCC; 
scrollbar-highlight-color: #F0F0F0; 
scrollbar-3dlight-color: #CCCCCC;
scrollbar-darkshadow-color: #CCCCCC; 
scrollbar-track-color: #F0F0F0; 
scrollbar-arrow-color: #32681C;
}
</style>
<SCRIPT LANGUAGE="JavaScript">
<!--
function naver_string_cut(text,cnt)
{
	var text2 = "";
	cnts = text.length;
	for(i=1;i<=cnt;i++)
	{
		text2 = text.substring( 0, cnt );
	}
	if(cnt<cnts)text2 += "...";
	return text2;
}
//-->
</SCRIPT>
<table cellpadding="0" cellspacing="0" border="0" width="500" align="centeR">
	<Tr>
		<td>
			<form name="search_form" method="get" action="<?=$snow_url?>search_ok.php" onsubmit="return search_check_fun();">
			<div id="snowsoft_open" style="position:absolute;margin-left:185px;margin-top:5px;cursor: text;" onclick="search_on_click();"><a href="javascript:;" onclick="search_on();"><img src="./img/arrow.gif" border="0"></a></div>
			<input type="text" name="skey" value="" style="width:200px;height:20px;" onkeyup="search_idsu(this,arguments[0]);" onmousedown="search_idsu(this,arguments[0]);" autocomplete="off">
			<input type="submit" value="�˻�">
			<div></div><div style="position:absolute;"><div id="search_" style="display:none;width:305px;height:100px;background-color:#FFFFFF;" align="center"></div>
			</div>
			<SCRIPT LANGUAGE="JavaScript" src="idsu.js"></SCRIPT>
			<SCRIPT LANGUAGE="JavaScript">
		
				form_name		= "search_form";//������
				input_name		= "skey";//�˻��� input ����
				width			= "204";
				String_cnt		= "10";//���ڼ�
				String_time		= "50";//���� �����¼ӵ�
				new_retime		= "10000";//�ǽð� �˻��� �ٽ� �ҷ����� �ð� 1000�� 1��
				String_color	= "#F0F0FA";//���ڰ� ������ ���ϴ»�
				Back_color		= "#EBF5ED";//������ ����
				url				= "<?=$snow_url?>";
				search_link		= "<?=$snow_search_url?>";
				my_search_keys  = "<?=$_COOKIE['my_search']?>";
				run_search(form_name,input_name,width,url,my_search_keys);
			//-->
			</SCRIPT>
			</form>
		</td>
	</tr>
</table>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<table cellpadding="0" cellspacing="0" border="0" width="200" align="centeR" style="border:1px solid #CCCCCC;">
	<tr align="center" height="30">
		<th>
			�ǽð� �˻���
		</th>
	</tr>
	<tr height="1" bgcolor="#CCCCCC"><td></td></tr>
	<tr height="5"><td></td></tr>
	<tr height="205" valign="top">
		<td>
			<div id="now_word_view"></div>
		</td>
	</tr>
</table>
<SCRIPT LANGUAGE="JavaScript" src="<?=$snow_url?>now_hit_word.js"></SCRIPT>
<br><br>
<table cellpadding="0" cellspacing="0" border="0" width="200" align="centeR" style="border:1px solid #CCCCCC;">
	<tr align="center" height="30">
		<th>
			�˻��� Top10
		</th>
	</tr>
	<tr height="5"><td></td></tr>
	<tr height="1" bgcolor="#CCCCCC"><td></td></tr>
	<tr style="padding-top:5px;" height="205" valign="top">
		<td>
			<div id="total_word_view"></div>
		</td>
	</tr>
</table>
<SCRIPT LANGUAGE="JavaScript" src="<?=$snow_url?>total_hit_word.js"></SCRIPT>
