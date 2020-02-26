<?php
	//�������
	$snow_url = "http://localhost/helf/keyword/";
	$snow_search_url = "http://localhost/keyword/search_ok.php?skey=";
	$yp_host = "localhost";
	$yp_user = "root";
	$yp_pw = "123456";
	$yp_db = "helf";
	$connect = "";
	//������� ����

	if(!$connect) $connect = @mysqli_connect($yp_host,$yp_user,$yp_pw);
	@mysqli_select_db($yp_db, $connect);

	$snow_search_path = str_replace("\\","/",dirname(__FILE__)."/");//������

	$search_table = "search_table";
	$en_time = date("h");
	if($en_time%2==0)//¦���ϰ��
	{
		$e_field = "en";
	}
	else
	{
		$e_field = "cn";
	}

	function naver_search_cut($msg,$cut_size) 
	{
		$han=$eng=$pointtmp="";

		$msg = strip_tags($msg);
		if($cut_size<=0) return $msg;
		for($i=0;$i<$cut_size;$i++) if(ord($msg[$i])>127) $han++; else $eng++;
		$cut_size=$cut_size+(int)$han*0.6;
		$point=1;
		for ($i=0;$i<strlen($msg);$i++) 
		{
			if ($point>$cut_size) return $pointtmp;
			if (ord($msg[$i])<=127) {
				$pointtmp.= $msg[$i];
				if ($point%$cut_size==0) return $pointtmp; 
			} else {
				if ($point%$cut_size==0) return $pointtmp;
				$pointtmp.=$msg[$i].$msg[++$i];
				$point++;
			}
			$point++;
		}
		return $pointtmp;
	}
?>