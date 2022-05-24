<?php
require_once('../config/conn.php');
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
    <div id="create_course">
        <form action="createCouresChk.php" method="post" enctype="multipart/form-data">
            <p>課程類別:</p>
            <select name="coursetype" id="coursetype">
                <?php foreach($RS_course_type as $item){ ?>
                <option value="<?php echo $item['type']; ?>"><?php echo $item['type']; ?></option>
                <?php } ?>
            </select>
            <a href="./createCourseType.php" class="createTypeBtn">新增課程類別</a>
            <input type="text" name="name" placeholder="課程名稱">
            <span>新增圖片</span> 
            <input type="file" name="files_name">
            <div id="listnameBox">
                <input type="text"  class="listnameClass" placeholder="課程列表...">
            </div>
            <a href="javascript:;" id="addBtn">+</a>
            <input type="hidden" name="listname" id="listname">
            <input type="submit" value="送出" id="submit">
        </form>
    </div>


<script>
const listnameBox = document.getElementById('listnameBox');
const listname = document.getElementById('listname');
const addBtn = document.getElementById('addBtn');
const submit = document.getElementById('submit');
const listnameClass = document.getElementsByClassName('listnameClass');
let arr = [];
submit.addEventListener('click',submitClickFn);
addBtn.addEventListener('click',()=>{
    var str = document.createElement('input');
    // str.innerHTML = `<input type="text" class="name" placeholder="企業名稱...">`;
    str.setAttribute('class','listnameClass');
    str.setAttribute('type','text');
    str.setAttribute('placeholder','課程列表...');
    document.querySelector('#listnameBox').appendChild(str);
});
function submitClickFn(){
    for(let i=0;i<listnameClass.length;i++){
        if(listnameClass.value!=""){
            arr.push(listnameClass[i].value);
        }
    }
    listname.value = arr;
    
    console.log(listname.value);
}
</script>
</body>
</html>