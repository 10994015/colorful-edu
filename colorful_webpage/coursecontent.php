<?php
require_once('./config/conn.php');

if(isset($_GET['id'])&&$_GET['id']!=""){
    try{
        $sql_str = "SELECT * FROM course WHERE id = :id";
        $id = $_GET['id'];

        $stmt = $conn -> prepare($sql_str);
        
        $stmt -> bindParam(':id' ,$id);
        $stmt ->execute();
        $total = $stmt -> rowCount();
        
        if($total>=1){
            $row_course = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        $rand = $row_course['rand'];
        $coursename = $row_course['coursename'];
        $content = $row_course['content'];
        $sql = "SELECT * FROM courselist WHERE coursename = :rand";

        $stmt2 = $conn -> prepare($sql);
        
        $stmt2 -> bindParam(':rand' ,$rand);
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
<link rel="stylesheet" href="./css/camp.css">
<div id="courseContent">
    <div>
        <h1><?php echo $coursename; ?></h1>
        <h2><?php echo $coursename; ?></h2>
        <ul class="courseText">
            
            <?php foreach($row_courselist as $item){ ?>
                <li><?php echo $item['listname']; ?></li>
            <?php } ?>
        </ul>
        <p><?php echo $content; ?></p>
        <?php if( $row_course['url']!=""){?>
        <p>報名連結:</p>
        <a href="<?php echo $row_course['url']; ?>" target="_blank"><?php echo $row_course['url']; ?></a>
        <?php } ?>
    </div>
    <div>
        <img src="./images/img_upload2/<?php echo $row_course['files_name']; ?>" alt="">
    </div>
</div>
