<?php
ob_start();
require_once str_replace("\\","/",dirname(__FILE__)."/")."lib.php";

require_once str_replace("\\","/",dirname(__FILE__)."/")."clear_date.php";

$total_date_clear = time()+2592000;

$_GET['skey'] = naver_search_cut(trim(htmlspecialchars(strip_tags($_GET['skey']))),20);
if(!$_GET['skey'])
{
?>
<SCRIPT LANGUAGE="JavaScript">
alert('�˻�� �Է����ּ���');
history.back();
//-->
</SCRIPT>
<?
	exit;
}
//���� ã�� �ܾ� ����
$tmp_key = explode(",",$_COOKIE['my_search']);
$tmp_keys = array_search($_GET['skey'],$tmp_key);
if(!$tmp_keys)
{
	$my_search_key = $_COOKIE['my_search'].",".$_GET['skey'];
	@setcookie("my_search",$my_search_key,time()+999999999,"/");
}
//���� ã�� �ܾ� ���� ��

$sql = "select count(skey) as cnt from $search_table where skey = '$_GET[skey]'";
$result = mysqli_query($sql, $connect) or die(mysqli_error($connect));
$row = mysqli_fetch_assoc($result);

if($total_date<time())
{
	mysqli_query("Set @CN := 0", $connect) or die(mysqli_error($connect));
	mysqli_query("update $search_table set order_total = @CN:=@CN+1 order by total desc limit 30", $connect) or die(mysqli_error($connect));
	mysqli_query("update $search_table set total = 0", $connect) or die(mysqli_error($connect));
	$f = fopen("clear_date.php",'w');
	fwrite($f,"<?php\r\n\$total_date = \"".$total_date_clear."\";\r\n\$ecn_clear = \"".$e_field."\";\r\n\r\n?>");
	fclose($f);
}

if($ecn_clear!=$e_field)
{
	if(!$ecn_clear){$ecn_clear="cn";}
	mysqli_query("Set @CN := 0", $connect) or die(mysqli_error($connect));
	mysqli_query("update $search_table set order_cn = @CN:=@CN+1 order by cn desc limit 30", $connect) or die(mysqli_error($connect));
	mysqli_query("update $search_table set cn = 0", $connect) or die(mysqli_error($connect));
	$f = fopen("clear_date.php",'w');
	fwrite($f,"<?php\r\n\$total_date = \"".$total_date_clear."\";\r\n\$ecn_clear = \"".$e_field."\";\r\n?>");
	fclose($f);
}

if($row['cnt'])
{
	mysqli_query("update $search_table set cn = cn + 1, total = total + 1  where skey = '$_GET[skey]'",$connect) or die(mysqli_error($connect)."<br>update error");
}
else
{

	$sql = "insert into $search_table (skey,cn,total) values ('$_GET[skey]',1,1)";
	mysqli_query($sql, $connect) or die(mysqli_error($connect));
}

?>
�˻� �Ϸ� ������