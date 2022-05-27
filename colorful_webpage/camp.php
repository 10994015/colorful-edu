<?php
require_once('./config/conn.php');
$bigtype = 0;
if(isset($_GET['type']) && $_GET['type']!=""){
    $bigtype = $_GET['type'];
}
$sql_str= "SELECT * FROM course WHERE bigtype=$bigtype";
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
            <h2 class="typename"><?php echo $type['type']; ?></h2>
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

         <?php if($bigtype!=1 && $bigtype!=3){?>
            <div class="stay">
                <h2>將於近期更新，敬請期待!</h2>
            </div>
         <?php } ?>
    </div>

<script>
const campBox = document.getElementsByClassName('campBox');

for(let i=0;i<campBox.length;i++){
    if(campBox[i].querySelector('.campItem').innerHTML.trim()==""){
        campBox[i].querySelector('.typename').style.display = "none";
    }
}

</script>
</body>
</html>