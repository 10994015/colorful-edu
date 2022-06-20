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
       
    }catch(PDOException $e){
        die('Error!:'.$e->getMessage());
    }
}
?>
<div id="courseContent">
    <div>
        <h1><?php echo $coursename; ?></h1>
       
        <p><?php echo $content; ?></p>
       
    </div>
</div>
