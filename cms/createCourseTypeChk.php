<?php
require_once('../config/conn.php');

if(isset($_POST['coursetype'])&& $_POST['coursetype']!=""){
    $coursetype = $_POST['coursetype'];

    $sql_str = "INSERT INTO coursetype (type) VALUES (:type)";
    $stmt = $conn -> prepare($sql_str);
    $stmt -> bindParam(':type', $coursetype);
    $stmt -> execute();

    echo "<script>alert('新增成功!');window.location.href = 'create_coures.php' </script>";

}