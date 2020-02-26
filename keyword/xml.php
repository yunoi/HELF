<?php

require_once str_replace("\\","/",dirname(__FILE__)."/")."lib.php";

$skey = trim(htmlspecialchars($_GET[skey]));
$skey = str_replace("%","\%",$skey);
$sql = "select skey from $search_table where skey like '$skey%' limit 30";
$result = mysql_query($sql) or die(mysql_error());
while($row = mysql_fetch_assoc($result))
{
	$rss .= "    <skeys>".str_replace("/td>","",strip_tags($row[skey]))."</skeys>\r\n";
	$skeys++;
}

if($skeys)
{
	header("Cache-Control: no-cache, must-revalidate"); 
	header("Content-Type: text/xml; charset=EUC-KR"); 
	$rss_idsu .= "<?xml version=\"1.0\" encoding=\"euc-kr\" ?><rss version=\"2.0\" xmlns:dc=\"http://purl.org/dc/elements/1.1/\" xmlns:sy=\"http://purl.org/rss/1.0/modules/syndication/\" xmlns:admin=\"http://webns.net/mvcb/\" xmlns:rdf=\"http://www.w3.org/1999/02/22-rdf-syntax-ns#\">" ; 
	$rss_idsu .= "    <channel>\r\n"; 
	$rss_idsu .= "    <item>\r\n";
	$rss_idsu .= $rss; 
	$rss_idsu .= "    </item>\r\n";
	$rss_idsu .= "    </channel>\r\n"; 
	$rss_idsu .= "  </rss>\r\n"; 
	echo $rss_idsu;
}

?>