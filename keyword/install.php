<?php
require_once "lib.php";
	$sql = "CREATE TABLE search_table (
		  no int(11) NOT NULL auto_increment,
		  skey varchar(50) NOT NULL default '',
		  cn int(11) NOT NULL default '0',
		  order_cn int(11) NOT NULL default '0',
		  total int(11) NOT NULL default '0',
		  order_total int(11) NOT NULL default '0',
		  PRIMARY KEY  (no),
		  KEY skey (skey),
		  KEY cn (cn)
		)";
	mysqli_query($sql, $connect) or die(mysqli_error($connect));
?>
�Ϸ�