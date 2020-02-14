<?php
include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/db_connector.php";
include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/create_statement.php";
include $_SERVER['DOCUMENT_ROOT']."/helf/common/lib/db_ini_insert.php";

create_table($conn, 'members');
create_table($conn, 'message');
create_table($conn, 'program');
create_table($conn, 'p_review');
create_table($conn, 'p_qna');
create_table($conn, 'community');
create_table($conn, 'comment');
create_table($conn, 'health_info');
create_table($conn, 'together');
create_table($conn, 'carecenter');
create_table($conn, 'pick');
create_table($conn, 'buy');

insert_init_data($conn, 'members');
insert_init_data($conn, 'program');
insert_init_data($conn, 'p_review');
insert_init_data($conn, 'p_qna');
insert_init_data($conn, 'comment');
insert_init_data($conn, 'community');
insert_init_data($conn, 'health_info');
insert_init_data($conn, 'together');

?>
