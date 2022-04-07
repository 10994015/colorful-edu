<?php 
require_once('./config/conn.php');
$page = '';
if( isset($_GET['page']) && $_GET['page']!='' ){
  $page =$_GET['page'];
}
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="./images/favicon.ico" type="image/x-icon" / >
    <title>冰芬文教</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   
</head>
<body>
    <header id="header">
        <a href="./" id="logo"><img src="./images/logo.png" alt=""></a>
        <ul id="list">
            <li><a href="./">首頁</a></li>
            <li><a href="./?page=latestnews">最新消息</a></li>
            <li><a href="./?page=course">課程規劃</a></li>
            <li><a href="./?page=nurture">人才培育</a></li>
            <li><a href="./?page=site">場地租借</a></li>
            <li><a href="./?page=contact">聯絡我們</a></li>
        </ul>
        <i class="fas fa-bars" id="menu"></i>
    </header>
    
    <?php
      if($page==''){
        include('./colorful_webpage/index_content.php');
      }else{
        include('./colorful_webpage/'.$page.'.php');
      }
      ?>

    <footer>
        <div class="contact">
            <div class="footerLogo">
                <img src="./images/logo.png" alt="">
                <p>
                    色彩一直是療育人心的良藥
                    繽紛=冰芬 意旨戒掉呆板數學及爛英文的學習方式
                    利用國外的學習模式 "更高的自由度、更強的互動性和更深的參與感" 讓學習更加放鬆、快樂
                </p>
            </div>
            <div class="contactus">
                <h2>聯絡資訊</h2>
                <p>聯絡電話:03-5670018</p>
                <p>客服中心:<br>Jenny.Peng@ice-finland.pro</p>
                <p>地址:<br>300新竹市東區光復路一段271號3樓(原聯合補習班址、台新銀行樓上)</p>
                <p>企業合作:
                    <!-- cuclass -->
                    清大Stem Shcool
                    憶旺智慧
                </p>
            </div>
            <div class="about">
                <h2>關於冰芬</h2>
                <a href="?page=about">關於我們</a>
                <a href="?page=contact">聯絡我們</a>
                <a href="?page=faq">常見問題</a>
                <a href="?page=addmember">加入會員</a>
                <a href="?page=privacypolicy">隱私政策</a>
                <a href="?page=serve">服務條款</a>
            </div>
            <div class="link">
                <h2>追蹤我們</h2>
                <div>
                    <a href="https://www.facebook.com/icefinland/" class="icon"><i class="fab fa-facebook-square"></i></a>
                    <a href="https://www.instagram.com/colorful.institute/" class="icon"><i class="fab fa-instagram"></i></a>
                    <a href="https://lin.ee/7TPK9Fd" class="icon"><i class="fab fa-line"></i></a>
                </div>
                <img src="./images/LINE.png" alt="" class="lineqrcode">
            </div>
        </div>
        <div class="copyright">
            Copyright @2022 <a href="./">冰芬.</a>  All Rights Reserved.
        </div>
    </footer>
    
    <script src="./js/script.js"></script>
</body>
</html>