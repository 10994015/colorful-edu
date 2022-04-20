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
    <title>上傳圖片</title>
    <link rel="stylesheet" href="../css/cms.css">
</head>
<body>
<?php include_once('./header.php');?>
    <div id="uploadImg">
       
        <form action="./newsUploadImg.php?url=uploadImg" enctype="multipart/form-data" method="POST">
            <h2>上傳圖片</h2>
            <input type="file" name="upload_img" id="file">
            <input type="submit" value="上傳" disabled id="submit">
        </form>
        <div class="photo">
            <?php foreach($RS_img as $item){ ?>
               <div class="imglist">
                    <img src="../images/img_upload2/<?php echo $item['files_name']; ?>" alt="">
                    <a href="javascript:;" onclick="deleteLink(<?php echo $item['id']; ?>)"><i class="fas fa-times" id="deleteImg"></i></a>
               </div>
            <?php } ?>
        </div>

        <div id="loading">
                <img src="../images/loading.gif" alt="">
        </div>
    </div>
    <script>
    const file = document.getElementById('file');
    const submit = document.getElementById('submit');
    const loading = document.getElementById('loading');
    function deleteLink(id){
        chk = confirm('確定要刪除嗎?');
        if(chk){
            window.location.href = `./deleteNewsImg.php?id=${id}`;
            return;
        }
    }
    submit.addEventListener('click',()=>{
        loading.style.display = "flex";
    })
    file.addEventListener('change',()=>{
        if(file.value !=""){
            submit.disabled = false;
        }else{
            submit.disabled = true;
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