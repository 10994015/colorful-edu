<?php 
require_once("../config/conn.php");
session_start();
?>

<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新增卡片</title>
    <link rel="stylesheet" href="../css/cms.css">
</head>
<body>
    <?php include_once('./header.php'); ?>
    <?php include_once('./toolbar.php'); ?>
    <div id="card">
        <a href="./createCard.php">新增卡片</a>
    </div> 
</body>
</html>