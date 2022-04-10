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

    <?php include_once('./shared/footer.php'); ?>
    
    <script src="./js/script.js"></script>
</body>
</html>