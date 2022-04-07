<link rel="stylesheet" href="./css/site.css">

<div id="site">
    <div class="banner">
        <img src="./images/site.jpg" alt="">
        <h2>想上課卻沒有場地嗎?</h2>
        <p>我們與眾多文教機構合作，並提供場地的租借使用，歡迎各大文教機構使用</p>
    </div>
    <div class="benfen">
    <div class="left">
          <h2>冰芬美語</h2>
          <p>地址：校本部 🚩 新竹市東區光復路一段271號3樓<br />
          週二至週六 參觀日 10:00-16:30 (請先預約)<br />
          預約電話：03-567-0018<br />
            Email: service@ice-finland.pro </p>
            <button id="leaseBtn" value="冰芬美語">我要租借</button>
      </div>
  
    <div class="right">
      <div class="imgbox">
                <img src="./images/colorful/LINE_ALBUM_冰芬_220222_0.jpg" class='imgList'>
                <img src="./images/colorful/LINE_ALBUM_冰芬_220222_1.jpg" class='imgList'>
                <img src="./images/colorful/LINE_ALBUM_冰芬_220222_2.jpg" class='imgList'>
                <img src="./images/colorful/LINE_ALBUM_冰芬_220222_5.jpg" class='imgList'>
                <img src="./images/colorful/LINE_ALBUM_冰芬_220222_6.jpg" class='imgList'>
                <img src="./images/colorful/LINE_ALBUM_冰芬_220222_8.jpg" class='imgList'>
                <img src="./images/colorful/LINE_ALBUM_冰芬_220222_9.jpg" class='imgList'>
                <img src="./images/colorful/LINE_ALBUM_冰芬_220222_10.jpg" class='imgList'>
                <img src="./images/colorful/LINE_ALBUM_冰芬_220222_15.jpg" class='imgList'>
                <img src="./images/colorful/LINE_ALBUM_冰芬_220222_17.jpg" class='imgList'>
                <img src="./images/colorful/LINE_ALBUM_冰芬_220222_19.jpg" class='imgList'>
                <img src="./images/colorful/LINE_ALBUM_冰芬_220222_20.jpg" class='imgList'>
                <img src="./images/colorful/LINE_ALBUM_冰芬_220222_21.jpg" class='imgList'>
                <img src="./images/colorful/LINE_ALBUM_冰芬_220222_22.jpg" class='imgList'>
                <img src="./images/colorful/LINE_ALBUM_冰芬_220222_25.jpg" class='imgList'>
                <img src="./images/colorful/LINE_ALBUM_冰芬_220222_26.jpg" class='imgList'>
      </div>
        <i class="fa-solid fa-circle-chevron-left leftbtn" id="leftbtn"></i>
        <i class="fa-solid fa-circle-chevron-right rightbtn" id="rightbtn"></i>
      <a href="./?page=photobox" class="seemore">查看更多</a>
    </div>
  </div>

  <div class="leaseModule" id="leaseModule">
      <div class="contentModule">
          <div class="header">我要租借 <i class="fas fa-times" id="leaseClose"></i></div>
          <form class="content">
              <label for="leaseSite"><p>租借場地: <span>(必填)</span> </p><input id="leaseSite" value="冰芬美語" disabled></label>
              <label for="leaseName"><p>您的大名:<span>(必填)</span></p><input id="leaseName" placeholder="ex:王冰芬" required></label>
              <label for="leasePhone"><p>聯絡電話:<span>(必填)</span></p><input id="leasePhone" required></label>
              <label for="leaseEmail"><p>電子信箱:<span>(必填)</span></p><input type="email" id="leaseEmail" required></label>
              <label for="leaseTimeStart"><p>租借時間:<span>(必填)</span></p><input type="date" id="leasleaseTimeStarteTime" required></label>
              <label for="leaseTimeEnd"><p>至</p><input type="date" id="leaseTimeEnd" required></label>
              <label for="leaseUse"><p>租借用途:</p><textarea placeholder="請簡短說明..." name="" id="leaseUse"></textarea></label>
              <label for="submit"><input type="submit" id="submit" value="租借"></label>
          </form>
      </div>
  </div>
  <div class="lightBox" id="lightBox">
        <div class="back" id="back"></div>
        <div class="lightBoxImgbox">
            <img src="./images/a.jpg" alt="" id="imgsrc">
            <i class="fa fa-times" id="imgClose"></i>
        </div>
    </div>
</div>


<script src="./js/site.js"></script>