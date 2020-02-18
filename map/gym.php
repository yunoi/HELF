<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script>
    var x = document.getElementById('name');
    var lat=0;
    var log=0;
    function getLocation() {
      if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showPosition);
      }else{
        x.innerHTML="no";
      }
    }
    $("$btn_map").onclick(function showPosition(position){
      lat=position.coords.latitude;
      log=position.coords.longitude;
      x=lat+","+log; //자기 위치 값에 위도 경도를 합친값
      alert(x);
      function call() {
        let name = document.getElementById('find').value;
        location.href='https://www.google.com/maps/search/?api=1&query='+name;
      }
    });
    function getSigunguList(number){

    }
    </script>
  </head>
  <body>
    <select id="city" title="지역선택" name="areacode" onchange="getSigunguList(this.value);">
  					<option value="" selected="selected">지역선택</option>
  					<option value="1">서울</option>
            <option value="2">인천</option>
            <option value="3">대전</option>
            <option value="4">대구</option>
            <option value="5">광주</option>
            <option value="6">부산</option>
            <option value="7">울산</option>
            <option value="8">세종특별자치시</option>
            <option value="31">경기도</option>
            <option value="32">강원도</option>
            <option value="33">충청북도</option>
            <option value="34">충청남도</option>
            <option value="35">경상북도</option>
            <option value="36">경상남도</option>
            <option value="37">전라북도</option>
            <option value="38">전라남도</option>
            <option value="39">제주도</option>
  				</select>

    <select name="sigungucode" title="시군구선택">  <!-- 서울권 -->
      <option value="">시군구 선택</option>
      <option value="1">강남구</option>
      <option value="2">강동구</option>
      <option value="3">강북구</option>
      <option value="4">강서구</option>
      <option value="5">관악구</option>
      <option value="6">광진구</option>
      <option value="7">구로구</option>
      <option value="8">금천구</option>
      <option value="9">노원구</option>
      <option value="10">도봉구</option>
      <option value="11">동대문구</option>
      <option value="12">동작구</option>
      <option value="13">마포구</option>
      <option value="14">서대문구</option>
      <option value="15">서초구</option>
      <option value="16">성동구</option>
      <option value="17">성북구</option>
      <option value="18">송파구</option>
      <option value="19">양천구</option>
      <option value="20">영등포구</option>
      <option value="21">용산구</option>
      <option value="22">은평구</option>
      <option value="23">종로구</option>
      <option value="24">중구</option>
      <option value="25">중랑구</option>
    </select>
<select name="sigungucode" title="시군구선택"> <!-- 인천 -->
  <option value="">시군구 선택</option>
  <option value="1">강화군</option>
  <option value="2">계양구</option>
  <option value="3">미추홀구</option>
  <option value="4">남동구</option>
  <option value="5">동구</option>
  <option value="6">부평구</option>
  <option value="7">서구</option>
  <option value="8">연수구</option>
  <option value="9">옹진군</option>
  <option value="10">중구</option>
</select>



    <input type="button" id="btn_map" name="" value="검색">
  </body>
</html>
