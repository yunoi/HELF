function values(types){
  // 부르는 타입을 마이너스 플러스를 확인후 값에 더하거나 빼는 함수
  let $value=document.getElementById('id')
  if(types ==="plus"){
    $value.value+=1;
  }else{
    if($value.value>1){
      $value.value-=1;
    }else{
      $value.value=1;
    }
  }
}
