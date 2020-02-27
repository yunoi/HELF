<?php
function insert_init_data($conn, $table_name){
  $flag="NO";
  $sql = "SELECT * from $table_name";
  $result=mysqli_query($conn,$sql) or die('Error: '.mysqli_error($conn));

  $is_set=mysqli_num_rows($result);

  if(!empty($is_set) ){
    $flag="OK";
  }

  if($flag=="NO"){
    switch($table_name){
          case 'members' :
            $sql = "
            insert into members values ('admin', 'aaa123', '관리자', '010-1234-5678', 'admin@naver.com', '04751\$서울 성동구 왕십리로 지하 300\$왕십리역사', 'admin'), ('yunhae', 'aaa123', '강유내', '010-1111-1111', 'yunhae@naver.com', '04751\$서울 성동구 왕십리로 지하 300\$왕십리역사', 'master'), ('pangyu', 'aaa123', '김팡규', '010-2222-2222', 'pangyu@naver.com', '04751\$서울 성동구 왕십리로 지하 300\$왕십리역사', null);";
            break;
          case 'program' :
            $sql = "insert into program values(null, '판규헬스장', 'PT', '판규헬스장에서 피티받으실분 모집합니다', '먼저 현대인의 가장 큰 문제점인 불균형한 자세 체크 후 앞으로의 방향을 제시합니다.
            그 후에는 재활 필라테스운동과 웨이트운동을 병행하여 몸의 무너진 밸런스부터 잡으며 시작합니다! 또한 필요에 따라 수업과 동시에 온라인 트레이닝(목적에 맞는 운동/스트레칭 영상)도 같이 진행하고 있습니다. *다이어트 식단관리 포함.
            최대한 원하는 목표를 성취하실 수 있도록 도와드립니다!', 3, '2020-03-05', '선택' , 500000 , '서울시 노원구 상계2동' , 'abc.jpg', 'abc.jpg', 'abc.jpg' , '2020-02-13'), (null, '판규헬스장', 'PT', '판규헬스장에서 피티받으실분 모집합니다', '먼저 현대인의 가장 큰 문제점인 불균형한 자세 체크 후 앞으로의 방향을 제시합니다.
            그 후에는 재활 필라테스운동과 웨이트운동을 병행하여 몸의 무너진 밸런스부터 잡으며 시작합니다! 또한 필요에 따라 수업과 동시에 온라인 트레이닝(목적에 맞는 운동/스트레칭 영상)도 같이 진행하고 있습니다. *다이어트 식단관리 포함.
            최대한 원하는 목표를 성취하실 수 있도록 도와드립니다!', 3, '2020-03-05', 'PT 10회' , 500000 , '서울시 노원구 상계2동' , 'abc.jpg', 'abc.jpg', 'abc.jpg' , '2020-02-13');";
            break;
          case 'p_review' :
            $sql = "insert into p_review values (null, 'admin', 1, '여기 맛집이요', '2020-02-14', 'pt', '판규헬스장', '5');";
            break;
          case 'p_qna' :
            $sql = "insert into p_qna values (null, 1, 0, 0, 'admin', 1, '판규헬스장', 'pt', '오늘 점심은 뭔가요?', '기대된다', '2020-02-14');";
            break;
            case 'notice' :
              $sql = "INSERT INTO `notice` (`num` , `subject` , `content` , `regist_day` , `hit` , `file_name` , `file_type` , `file_copied`)
              VALUES(null,'3월 수료한다','3월에 수료하는데 살빼서 멋진 정장입자','2020-02-17',0,null,null,null);";
              break;
              case 'faq' :
                $sql = "INSERT INTO `faq`(`num` , `subject` , `content`)
                VALUES(null,'다이어트 비법','꾸준하게 하는것입니다.답변:김OO');";
                break;
          case 'comment' :
            $sql = "INSERT INTO `comment` (`num`, `parent`, `id`, `name`, `content`, `regist_day`, `b_code`) VALUES (null, '1', 'ysm2678', '유세미', '댓글내용입니다', '2020-02-11 (21:32)', '자유게시판');";
            break;
          case 'community' :
            $sql = "INSERT INTO `community` (`num`, `id`, `name`, `subject`, `content`, `regist_day`, `hit`, `file_name`, `file_type`, `file_copied`, `likeit`, `b_code`) VALUES (null, 'ysm2678', '유세미', '제목입니다', '내용입니다', '2020-02-11 (21:33)', '0', 'sleepyHeadCat.png', 'image/png', '2020_02_11_14_43_36.png', '0', '다이어트후기');";
            break;
          case 'health_info' :
            $sql = "INSERT INTO `health_info` (`num`, `id`, `name`, `subject`, `content`, `regist_day`, `hit`, `file_name`, `file_type`, `file_copied`, `likeit`, `b_code`) VALUES (null, 'admin', '관리자', '제목입니다', '내용입니다', '2020-02-10 (21:32)', '100', 'sleepyHeadCat.png', 'image/png', '2020_02_11_14_43_36.png', '25', '레시피');";
            break;
          case 'together' :
            $sql = "INSERT INTO `together` (`num`, `id`, `name`, `area`, `subject`, `content`, `regist_day`, `hit`, `file_name`, `file_type`, `file_copied`, `likeit`, `b_code`, `group_num`, `depth`, `ord`) VALUES (null, 'ysm2678', '유세미', '전북', '제목입니다', '내용입니다', '2020-02-11 (21:32)', '2000', 'sleepyHeadCat.png', 'image/png', '2020_02_11_14_43_36.png', '1999', '같이할건강', '1', '0', '0');";
            break;

      default:
        echo "<script>alert('해당 테이블 이름이 없습니다. ');</script>";
        break;
    }//end of switch

    if(mysqli_query($conn,$sql)){
      echo "<script>alert('$table_name 테이블 초기값 셋팅 완료');</script>";
    }else{
      echo "실패원인".mysqli_error($conn);
    }
  }//end of if flag

}//end of function

?>
