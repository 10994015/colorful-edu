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
    <title>新增文章</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/cms.css">
</head>
<body>
   <div id="newCreate">
       <?php include_once('./header.php'); ?> 
    <div class="createNews">
            <h3>新增公告</h3>
            <form action="./newsCreateCheck.php" method="POST">
                <div id="selectImgBtn">選擇封面照</div>
                <img src="../images/no.png" id="beforeImg">
                <input type="text" placeholder="請輸入標題..."  name="title" id="title">
                <input type="hidden" value="" name="imgsrc" id="imgsrc">
                <textarea  name="content" placeholder="請輸入內文..." id="content"></textarea>
                <input type="submit" name="submit" value="新增" id="createSubmit" disabled />
            </form>
        <div id="uplaodImgBox">
            <div class="box">
                <i class="fas fa-times" id="uploadImgClose"></i>
                <form action="./newsUploadImg.php" enctype="multipart/form-data" method="POST">
                        <input type="file" name="upload_img">
                        <input type="submit" value="上傳">
                    </form>
            </div>
        </div>
        <div id="selectImgBox">
            <div class="box">
            <i class="fas fa-times" id="selectImgClose"></i>
            <div id="uploadImgBtn">上傳新照片</div>
            <div class="imgbox">
                <?php foreach($RS_img as $item){ ?>
                <img src="../images/img_upload2/<?php echo $item['files_name']; ?>" class="imglist">
                <?php } ?>
            </div>
            <a href="javascript:;" id="chkSelectBtn" class="disabled">選擇</a>
            </div>
        </div>
        </div>
   </div>
    <script src="../js/newsCreate.js"></script>
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