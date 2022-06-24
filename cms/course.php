<?php
require_once('../config/conn.php');
session_start();
$sql_str = "SELECT * FROM course ORDER BY id DESC";
$RS_course = $conn -> query($sql_str);
?>

<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新增課程</title>
    <link rel="stylesheet" href="../css/cms.css">
</head>
<body>
    <?php include_once('./header.php'); ?>
    <?php include_once('./toolbar.php'); ?> 
    <div id="course">
       <a href="./create_coures.php">新增課程</a>
       <div class="courseList">
            <div class="item" style="background-color:#0d5784;">
                <p style="font-weight:600;color:#fff">課程名稱</p>
                <span style="font-weight:600;color:#fff">課程類別</span>
                <div class="btn">
                </div>
            </div>
           <?php foreach($RS_course as $item){ ?>
            <div class="item">
                <p><?php echo $item['coursename']; ?></p>
                <span><?php echo $item['coursetype']; ?></span>
                <div class="btn">
                    <a href="./courseupdate.php?id=<?php echo $item['id'];?>">編輯</a>
                    <a href="javascript:;" id="delectbtn" onclick="delectFn(<?php echo $item['id'];?>)">刪除</a>
                </div>
            </div>
           <?php } ?>
        </div>
    </div>

<script>
const delectFn = (id)=>{
    let chk = confirm('確定要刪除嗎?');
    if(chk){
        window.location.href = `./deleteCourse.php?id=${id}`;
        return;
    }
};
</script>
</body>
</html>