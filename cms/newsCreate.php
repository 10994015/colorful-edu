<?php 
require_once('../config/conn.php');
session_start();
try{
    $sql_str = "SELECT * FROM uploads";
    $RS_img = $conn -> query($sql_str);
    $RS_simg = $conn -> query($sql_str);
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
    <meta name="robots" content="noindex">
    <title>新增最新公告</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/cms.css">
</head>
<body>
   <div id="newCreate">
       <?php include_once('./header.php'); ?> 
       <?php include_once('./toolbar.php'); ?> 
    <div class="createNews">
            <form action="./newsCreateCheck.php" method="POST" enctype="multipart/form-data">
                <!-- <div id="selectImgBtn">選擇封面照</div> -->
                <input type="file" name="imgsrc"  id="fileimgBtn">
                <label for="fileimgBtn" class="chooseFile"><i class="fa-solid fa-image"></i>選擇封面照</label>
                <!-- <img src="../images/no.png" id="beforeImg"> -->
                <label for="show"> <input type="checkbox" value="" id="show" name="isShow"> <p>顯示</p></label>
                <div class="focus"> 
                    <label for="focus"><input type="radio" value="1" name="focus" id="focus">焦點</label>
                    <label for="onfocus"><input type="radio" value="0" name="focus" id="onfocus" checked>非焦點</label>
                </div>
                <input type="text" placeholder="請輸入標題..."  name="title" id="title" required="required">
                <input type="hidden" value="" name="" id="imgsrc">
                <textarea  name="content" placeholder="請輸入內文..." id="content" required="required"></textarea>
                <!-- <div id="addurlbtn">添加網址</div> -->
                <!-- <div id="selectSmallImgBtn">選擇小圖</div> -->
                <div id="beforesmallImg">
                </div>
                <input type="hidden" name="smallImg" value="" id="smallImgData">
                <input type="submit" name="submit" value="新增" id="createSubmit"  />
            </form>
        <div id="uplaodImgBox">
            <div class="box">
                <i class="fas fa-times" id="uploadImgClose"></i>
                <form action="./newsUploadImg.php?url=newsCreate" enctype="multipart/form-data" method="POST">
                        <input type="file" name="upload_img" id="file">
                        <input type="submit" value="上傳" id="fileSubmit">
                    </form>
            </div>
        </div>
        <div id="selectSmallImgBox">
            <div class="box">
                <div class="box-header">
                    <i class="fas fa-times" id="selectSmallImgClose"></i>
                    <a href="javascript:;" id="chkSelectsmallBtn" class="disabled">選擇</a>
                </div>
                

               <div class="box-content">
                <?php foreach($RS_simg as $i){ ?>
                    <div class="imgboxlist">
                        <img src="../images/img_upload2/<?php echo $i['files_name']; ?>" class="smallimglist" onclick="smallImgclickFn()">
                    </div>
                    <?php } ?>
               </div>
                   
            </div>
        </div>
        <div id="selectImgBox">
            <div class="box">
            <i class="fas fa-times" id="selectImgClose"></i>
            <div id="uploadImgBtn" style="display: none;">上傳新照片</div>
            <div class="imgbox">
                <!-- <?php foreach($RS_img as $item){ ?>
                <div class="imgboxlist">
                    <img src="../images/img_upload2/<?php echo $item['files_name']; ?>" class="imglist">
                    <a href="javascript:;" value="" id="chkDeleteImg" onclick="deleteImgFn(<?php echo $item['id']; ?>)"><i class="fas fa-times"></i></a>
                </div>
                <?php } ?> -->
            </div>
            <div class="btnBox">
                <a href="javascript:;" id="chkSelectBtn" class="disabled">選擇</a>
            </div>
            </div>
        </div>
        </div>
   </div>
<script src="../shared/ckeditor4/ckeditor.js"></script>
<script src="../js/newsCreate.js"></script>
<script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script>

<script>
    CKEDITOR.replace('content',{
        extraplugins:'filebrowser',
        height:300,
        width:700,
        filebrowserUploadMethod:"form",
        filebrowserUploadUrl:"./ckeditor_upload.php"
    });
</script>
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