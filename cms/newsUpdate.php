<?php
require_once('../config/conn.php');

if(isset($_GET['id']) && $_GET['id']!=""){
    try{
        $id = $_GET['id'];
        $sql_str = "SELECT * FROM news WHERE id = :id";
        $stmt = $conn->prepare($sql_str);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $row_RS_mb = $stmt->fetch(PDO::FETCH_ASSOC);


        $str = "SELECT * FROM uploads";
        $RS_img = $conn -> query($str);
        $RS_simg = $conn -> query($str);
        $total_RS_img = $RS_img -> rowCount();
    }catch (PDOException $e ){
        die("ERROR!!!: ". $e->getMessage());
      }

   
}
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex">
    <title>編輯</title>
    <link rel="stylesheet" href="../css/cms.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
   <div id="newsUpdate">
    <form action="./chkupdateNews.php" method="post">
        <span id="updateImgBtn">編輯封面</span>
        <img src="<?php echo $row_RS_mb['imgsrc'];?>" id="smallimg">
        <label for="show"> <input type="checkbox" name="isShow" id="show" value="<?php echo $row_RS_mb['isShow'];?>"> <p>顯示</p></label>
        <p>標題</p>
        <input type="text" name="title" value="<?php echo $row_RS_mb['title'];?>">
        <p>內容</p>
        <textarea name="content" id="" cols="30" rows="10"><?php echo $row_RS_mb['content'];?></textarea>
        <div id="createSmallImgBtn" class="createSmallImgBtn">新增小圖</div>
        <div id="smallimglist">
            <?php  echo $row_RS_mb['smallimg']; ?>
        </div>
        <input type="hidden" name="smallimg" value='<?php echo $row_RS_mb['smallimg'];?>' id="smallImgData">
        <input type="hidden" name="imgsrc" id="imgsrc" value="<?php echo $row_RS_mb['imgsrc'];?>">
        <input type="hidden" value="<?php echo $row_RS_mb['id']; ?>" name="id">
        <div class="btnBox">
            <a href="./news.php">回前頁</a>
            <input type="submit" value="編輯">
        </div>
    </form>
    <div id="updateImgBox">
        <div class="box">
            <i class="fas fa-times" id="closeBox"></i>
           <div class="imgbox">
                <?php foreach($RS_img as $item){ ?>
                    <img src="../images/img_upload2/<?php echo $item['files_name'];?>" class="imglist">
                <?php } ?>
           </div>
            <a href="javascript:;" id="selectImg">選擇</a>
        </div>
    </div>

    <div id="createSmallImgBox">
        <div class="box">
        <i class="fas fa-times" id="closeSmallImgBtn"></i>
        <div id="createSmallBtnChk">新增小圖</div>
        <?php foreach($RS_simg as $item){ ?>
            <img src="../images/img_upload2/<?php echo $item['files_name'];?>" class="smallImg">
        <?php } ?>
        </div>
    </div>
   </div>

   <script src="../js/newsUpdate.js"></script>
</body>
</html>