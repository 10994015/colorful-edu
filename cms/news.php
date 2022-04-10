<?php
require_once('../config/conn.php');
try{
    $sql_str = "SELECT * FROM news ORDER BY id DESC";
    $RS_mb = $conn -> query($sql_str);
    $total_RS_mb = $RS_mb -> rowCount();
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
    <title>冰芬文教後台管理系統</title>
    <style>
        *{
            margin:0;
            padding: 0;
        }
        .news{
            display: flex;
            flex-direction: column;
            width:80%;
            margin:40px auto;

        }
        .news > a{
            text-align: center;
            background-color: #222;
            text-decoration: none;
            width:150px;
            min-height: 45px;
            line-height: 45px;
            display: block;
            color:#fff;
            font-weight: 600;
            margin:auto;
            margin-bottom: 30px;
        }
        .news .list{
            display: flex;
            justify-content: center;
            align-items: center;
            border-bottom: 1px #ccc solid;
            padding: 10px 0;
        }
        .news .list > img{
            width:220px;
            height: 150px;
            object-fit: cover;
        }
        .news .list .content{
            display: flex;
            flex-direction: column;
            align-items: space-between;
            padding: 15px;
            width:600px;
            height:90px;
        }
        .news .list .content > .contentText{
            width:500px;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 5;
            overflow: hidden;
            height:90px;
        }
        .btnbox{
            display: flex;
            flex-direction: column;
        }
        .btnbox a, .btnbox button {
            min-width:100px;
            height: 35px;
            display: block;
            border:none;
            outline: none;
            background-color: #14844c;
            text-align: center;
            line-height: 35px;
            color:#fff;
            text-decoration: none;
            margin:5px 0;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>
<div id="app">
    <div class="news">
        <a href="./newsCreate.php">新增公告</a>
        <?php foreach($RS_mb as $item){ ?>
        <div class="list">
            <img src="<?php echo $item['imgsrc']; ?>" alt="">
            <div class="content">
                <h4><?php echo $item['title']; ?></h4>
                <p class="contentText"><?php echo $item['content']; ?></p>
            </div>
            <div class="btnbox">
                <a href="./newsUpdate.php?id=<?php echo $item['id'];?>">編輯</a>
                <a href="./newsDelete.php?id=<?php echo $item['id'];?>">刪除</a>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
</body>
</html>