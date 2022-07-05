<?php 
require_once('../config/conn.php');
if(isset($_POST['icon'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $icon = $_POST['icon'];
    $color = $_POST['color'];

    $sql = "INSERT INTO card (title,content,icon,color) VALUES (:title,:content,:icon,:color)";
    $stmt = $conn -> prepare($sql);
    
    $stmt -> bindParam(':title' ,$title);
    $stmt -> bindParam(':content' ,$content);
    $stmt -> bindParam(':icon' ,$icon);
    $stmt -> bindParam(':color' ,$color);
    $stmt ->execute();

    echo "<script>alert('新增成功!');window.location.href = 'card.php' </script>";
}