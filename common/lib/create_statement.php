<?php
function create_table($conn, $table_name){
  $flag="NO";
  $sql = "show tables from helf";
  $result=mysqli_query($conn,$sql) or die('Error: '.mysqli_error($conn));

  while ($row=mysqli_fetch_row($result)) {
    if($row[0] === "$table_name"){//문자열로 넘어오므로 ""으로 처리 ''은 문자열뿐아니라 속성도 반영
      //ansisung 스키마에 찾는 테이블이 있는 경우
      $flag="OK";
      break;
    }
  }//end of while

  if($flag==="NO"){
    switch($table_name){
          case 'members' :
            $sql = "create table members(
              id char(20) not null,
              password char(15) not null,
              name char(10) not null,
              phone char(13) not null,
              email char(40) not null,
              address char(50),
              grade char(10),
              primary key(id)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            break;
          case 'pick' :
            $sql = "create table pick (
              num int not null auto_increment,
              id char(20) not null,
              o_key int not null,
              PRIMARY KEY(num),
              FOREIGN KEY (id) REFERENCES members (id),
              FOREIGN KEY (o_key) REFERENCES program (o_key)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            break;
          case 'buy' :
            $sql = "create table buy (
              num int not null auto_increment,
              id char(20) not null,
              o_key int not null,
              PRIMARY KEY(num),
              FOREIGN KEY (id) REFERENCES members (id),
              FOREIGN KEY (o_key) REFERENCES program (o_key)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            break;
          case 'message' :
            $sql = "create table message (
              num int not null auto_increment,
              send_id char(20) not null,
              rv_id char(20) not null,
              subject char(200) not null,
              content text not null,
              regist_day char(20),
              primary key(num)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            break;
          case 'program' :
            $sql = "create table program (
              o_key int not null auto_increment,
              shop char(10) not null,
              type char(20) not null,
              subject varchar(50) not null,
              content text not null,
              personnel int not null,
              end_day char(20) not null,
              choose char(20) not null,
              price int not null,
              location char(50) not null,
              file_name char(50),
              file_type char(30),
              file_copied char(30),
              regist_day char(15),
              primary key(o_key)
          )ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            break;
          case 'p_review' :
            $sql = "CREATE TABLE p_review(
              id char(20) not null,
              o_key int not null,
              content text not null,
              regist_day char(15),
              primary key (id, o_key),
            constraint fk_members_id FOREIGN KEY (id) REFERENCES members(id) on delete cascade,
              constraint fk_program_o_key FOREIGN KEY (o_key) REFERENCES program(o_key) on delete cascade
        )ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            break;
          case 'p_qna' :
            $sql = "CREATE TABLE p_qna(
              id char(20) not null,
              o_key int not null,
              content text not null,
              regist_day char(15),
              group_num int UNSIGNED NOT NULL,
              depth int UNSIGNED NOT NULL,
              primary key (id, o_key),

            constraint fk_members_id2 FOREIGN KEY (id) REFERENCES members(id) on delete cascade,
              constraint fk_program_o_key2 FOREIGN KEY (o_key) REFERENCES program(o_key) on delete cascade
        )ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ";
            break;
            case 'notice' :
              $sql = "create table notice(
                num int not null auto_increment,
                subject char(200) not null,
                content text not null,
                regist_day char(20) not null,
                hit int not null,
                file_name char(40),
                file_type char(40),
                file_copied char(40),
                primary key(num)
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
              break;
              case 'faq' :
                $sql = "create table faq(
                  num int not null auto_increment,
                  subject text not null,
                  content text not null,
                  primary key(num)
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                break;
          case 'community' :
            $sql = "create table community (
              num int not null auto_increment,
              id char(15) not null,
              name char(10) not null,
              subject char(200) not null,
              content text not null,
              regist_day char(20) not null,
              hit int not null,
              file_name char(40),
              file_type char(40),
              file_copied char(40),
              likeit int not null,
              b_code char(15) NOT NULL,
              primary key(num)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            break;
          case 'comment' :
            $sql = "create table comment (
              num int not null auto_increment,
              parent int not null,
              id char(15) not null,
              name char(10) not null,
              content text not null,
              regist_day char(20) not null,
              b_code char(15) not null,
              primary key(num)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            break;
          case 'health_info' :
            $sql = "create table health_info(
              num int not null auto_increment,
              id char(15) not null,
              name char(10) not null,
              subject char(200) not null,
              content text not null,
              regist_day char(20) not null,
              hit int not null,
              file_name char(40),
              file_type char(40),
              file_copied char(40),
              likeit int not null,
              b_code char(15) not null,
              primary key(num)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            break;
          case 'together' :
            $sql = "create table together(
              num int not null auto_increment,
              id char(15) not null,
              name char(10) not null,
              area char(10) not null,
              subject char(200) not null,
              content text not null,
              regist_day char(20) not null,
              hit int not null,
              file_name char(40),
              file_type char(40),
              file_copied char(40),
              likeit int not null,
              b_code char(15) not null,
              group_num int UNSIGNED NOT NULL,
              depth int UNSIGNED NOT NULL,
              ord int UNSIGNED NOT NULL,
              primary key(num)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            break;
          case 'carecenter' :
            $sql = "create table carecenter(
              city char(20) not null,
               area char(20) not null,
               area_health char(40) not null,
               type char(10) not null,
               name char(20) not null,
               address char(200) not null,
               tel char(20) not null,
              primary key(address)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            break;

      default:
        echo "<script>alert('해당 테이블 이름이 없습니다. ');</script>";
        break;
    }//end of switch

    if(mysqli_query($conn,$sql)){
      echo "<script>alert('$table_name 테이블이 생성되었습니다.');</script>";
    }else{
      echo "실패원인".mysqli_error($conn);
    }
  }//end of if flag

}//end of function

?>
