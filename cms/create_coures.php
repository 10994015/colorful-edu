<?php
require_once('../config/conn.php');
session_start();
$sql_str = "SELECT * FROM coursetype ORDER BY id ASC";
$RS_course_type = $conn -> query($sql_str);


?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新增課程</title>
    <link rel="stylesheet" href="../css/cms.css">
</head>
<body>
<?php include_once('./header.php'); ?>
<?php include_once('./toolbar.php'); ?> 
    <div id="create_course">
        <form action="create_course_chk.php" method="post">
            <p>課程類別:</p>
            <select name="coursetype" id="coursetype">
                <?php foreach($RS_course_type as $item){ ?>
                <option value="<?php echo $item['type']; ?>"><?php echo $item['type']; ?></option>
                <?php } ?>
            </select>
            <a href="./createCourseType.php" class="createTypeBtn">新增課程類別</a>
            <input type="text" name="name" placeholder="課程名稱">
            <!-- <span>新增圖片</span>  -->
            <!-- <input type="file" name="files_name"> -->
            <!-- <div id="listnameBox">
                <input type="text"  class="listnameClass" placeholder="課程列表...">
            </div> -->
            <!-- <a href="javascript:;" id="addBtn">+</a> -->
            <textarea name="content" cols="30" rows="10" placeholder="課程說明內容..."></textarea>
            <!-- 報名網址:<input type="text" name="url" placeholder="請輸入網址..." class="urlbox"> -->
            <label for="bigtype1">
                <input type="radio" name="bigtype" value="1" id="bigtype1" checked>夏令營/冬令營
            </label>
            <label for="bigtype2">
                <input type="radio" name="bigtype" value="2" id="bigtype2">平日營/假日營
            </label>
            <label for="bigtype3">
                <input type="radio" name="bigtype" value="3" id="bigtype3">實體課/線上課
            </label>
            <input type="hidden" name="listname" id="listname">
            <input type="submit" value="新增" id="submit">
        </form>
    </div>
<script src="../shared/ckeditor4/ckeditor.js"></script>
<script src="https://ckeditor.com/apps/ckfinder/3.5.0/ckfinder.js"></script>

<script>

CKEDITOR.replace('content',{
        extraplugins:'filebrowser',
        height:300,
        filebrowserUploadMethod:"form",
        filebrowserUploadUrl:"./ckeditor_upload.php",
    });



// const listnameBox = document.getElementById('listnameBox');
// const listname = document.getElementById('listname');
// const addBtn = document.getElementById('addBtn');
// const submit = document.getElementById('submit');
// const listnameClass = document.getElementsByClassName('listnameClass');
// let arr = [];
// submit.addEventListener('click',submitClickFn);
// addBtn.addEventListener('click',()=>{
//     var str = document.createElement('input');
//     // str.innerHTML = `<input type="text" class="name" placeholder="企業名稱...">`;
//     str.setAttribute('class','listnameClass');
//     str.setAttribute('type','text');
//     str.setAttribute('placeholder','課程列表...');
//     document.querySelector('#listnameBox').appendChild(str);
// });
// function submitClickFn(){
//     for(let i=0;i<listnameClass.length;i++){
//         if(listnameClass.value!=""){
//             arr.push(listnameClass[i].value);
//         }
//     }
//     listname.value = arr;
    
//     console.log(listname.value);
// }
</script>
</body>
</html>