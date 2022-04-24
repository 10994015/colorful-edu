<?php 

require_once('../config/conn.php');
if(isset($_POST['name']) && $_POST['name']!==""){
    $name = $_POST['name'];
    $englishname = $_POST['englishname'];
    $address = $_POST['address'];
    $day = $_POST['day'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql_str = "INSERT INTO sitename (name,englishname,address,day,phone,email) VALUES (:name,:englishname,:address,:day,:phone,:email)";
    $stmt = $conn -> prepare($sql_str);
    $stmt -> bindParam(':name' ,$name);
    $stmt -> bindParam(':englishname' ,$englishname);
    $stmt -> bindParam(':address' ,$address);
    $stmt -> bindParam(':day' ,$day);
    $stmt -> bindParam(':phone' ,$phone);
    $stmt -> bindParam(':email' ,$email);
    $stmt ->execute();

    echo "<script> alert('新增成功!');window.location.href='./site.php'; </script>";
}