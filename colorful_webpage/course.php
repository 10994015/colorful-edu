<?php 
$sql_str = "SELECT * FROM course WHERE coursetype='夏令營'";
$RS_course = $conn -> query($sql_str);

$sql_str = "SELECT * FROM course WHERE coursetype='實體課程'";
$RS_course2 = $conn -> query($sql_str);
?>

<link rel="stylesheet" href="./css/course.css">

<div id="course">
    <div class="banner">
        <img src="./images/class.jpg" alt="">
        <div class="text">
            <p>課程引入、線上課程、實體課程、遊留學</p>
            <h2>幫助您進行課程規劃</h2>
        </div>
    </div>
    <div class="intro">
        <h1>我們的服務</h1>
        <div class="content">
            <div class="grid">
                <div class="item">
                    <a href="?page=camp&type=1">
                        <img src="./images/0307.jpg" alt="">
                        <h2>冬令營/夏令營</h2>
                    </a>
                    <p>
                        <?php foreach($RS_course as $item){ 
                            echo $item['coursename']."\n"; 
                         } ?>
                    </p>
                </div>
            </div>
            <div class="grid">
                <div class="item">
                    <a href="?page=camp&type=2">
                        <img src="./images/0308.jpg" alt="">
                        <h2>平日營/假日營</h2>
                    </a>
                    <p>將於近期更新，請敬請期待。</p>
                </div>
            </div>
            <div class="grid">
                <div class="item">
                    <a href="?page=camp&type=3">
                        <img src="./images/0309.jpg" alt="">
                        <h2>實體課/線上課</h2>
                    </a>
                    <p>
                        <?php foreach($RS_course2 as $item){ 
                            echo $item['coursename']."\n"; 
                         } ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="enter">
      <h1>企業學校團班</h1>
      <div class="item">
          <img src="./images/a.jpg" alt="">
          <div class="text">
              <h2>企業學校團班</h2>
              <p>線上家教：我們將派專業教師，於指定日期時間於線上進行授課</p>
              <p>企業團班：我們將派專業講師團隊至企業團體授課</p>
          </div>
      </div>
    </div>
    <!-- <div class="online">
        <h1>線上課程</h1>
        <div class="content">
            <div class="live">
                <h2>直播課程</h2>
                <p class="text">完成五步驟輕鬆上課去~</p>
                <ul class="step">
                        <li>報名上課</li>
                        <li>安排上課時間</li>
                        <li>安排專業教師</li>
                        <li>選擇一對一或一對多教學</li>
                        <li>立即上課</li>
                </ul>
            </div>
            <div class="line"></div>
            <div class="prepare">
                <h2>預錄課程</h2>
                <p class="text">完成一步驟立即上課去~</p>
                <ul class="step">
                        <li>購買課程</li>
                        <li>立即上課</li>
                </ul>
            </div>
            </div>
            <div class="where">
            </div>
    </div> -->
    <div class="entity">
      <h1>實體課程</h1>
      <!-- content 左邊放課表，右邊放教室的圖片 -->
      <div class="content">
          <div class="top">
             <div class="text">
                  <h2>冰芬美語補習班</h2>
                  <p>
                      ◎國小課後照顧 (免費課後小點心)<br />
                        一二年級$5500/月<br />
                        三四年級$5200/月<br />
                        五六年級$4800/月<br />
                        ◎國小美語<br />
                        一期$3200/4堂<br />
                        ◎國小數學<br />
                        一期$3200/4堂<br /><br />
                        ⭐️一次報名符合以下任一條件，學費再享折扣⭐️<br />
                        1.多科<br />
                        2.多期<br />
                        3.親友揪團<br />
                        4.領有低收證明<br /><br />
                        📣優惠名額有限，報名從速~~<br />
                        🎉更多課程內容資訊歡迎來詢問🙂
                       
                  </p>
             </div>
             <img src="./images/benfen.png" alt="">
          </div>
          <!-- 照片放到場地租借 -->
          
           
      </div>
    </div>
    <div class="contact">
        <a href="./?page=contact">
            聯絡我們
        </a>
    </div>
</div>