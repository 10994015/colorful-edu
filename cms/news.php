<?php
require_once('../config/conn.php');
session_start();
try{
    $sql_str = "SELECT * FROM news ORDER BY id DESC";
    $RS_mb = $conn -> query($sql_str);
    $total_RS_mb = $RS_mb -> rowCount();
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
    <title>冰芬文教後台管理系統</title>
    <link rel="stylesheet" href="../css/cms.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
<div id="news">
    <?php include_once('./header.php'); ?>
    <div class="news">
        <a href="./newsCreate.php">新增公告</a>
        <?php foreach($RS_mb as $item){ ?>
        <div class="list">
            <img src="<?php echo $item['imgsrc']; ?>" alt="">
            <div class="content">
                <h4><?php echo $item['title']; ?></h4>
                <p class="contentText"><?php echo $item['content']; ?></p>
                <span><?php if($item['isShow']==1){echo "(顯示)";}else{echo "(不顯示)";} ?></span>
            </div>
            <div class="btnbox">
                <a href="./newsUpdate.php?id=<?php echo $item['id'];?>">編輯</a>
                <a href="javascript:;" onclick="deleteNewFn(<?php echo $item['id'];?>)">刪除</a>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<script>
function deleteNewFn(id){
    let chk = confirm('確定要刪除嗎?');
    if(!chk){
       return; 
    }
    window.location.href = `./newsDelete.php?id=${id}`;
}

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