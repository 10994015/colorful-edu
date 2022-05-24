<?php
require_once('./config/conn.php');

$sql_str= "SELECT * FROM course";
$RS_course = $conn -> query($sql_str);

$sql= "SELECT * FROM coursetype";
$RS_course_type = $conn -> query($sql);
?>

<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>夏令營</title>
    <link rel="stylesheet" href="./css/camp.css">
</head>
<body>
    <div id="camp">
        <?php foreach($RS_course_type as $type){ ?>
        <div class="campBox">
            <h2><?php echo $type['type']; ?></h2>
            <ul class="campItem">
                <?php
                    foreach($RS_course as $item){
                    if($type['type'] == $item['coursetype']){
                ?>
                    <a href="?page=coursecontent&id=<?php echo $item['id']; ?>" class="campText"><?php echo $item['coursename']; ?></a>
                <?php } }$RS_course = $conn -> query($sql_str); ?>
            </ul>
        </div>
        
         <?php } ?>
    </div>
</body>
</html>