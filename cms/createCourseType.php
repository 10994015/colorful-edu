<?php 
require_once('../config/conn.php');
$sql_str = "SELECT * FROM coursetype ORDER BY id ASC";
$RS_coursetype = $conn -> query($sql_str);

?>

<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新增課程類別</title>
    <link rel="stylesheet" href="../css/cms.css">
</head>
<body>
    <?php include_once('./header.php'); ?>
    <div id="createCourseType">
        <form action="./createCourseTypeChk.php" method="post">
            <h2>新增課程類別</h2>
            <input type="text" placeholder="課程類別..." name="coursetype" require>
            <input type="submit" value="新增">
        </form>

        <ul class="courseList">
            <?php foreach($RS_coursetype as $item){ ?>
                <li> <span><?php echo $item['type']; ?></span> <a  href="javascript:;" onclick="delectFn(<?php echo $item['id']; ?>)">刪除</a> </li>
            <?php } ?>
        </ul>
    </div>
<script>
    function delectFn(id){
        chk = confirm('確定要刪除嗎?');
        if(chk){
            window.location.href = `./deleteCourseType.php?id=${id}`;
        }
    }
</script>
</body>
</html>