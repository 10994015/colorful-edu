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
    <div id="createCard">
        <form action="./createCardCheck.php" method="post">
            <input type="text" placeholder="新增標題..." name="title">
            <textarea name="content" id="" cols="30" rows="10" placeholder="新增內容..."></textarea>
            <i class="" id="chosenIcon"></i>
            <a href="javascript:;" id="createIcon">選擇Icon</a>
            <input type="hidden" name="icon" value="" id="hiddenIcon">
            <input type="hidden" name="color" value="#1484c4">
            <input type="submit" value="新增">
        </form>
        <div id="iconBox">
            <div class="iconBoxHeader"><i class="fa fa-times" id="closeIconBox"></i></div>
            <div class="iconBoxContent">
                <div class="iconList">
                    <i class="fa-solid fa-clone"></i>
                    <i class="fa-solid fa-bezier-curve"></i>
                    <i class="fa-solid fa-brush"></i>
                    <i class="fa-solid fa-circle-half-stroke"></i>
                    <i class="fa-solid fa-circle-nodes"></i>
                    <i class="fa-solid fa-compass-drafting"></i>
                    <i class="fa-solid fa-copy"></i>
                    <i class="fa-solid fa-crop"></i>
                    <i class="fa-solid fa-crop-simple"></i>
                    <i class="fa-solid fa-crosshairs"></i>
                    <i class="fa-solid fa-cube"></i>
                    <i class="fa-solid fa-cubes"></i>
                    <i class="fa-solid fa-draw-polygon"></i>
                    <i class="fa-solid fa-droplet"></i>
                    <i class="fa-solid fa-droplet-slash"></i>
                    <i class="fa-solid fa-eraser"></i>
                    <i class="fa-solid fa-eye"></i>
                    <i class="fa-solid fa-eye-dropper"></i>
                    <i class="fa-solid fa-eye-slash"></i>
                    <i class="fa-solid fa-fill"></i>
                    <i class="fa-solid fa-fill-drip"></i>
                    <i class="fa-solid fa-floppy-disk"></i>
                    <i class="fa-solid fa-font-awesome"></i>
                    <i class="fa-solid fa-highlighter"></i>
                    <i class="fa-solid fa-icons"></i>
                    <i class="fa-solid fa-layer-group"></i>
                    <i class="fa-solid fa-lines-leaning"></i>
                    <i class="fa-solid fa-marker"></i>
                    <i class="fa-solid fa-object-group"></i>
                    <i class="fa-solid fa-object-ungroup"></i>
                    <i class="fa-solid fa-paint-roller"></i>
                    <i class="fa-solid fa-paintbrush"></i>
                    <i class="fa-solid fa-palette"></i>
                    <i class="fa-solid fa-paste"></i>
                    <i class="fa-solid fa-pen"></i>
                    <i class="fa-solid fa-pen-clip"></i>
                    <i class="fa-solid fa-pen-fancy"></i>
                    <i class="fa-solid fa-pen-nib"></i>
                    <i class="fa-solid fa-pen-ruler"></i>
                    <i class="fa-solid fa-pen-to-square"></i>
                    <i class="fa-solid fa-pencil"></i>
                    <i class="fa-solid fa-ruler-combined"></i>
                    <i class="fa-solid fa-scissors"></i>
                    <i class="fa-solid fa-splotch"></i>
                    <i class="fa-solid fa-spray-can"></i>
                    <i class="fa-solid fa-stamp"></i>
                    <i class="fa-solid fa-swatchbook"></i>
                    <i class="fa-solid fa-vector-square"></i>
                    <i class="fa-solid fa-wand-magic"></i>
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                    <i class="fa-solid fa-handshake"></i>
                    <i class="fas fa-vote-yea"></i>
                    <i class="fa-solid fa-handshake-angle"></i>
                    <i class="fa-solid fa-handshake-simple"></i>
                    <i class="fa-brands fa-itunes-note"></i>
                    <i class="fa-solid fa-notes-medical"></i>
                    <i class="fa-solid fa-comment-dots"></i>
                    <i class="fa-solid fa-comment-dollar"></i>
                    <i class="fa-solid fa-comment-medical"></i>
                    <i class="fa-solid fa-archway"></i>
                    <i class="fa-solid fa-earth-americas"></i>
                    <i class="fa-solid fa-earth-oceania"></i>
                    <i class="fa-solid fa-key"></i>
                    <i class="fa-solid fa-plane"></i>
                    <i class="fa-solid fa-plane-circle-check"></i>
                    <i class="fa-solid fa-taxi"></i>
                    <i class="fa-solid fa-hotel"></i>
                    <i class="fa-solid fa-book"></i>
                    <i class="fa-solid fa-book-open"></i>
                    <i class="fa-solid fa-tv"></i>
                    <i class="fa-solid fa-umbrella-beach"></i>
                    <i class="fa-solid fa-utensils"></i>
                    <i class="fa-solid fa-van-shuttle"></i>
                    <i class="fa-solid fa-wifi"></i>
                    <i class="fa-solid fa-wine-glass"></i>
                    <i class="fa-solid fa-wine-glass-empty"></i>
                </div>
                <a href="javascript:;" id="checkicon">確定</a>
            </div>
        </div>
    </div>
<script src="../js/createCard.js"></script>
</body>
</html>