<?php 
require_once('../config/conn.php');
if(isset($_POST['title']) && $_POST['title']!=""){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $imgsrc = $_POST['imgsrc'];
    $isShow = $_POST['isShow'];
    $sql_str = "INSERT INTO news (title,content,imgsrc,isShow) VALUES (:title,:content,:imgsrc,:isShow)";
    $stmt = $conn -> prepare($sql_str);

    $stmt -> bindParam(':title' ,$title);
    $stmt -> bindParam(':content' ,$content);
    $stmt -> bindParam(':imgsrc' ,$imgsrc);
    $stmt -> bindParam(':isShow' ,$isShow);
    $stmt ->execute();

    
    echo "<script>alert('新增成功!');window.location.href = 'news.php' </script>";
}