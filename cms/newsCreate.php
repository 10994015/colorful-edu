<?php 

?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新增文章</title>
    <style>
    h3{
        text-align: center;
    }
    form{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width:500px;
        margin:auto;
    }
    form >input , form textarea{
        width:100%;
        margin:10px 0;
    }
    form >div{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    #selectImgBox{
        width:100%;
        height: 100vh;
        position: fixed;
        top: 0;
        left:0;
        background-color: rgba(0, 0, 0, .5);
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #selectImgBox > .box{
        width:500px;
        height: 400px;
        background-color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 20px;
        box-sizing: border-box;
    }
    #selectImgBox > .box >form{
        width:100%;
    }
    #selectImgBox > .box >form> input{
        width:80%;
    }
    </style>
</head>
<body>
    <div class="createNews">
        <h3>新增公告</h3>
        <form action="./newsCreateCheck.php" method="POST">
            <input type="text" placeholder="請輸入標題..."  name="title">
            <button id="selectImgBtn">選擇封面照</button>
            <textarea name="" name="content" cols="30" rows="10"  placeholder="請輸入內文..."></textarea>
            <input type="submit" name="submit" value="新增" />
        </form>
       <div id="selectImgBox">
           <div class="box">
               <form action="./newsUploadImg.php" enctype="multipart/form-data" method="POST">
                    <input type="file" name="upload_img">
                    <input type="submit" value="上傳">
                </form>
           </div>
       </div>
    </div>
</body>
</html>