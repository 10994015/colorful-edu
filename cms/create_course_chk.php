<?php
require_once('../config/conn.php');
if(isset($_POST['content']) && $_POST['content']!=""){
    $name = $_POST['name'];
    $coursetype = $_POST['coursetype'];
    $bigtype = $_POST['bigtype'];
    $content = $_POST['content'];

    $sql = "INSERT INTO course (coursename,coursetype,bigtype,content) VALUES (:coursename,:coursetype,:bigtype,:content)";
    $stmt = $conn -> prepare($sql);
    
    $stmt -> bindParam(':coursename' ,$name);
    $stmt -> bindParam(':coursetype' ,$coursetype);
    $stmt -> bindParam(':bigtype' ,$bigtype);
    $stmt -> bindParam(':content' ,$content);
    $stmt ->execute();



    
    echo "<script>alert('新增成功!');window.location.href = 'course.php' </script>";
}