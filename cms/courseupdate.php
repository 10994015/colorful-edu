<?php 
require_once('../config/conn.php');
if(isset($_GET['id']) && $_GET['id']!=""){
    try{
        $id = $_GET['id'];
        $sql_str = "SELECT * FROM course WHERE id = :id";
        $stmt = $conn -> prepare($sql_str);
        $stmt -> bindParam(':id', $id);
        $stmt -> execute();
        $row_course = $stmt->fetch(PDO::FETCH_ASSOC);
        $rand = $row_course['rand'];


        $sql_str = "SELECT * FROM coursetype";
        $row_coursetype = $conn -> query($sql_str);

        $sql_str = "SELECT * FROM courselist WHERE coursename = :rand";
        $stmt = $conn -> prepare($sql_str);
        $stmt -> bindParam(':rand', $rand);
        $stmt -> execute();
        $row_courselist = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $listname = "";
        foreach($row_courselist as $item){
            $listname .= $item['listname'].",";
        }
        $listname = substr($listname, 0, -1);
        $listnameArr = explode(',',$listname);
    }catch(PDOException $e){
        die('Error!:'.$e->getMessage());
    }
}

?>

<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>冰芬文教管理後台</title>
    <link rel="stylesheet" href="../css/cms.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
</head>
<body>
    <?php include_once('./header.php'); ?>
    <div id="courseupdate">
        <form action="./courseupdateChk.php" method="post" enctype="multipart/form-data">
            <p>課程類別:</p>
            <select name="coursetype" id="coursetype">
                <?php foreach($row_coursetype as $item){ ?>
                    <option value="<?php echo $item['type']; ?>" <?php if($item['type']==$row_course['coursetype']){echo "selected";} ?> ><?php echo $item['type']; ?></option>
                <?php } ?>
            </select>
            <input type="text" name="name" placeholder="課程名稱" value="<?php echo $row_course['coursename']; ?>">
            <span onclick="showfilebtn()" id="changeimg">變更圖片</span>
            <input type="file" name="files_name" style="display:none" id="filebtn"> 
            <p>課程列表:</p>
            <?php foreach($row_courselist as $item){ ?>
                <p class="courselistBox"><small><?php echo $item['listname'];?></small><a href="javascript:;" onclick="deletelistnameFn(<?php echo $item['id'];?>)">刪除</a> </p>
            <?php } ?>
            <p style="margin-top:15px">新增課程列表:</p>
            <div id="listnameBox">
                <input type="text"  class="listnameClass" placeholder="課程列表..." value="">
            </div>
            <a href="javascript:;" id="addBtn">+</a>
            <textarea name="content" cols="30" rows="10"><?php echo $row_course['content']; ?></textarea>
            報名網址:<input type="text" name="url" placeholder="請輸入網址..." class="urlbox" value="<?php echo $row_course['url']; ?>">
            <label for="bigtype1">
                <input type="radio" name="bigtype" value="1" id="bigtype1" <?php if($row_course['bigtype']=="1"){ echo "checked"; } ?> >夏令營/冬令營
            </label>
            <label for="bigtype2">
                <input type="radio" name="bigtype" value="2" id="bigtype2" <?php if($row_course['bigtype']=="2"){ echo "checked"; } ?>>平日營/假日營
            </label>
            <label for="bigtype3">
                <input type="radio" name="bigtype" value="3" id="bigtype3" <?php if($row_course['bigtype']=="3"){ echo "checked"; } ?>>實體課/線上課
            </label>
            <input type="hidden" name="listname" id="listname">
            <input type="submit" value="送出" id="submit">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
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
function showfilebtn(){
    filebtn.style.display = "block";
}

function deletelistnameFn(id){
    let chk = confirm('確定要刪除嗎?確定的話會直接刪除!');
    if(chk){
        var params = new URLSearchParams()
        params.append('id', id)
        axios.post('./deletelistname.php',params).then(res=>{
            alert('刪除成功!');
            window.location.reload();
        })

        return;
    }
}
</script>
</body>
</html>