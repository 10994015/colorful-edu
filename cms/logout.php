<?php
include_once('../config/conn.php');
session_start();
$_SESSION['username']  ='';    //將會員名稱記錄到SESSION系統變數
$_SESSION['name']  ='';    //將會員名稱記錄到SESSION系統變數
unset($_SESSION['username']);
unset($_SESSION['name']);
 
header('Location:./');
?>