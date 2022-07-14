<?php 
require_once("../config/conn.php");
session_start();
try{
    $sql_str = "SELECT * FROM card ORDER BY id DESC";
    $RS_card = $conn -> query($sql_str);
    $total_RS_card = $RS_card -> rowCount();
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
    <title>新增卡片</title>
    <link rel="stylesheet" href="../css/cms.css">
</head>
<body>
    <?php include_once('./header.php'); ?>
    <?php include_once('./toolbar.php'); ?>
    <div id="card">
        <a href="./createCard.php">新增卡片</a>

        <div class="list">
        <?php  foreach($RS_card as $item){ ?>
            <div class="item">
                <div class="content">
                    <i class="<?php echo $item['icon']; ?>"></i>
                    <h2><?php echo $item['title']?></h2>
                </div>
                
                <div class="btn">
                    <a href="./update_card.php?id=<?php echo $item['id']; ?>" class="update">編輯</a>
                    <a href="javascript:;" class="delete" onclick="deleteFn(<?php echo $item['id']; ?>)">刪除</a>
                </div>
            </div>
        <?php } ?>
        </div>
    </div> 
<script>

const deleteFn = (id)=>{
    let chk = confirm('確定要刪除嗎?');
    if(chk){
        window.location.href = `./deleteCard.php?id=${id}`;
    }
};
</script>
</body>
</html>