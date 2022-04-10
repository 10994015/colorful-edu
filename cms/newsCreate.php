<?php 
require_once('../config/conn.php');
try{
    $sql_str = "SELECT * FROM uploads";
    $RS_img = $conn -> query($sql_str);
    $total_RS_img = $RS_img -> rowCount();
}catch(PDOException $e){
    die('Error!:'.$e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新增文章</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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
            height: 30px;
        }
        form textarea{
            height: 200px;
            resize: none;
        }
        form >div{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        #uplaodImgBox{
            width:100%;
            height: 100vh;
            position: fixed;
            top: 0;
            left:0;
            background-color: rgba(0, 0, 0, .5);
            display: flex;
            justify-content: center;
            align-items: center;
            display: none;
            z-index: 999999999999999999;
        }
        #uplaodImgBox > .box{
            width:500px;
            height: 400px;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            box-sizing: border-box;
            position:relative;
        }
        #uplaodImgBox > .box >form{
            width:100%;
        }
        #uplaodImgBox > .box >form> input{
            width:80%;
        }
        #uploadImgBtn{
            position:absolute;
            top: 10px;
            left:35px;
            display: block;
            width:100px;
            height: 35px;
            background-color: #333;
            color:#fff;
            text-align: center;
            line-height: 35px;
            font-weight: 600;
            cursor: pointer;
        }
        #uploadImgClose, #selectImgClose{
            position:absolute;
            top: 10px;
            right:10px;
            cursor: pointer;
            font-size: 24px;
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
            display: none;
        }
        #selectImgBox > .box{
            width:800px;
            height: 500px;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            box-sizing: border-box;
            position:relative;
            overflow-y:scroll; 
            padding-top: 170px;
            
        }
        #selectImgBox > .box > .imgbox{
            display: flex;
            flex-wrap: wrap;
            width:100%;
            height: auto;
            padding: 10px;
            margin:auto;
        }
        #selectImgBox > .box > .imgbox > img{
            width:220px;
            height: 150px;
            margin:5px;
            object-fit: cover;
            cursor: pointer;
        }
        #chkSelectBtn{
            display: block;
            width:100px;
            height: 35px;
            text-align: center;
            line-height: 35px;
            background-color: #333;
            color:#fff;
            font-weight: 600;
            text-decoration: none;
            font-size: 16px;
            margin-top: 25px;
        }
        #beforeImg{
            width:150px;
            height: 150px;
            object-fit: cover;
        }
        #selectImgBtn{
            width:110px;
            height: 35px;
            line-height: 35px;
            background-color: #333;
            color:#fff;
            text-align: center;
            font-weight: 600;
            display: block;
            cursor: pointer;
            margin-bottom: 8px;
        }
        #chkSelectBtn.disabled{
            background-color: #ccc;
            cursor: default;
        }
    </style>
</head>
<body>
    <div class="createNews">
        <h3>新增公告</h3>
        <form action="./newsCreateCheck.php" method="POST">
            <div id="selectImgBtn">選擇封面照</div>
            <img src="../images/no.png" id="beforeImg">
            <input type="text" placeholder="請輸入標題..."  name="title" id="title">
            <input type="hidden" value="" name="imgsrc" id="imgsrc">
            <textarea  name="content" placeholder="請輸入內文..." id="content"></textarea>
            <input type="submit" name="submit" value="新增" id="createSubmit" disabled />
        </form>
       <div id="uplaodImgBox">
           <div class="box">
               <i class="fas fa-times" id="uploadImgClose"></i>
               <form action="./newsUploadImg.php" enctype="multipart/form-data" method="POST">
                    <input type="file" name="upload_img">
                    <input type="submit" value="上傳">
                </form>
           </div>
       </div>
       <div id="selectImgBox">
           <div class="box">
           <i class="fas fa-times" id="selectImgClose"></i>
           <div id="uploadImgBtn">上傳新照片</div>
           <div class="imgbox">
               <?php foreach($RS_img as $item){ ?>
               <img src="../images/img_upload2/<?php echo $item['files_name']; ?>" class="imglist">
               <?php } ?>
           </div>
           <a href="javascript:;" id="chkSelectBtn" class="disabled">選擇</a>
           </div>
       </div>
    </div>
    <script src="../js/newsCreate.js"></script>
</body>
</html>