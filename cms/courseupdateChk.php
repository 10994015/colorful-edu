<?php 

require_once('../config/conn.php');
if(isset($_POST['id']) && $_POST['id']!=""){
try{
    $sql_str = "UPDATE course SET coursename=:name, coursetype=:coursetype, bigtype=:bigtype, content=:content WHERE id=:id";
    $stmt = $conn->prepare($sql_str);
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $coursetype = $_POST['coursetype'];
    $bigtype = $_POST['bigtype'];
    $content = $_POST['content'];

   
    
    $stmt->bindParam(':id' ,$id);
    $stmt->bindParam(':name' ,$name);
    $stmt->bindParam(':coursetype' ,$coursetype);
    $stmt->bindParam(':bigtype' ,$bigtype);
    $stmt->bindParam(':content' ,$content);
    $stmt->execute();
        ?>
        <script>
        alertFn();
        function alertFn(){
            alert('編輯成功!');
            window.location.href = "./course.php";
        }
        </script>
        <?php
    }catch (PDOException $e ){
        die("ERROR!!!: ". $e->getMessage());
    }
}
