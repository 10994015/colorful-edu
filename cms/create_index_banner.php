<?php
require_once('../config/conn.php');
session_start();
try{
    $sql_str = "SELECT * FROM uploads";
    $RS_img = $conn -> query($sql_str);
    $total_RS_img = $RS_img -> rowCount();
}catch(PDOException $e){
    die('Error!:'.$e->getMessage());
}
if(isset($_SESSION['username'])){
?>

<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>上傳Banner</title>
    <link rel="stylesheet" href="../css/cms.css">
</head>
<body>
   <div id="create_index_banner">
       <?php include_once('./header.php'); ?>

        <form action="./uploadBannerChk.php" method="post">
             <div id="selectBannerBoxBtn">選擇banner</div>
            <input type="hidden" name="banner" value="" id="banner">
            <div id="createImgBox"></div>
            <input type="submit" value="新增" class="cretatBannerBtn">

        </form>

        <div id="selectBannerBox">
            <div class="box">
                <i class="fas fa-times" id="closeBtn"></i>
                <div class="btn"><button id="selectBtn">選擇</button></div>
                <?php foreach($RS_img as $item){?>
                    <img src="../images/img_upload2/<?php echo $item['files_name']; ?>" class="imglist">
                <?php } ?>
            </div>
        </div>

   </div>

   <script src="../js/index_banner.js"></script>
</body>
</html>


<?php }else{ ?>
    <link rel="stylesheet" href="../css/cms.css">
   <div class="error">
    <h1>你無權限進入此網站</h1>
        <a href="./login.php">點此登入</a>
   </div>

<?php
}