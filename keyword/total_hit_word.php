<?
$times = fileatime(str_replace("\\","/",dirname(__FILE__)."/")."total_hit_word_tmp.php");
if($times>time()-10)
{
	require_once str_replace("\\","/",dirname(__FILE__)."/")."total_hit_word_tmp.php";
}
else
{

	@header("Cache-Control: no-cache, must-revalidate"); 
	@header("Pragma: no-cache"); 
	@Header("Content-type: text/xml"); 

	require_once str_replace("\\","/",dirname(__FILE__)."/")."lib.php";

	echo "<?xml version=\"1.0\" encoding=\"euc-kr\"?>\n";
	$rss_idsu .= "<rss version=\"2.0\" xmlns:dc=\"http://purl.org/dc/elements/1.1/\">\n" ; 
	$rss_idsu .= "<channel>\n"; 
	$rss_idsu .= "<title>실시간 검색어</title> \n"; 
	$rss_idsu .= "<dc:language>ko</dc:language> \n"; 
	$rss_idsu .= "<item>\n"; 
	$sql = "select skey,total,order_total from $search_table order by total desc limit 10";
	$result = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_assoc($result))
	{
		$rss_idsu .= "<word>".str_replace("/td>","",strip_tags($row[skey]))."</word>\n"; 
		$rss_idsu .= "<word_hit>".$row[total]."</word_hit>\n"; 
		$rss_idsu .= "<word_order>".$row[order_total]."</word_order>\n"; 
	}
	$rss_idsu .= "</item>\n"; 
	$rss_idsu .= "</channel>\n"; 
	$rss_idsu .= "</rss>\n"; 

	echo $rss_idsu; 

	$header = "<?\r\n header(\"Cache-Control: no-cache, must-revalidate\");\r\n";
	$header .= "header(\"Pragma: no-cache\");\r\n";
	$header .= "Header(\"Content-type: text/xml\");\r\n";
	$header .= "echo \"<?xml version=\\\"1.0\\\" encoding=\\\"euc-kr\\\"?>\";\r\n?>";
	$f = fopen(str_replace("\\","/",dirname(__FILE__)."/")."total_hit_word_tmp.php",w);
	fwrite($f,$header.$rss_idsu);
	fclose($f);
}
?>