<?php 
require_once('../config/conn.php');
if(isset($_POST['title']) && $_POST['title']!=""){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $imgsrc = $_POST['imgsrc'];
    $smallImg = $_POST['smallImg'];
    if( $_POST['isShow'] == ""){
        $isShow = 0;
    }else{
        $isShow = $_POST['isShow'];
    }
    $sql_str = "INSERT INTO news (title,content,imgsrc,isShow,smallimg) VALUES (:title,:content,:imgsrc,:isShow,:smallImg)";
    $stmt = $conn -> prepare($sql_str);
    
    $stmt -> bindParam(':title' ,$title);
    $stmt -> bindParam(':content' ,$content);
    $stmt -> bindParam(':imgsrc' ,$imgsrc);
    $stmt -> bindParam(':isShow' ,$isShow);
    $stmt -> bindParam(':smallImg' ,$smallImg);
    $stmt ->execute();

    
    echo "<script>alert('新增成功!');window.location.href = 'news.php' </script>";
}