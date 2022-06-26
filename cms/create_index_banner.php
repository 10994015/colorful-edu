<?php
require_once('../config/conn.php');
session_start();
try{
    $sql_str = "SELECT * FROM uploads";
    $RS_img = $conn -> query($sql_str);
    $total_RS_img = $RS_img -> rowCount();

    $sql_str2 = "SELECT sortnum, MAX(sortnum) FROM banner ";
    $RS_banner = $conn -> query($sql_str2);
    $total_RS_banner = $RS_banner -> rowCount();

    $per = -1;
    if($total_RS_banner >=1 ){
        $row_banner = $RS_banner->fetch(PDO::FETCH_ASSOC);
        $pre =  $row_banner['sortnum'] + 1;
    }
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
    <title>上傳輪播圖</title>
    <link rel="stylesheet" href="../css/cms.css">
</head>
<body>
   <div id="create_index_banner">
       <?php include_once('./header.php'); ?>
       <?php include_once('./toolbar.php'); ?> 

        <form action="./uploadBannerChk.php" method="post" enctype="multipart/form-data">
             <div id="selectBannerBoxBtn">選擇banner</div>
             <!-- <input type="hidden" name="banner" value="" id="banner"> -->
             <input type="file" name="banner" id="filebtn" hidden="hidden">
             <label for="filebtn"" class="chooseFile"><i class="fa-solid fa-image"></i>選擇封面照</label>
             <span id="fileText">尚未選擇圖片</span>
             <div id="createImgBox"></div>
             <input type="text" name="url" placeholder="請輸入連結...">
             <input type="text" placeholder="排序(請輸入數字)" name="sort" value="<?php echo $pre; ?>">
             <input type="submit" value="新增" class="cretatBannerBtn">

        </form>

        <!-- <div id="selectBannerBox">
            <div class="box">
               <div class="box-header">
                    <i class="fas fa-times" id="closeBtn"></i>
                   <button id="selectBtn">選擇</button>
               </div>
               <div class="box-content">
               <?php foreach($RS_img as $item){?>
                    <img src="../images/img_upload2/<?php echo $item['files_name']; ?>" class="imglist">
                <?php } ?>
               </div>
                
                </div>
        </div> -->

   </div>

   <script src="../js/index_banner.js"></script>
   <script>
   const fileimgBtn = document.getElementById('filebtn');
    const fileText = document.getElementById('fileText');
    fileimgBtn.addEventListener('change',()=>{
        if(fileimgBtn.value){
            fileText.innerHTML = fileimgBtn.value;
        }else{
            fileText.innerHTML = "尚未選擇圖片";
        }
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