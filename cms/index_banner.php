<?php
require_once('../config/conn.php');
session_start();
try{
    $sql_str = "SELECT * FROM banner ORDER BY id DESC";
    $RS_banner = $conn -> query($sql_str);
    $total_RS_banner = $RS_banner -> rowCount();
}catch(PDOException $e){
    die('Error!:'.$e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/cms.css">
</head>
<body>
<?php include_once('./header.php'); ?>
    <div id="index_banner">
        <a href="./create_index_banner.php">點擊新增輪播圖</a>
        <div class="imgBox">
            <?php foreach($RS_banner as $item){ ?>
                <div class="imgList">
                    <img src="<?php echo $item['files_name'];?>" alt="">
                    <a href="javascript:;" onclick="deleteFn(<?php echo  $item['id']; ?>)">刪除</a>
                </div>
            <?php } ?>
           
        </div>
    </div>

<script>
    function deleteFn(id){
        let chk = confirm('確定要刪除嗎?');
        if(chk){
            window.location.href = `./deleteBanner.php?id=${id}`;
            return;
        }
    }
</script>
</body>
</html>