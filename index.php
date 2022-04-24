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
    <meta name=”description” content="新竹市冰芬文教補習班。位於新竹市的補習班，冰芬文教，幫助您進行課程規劃、人才培育與場地租借的服務，一起加入冰芬文教!" />
    <title>冰芬文教</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <h1 class="hidden">冰芬文教-新竹市東區</h1>
    <p  class="hidden">位於新竹市的補習班，冰芬文教，幫助您進行課程規劃，另外還有人才培育與場地租借的服務，有興趣的朋友歡迎聯絡我們，一起加入冰芬文教。冰芬文教幫助您進行課程規劃，另外還有人才培育與場地租借的服務，有興趣的朋友歡迎聯絡我們，一起加入冰芬文教!</p>
    <p class="hidden">新竹市補習班</p>
    <p class="hidden">新竹市補習班</p>
    <p class="hidden">新竹市補習班</p>
    <p class="hidden">新竹市補習班</p>
    <p class="hidden">新竹市補習班</p>
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

    <?php include_once('./shared/footer.php'); ?>
    
    <script src="./js/script.js"></script>
</body>
</html>