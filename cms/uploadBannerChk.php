<?php

require_once('../config/conn.php');

if(isset($_POST['banner']) && $_POST['banner']){
    $banner = $_POST['banner'];
    $sql_str = "INSERT INTO banner (files_name) VALUES (:banner)";
    $stmt = $conn -> prepare($sql_str);
    
    $stmt -> bindParam(':banner' ,$banner);
    $stmt ->execute();

    echo "<script>alert('新增成功!');window.location.href = 'index_banner.php' </script>";
}