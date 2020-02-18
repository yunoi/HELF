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
<!-- 대전 -->
<select name="sigungucode" title="시군구선택"><option value="">시군구 선택</option><option value="1">대덕구</option><option value="2">동구</option><option value="3">서구</option><option value="4">유성구</option><option value="5">중구</option></select>
<!-- 대구 -->
<select name="sigungucode" title="시군구선택"><option value="">시군구 선택</option><option value="1">남구</option><option value="2">달서구</option><option value="3">달성군</option><option value="4">동구</option><option value="5">북구</option><option value="6">서구</option><option value="7">수성구</option><option value="8">중구</option></select>
<!-- 광주 -->
<select name="sigungucode" title="시군구선택"><option value="">시군구 선택</option><option value="1">광산구</option><option value="2">남구</option><option value="3">동구</option><option value="4">북구</option><option value="5">서구</option></select>
<!-- 부산 -->
<select name="sigungucode" title="시군구선택"><option value="">시군구 선택</option><option value="1">강서구</option><option value="2">금정구</option><option value="3">기장군</option><option value="4">남구</option><option value="5">동구</option><option value="6">동래구</option><option value="7">부산진구</option><option value="8">북구</option><option value="9">사상구</option><option value="10">사하구</option><option value="11">서구</option><option value="12">수영구</option><option value="13">연제구</option><option value="14">영도구</option><option value="15">중구</option><option value="16">해운대구</option></select>
<!-- 울산 -->
<select name="sigungucode" title="시군구선택"><option value="">시군구 선택</option><option value="1">중구</option><option value="2">남구</option><option value="3">동구</option><option value="4">북구</option><option value="5">울주군</option></select>
<!-- 세종특별자치시 -->
<select name="sigungucode" title="시군구선택"><option value="">시군구 선택</option><option value="1">세종특별자치시</option></select>
<!-- 경기도 -->
<select name="sigungucode" title="시군구선택"><option value="">시군구 선택</option><option value="1">가평군</option><option value="2">고양시</option><option value="3">과천시</option><option value="4">광명시</option><option value="5">광주시</option><option value="6">구리시</option><option value="7">군포시</option><option value="8">김포시</option><option value="9">남양주시</option><option value="10">동두천시</option><option value="11">부천시</option><option value="12">성남시</option><option value="13">수원시</option><option value="14">시흥시</option><option value="15">안산시</option><option value="16">안성시</option><option value="17">안양시</option><option value="18">양주시</option><option value="19">양평군</option><option value="20">여주시</option><option value="21">연천군</option><option value="22">오산시</option><option value="23">용인시</option><option value="24">의왕시</option><option value="25">의정부시</option><option value="26">이천시</option><option value="27">파주시</option><option value="28">평택시</option><option value="29">포천시</option><option value="30">하남시</option><option value="31">화성시</option></select>
<!-- 강원도 -->
<select name="sigungucode" title="시군구선택"><option value="">시군구 선택</option><option value="1">강릉시</option><option value="2">고성군</option><option value="3">동해시</option><option value="4">삼척시</option><option value="5">속초시</option><option value="6">양구군</option><option value="7">양양군</option><option value="8">영월군</option><option value="9">원주시</option><option value="10">인제군</option><option value="11">정선군</option><option value="12">철원군</option><option value="13">춘천시</option><option value="14">태백시</option><option value="15">평창군</option><option value="16">홍천군</option><option value="17">화천군</option><option value="18">횡성군</option></select>
<!-- 충청북도 -->
<select name="sigungucode" title="시군구선택"><option value="">시군구 선택</option><option value="1">괴산군</option><option value="2">단양군</option><option value="3">보은군</option><option value="4">영동군</option><option value="5">옥천군</option><option value="6">음성군</option><option value="7">제천시</option><option value="8">진천군</option><option value="9">청원군</option><option value="10">청주시</option><option value="11">충주시</option><option value="12">증평군</option></select>
<!-- 충청남도 -->
<select name="sigungucode" title="시군구선택"><option value="">시군구 선택</option><option value="1">공주시</option><option value="2">금산군</option><option value="3">논산시</option><option value="4">당진시</option><option value="5">보령시</option><option value="6">부여군</option><option value="7">서산시</option><option value="8">서천군</option><option value="9">아산시</option><option value="11">예산군</option><option value="12">천안시</option><option value="13">청양군</option><option value="14">태안군</option><option value="15">홍성군</option><option value="16">계룡시</option></select>
<!-- 경상북도 -->
<select name="sigungucode" title="시군구선택"><option value="">시군구 선택</option><option value="1">공주시</option><option value="2">금산군</option><option value="3">논산시</option><option value="4">당진시</option><option value="5">보령시</option><option value="6">부여군</option><option value="7">서산시</option><option value="8">서천군</option><option value="9">아산시</option><option value="11">예산군</option><option value="12">천안시</option><option value="13">청양군</option><option value="14">태안군</option><option value="15">홍성군</option><option value="16">계룡시</option></select>
<!-- 경상남도 -->
<select name="sigungucode" title="시군구선택"><option value="">시군구 선택</option><option value="1">거제시</option><option value="2">거창군</option><option value="3">고성군</option><option value="4">김해시</option><option value="5">남해군</option><option value="6">마산시</option><option value="7">밀양시</option><option value="8">사천시</option><option value="9">산청군</option><option value="10">양산시</option><option value="12">의령군</option><option value="13">진주시</option><option value="14">진해시</option><option value="15">창녕군</option><option value="16">창원시</option><option value="17">통영시</option><option value="18">하동군</option><option value="19">함안군</option><option value="20">함양군</option><option value="21">합천군</option></select>
<!-- 전라북도 -->
<select name="sigungucode" title="시군구선택"><option value="">시군구 선택</option><option value="1">고창군</option><option value="2">군산시</option><option value="3">김제시</option><option value="4">남원시</option><option value="5">무주군</option><option value="6">부안군</option><option value="7">순창군</option><option value="8">완주군</option><option value="9">익산시</option><option value="10">임실군</option><option value="11">장수군</option><option value="12">전주시</option><option value="13">정읍시</option><option value="14">진안군</option></select>
<!-- 전라남도 -->
<select name="sigungucode" title="시군구선택"><option value="">시군구 선택</option><option value="1">강진군</option><option value="2">고흥군</option><option value="3">곡성군</option><option value="4">광양시</option><option value="5">구례군</option><option value="6">나주시</option><option value="7">담양군</option><option value="8">목포시</option><option value="9">무안군</option><option value="10">보성군</option><option value="11">순천시</option><option value="12">신안군</option><option value="13">여수시</option><option value="16">영광군</option><option value="17">영암군</option><option value="18">완도군</option><option value="19">장성군</option><option value="20">장흥군</option><option value="21">진도군</option><option value="22">함평군</option><option value="23">해남군</option><option value="24">화순군</option></select>
<!-- 제주도 -->
<select name="sigungucode" title="시군구선택"><option value="">시군구 선택</option><option value="1">남제주군</option><option value="2">북제주군</option><option value="3">서귀포시</option><option value="4">제주시</option></select>


    <input type="button" id="btn_map" name="" value="검색">
  </body>
</html>
