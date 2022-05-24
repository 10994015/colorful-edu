<?php 
require_once('../config/conn.php');
if(isset($_GET['id']) && $_GET['id']!=""){
    $id = $_GET['id'];
    $sql_str = "DELETE FROM coursetype WHERE id = :id";
    $stmt = $conn -> prepare($sql_str);
    $stmt -> bindParam(':id', $id);
    $stmt -> execute();
    
    echo "<script> alert('刪除成功!');window.location.href = './createCourseType.php' </script>";
}