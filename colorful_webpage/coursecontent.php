<?php
require_once('./config/conn.php');

if(isset($_GET['id'])&&$_GET['id']!=""){
    try{
        $sql_str = "SELECT course.* FROM course WHERE id = :id";
        $id = $_GET['id'];

        $stmt = $conn -> prepare($sql_str);
        
        $stmt -> bindParam(':id' ,$id);
        $stmt ->execute();
        $total = $stmt -> rowCount();
        echo $total;
        
        if($total>=1){
            $row_course = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        $coursename = $row_course['coursename'];
        
        $sql = "SELECT * FROM courselist WHERE coursename = :coursename";

        $stmt2 = $conn -> prepare($sql);
        
        $stmt2 -> bindParam(':coursename' ,$coursename);
        $stmt2 ->execute();
        $totallist = $stmt2 -> rowCount();
        if($totallist>=1){
            $row_courselist = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        }
    }catch(PDOException $e){
        die('Error!:'.$e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./css/camp.css">
</head>
<body>
    <div id="courseContent">
       <div>
           <h1><?php echo $coursename; ?></h1>
           <h2><?php echo $coursename; ?></h2>
            <ul class="courseText">
               
                <?php foreach($row_courselist as $item){ ?>
                    <li><?php echo $item['listname']; ?></li>
                <?php } ?>
                <!-- <li>英文自我介紹認識活動</li>
                <li>認識福爾摩沙</li>
                <li>世界各國首都介紹</li>
                <li>旅遊英文</li>
                <li>旅遊對話活動</li>
                <li>藝術介紹</li>
                <li>國際管理能力訓練</li>
                <li>團隊合作能力訓練</li>
                <li>世界各國文化介紹</li>
                <li>俚語Slang</li>
                <li>俚語小組活動</li>
                <li>特殊風俗民情</li>
                <li>國際領導能力訓練</li>
                <li>批判思考能力訓練</li>
                <li>小小模擬聯合國活動</li>
                <li>國際事件探討</li>
                <li>介紹課程與TarkusVP介面(中文) Discover TarkusVPinterface through Computational Thinking</li>
                <li>英文文學短文賞析(英文) Pseudo-code and Algorithm Writing</li>
                <li>根據故事描述解決數學問題(中文) Problem solving with TarkusVP</li> -->
            </ul>
       </div>
       <div>
           <img src="./images/img_upload2/<?php echo $row_course['files_name']; ?>" alt="">
       </div>
    </div>
</body>
</html>