<?php
require_once('../config/conn.php');

$sql_str_text = "SELECT * FROM storetext";
$RS_store_text = $conn -> query($sql_str_text);

if(isset($_POST['name'])){
    $name = $_POST['name'];
    $name = explode(',',$name);  
    foreach($name as $item){
        $sql_str = "INSERT INTO storetext (name) VALUES (:item)";
        $stmt = $conn -> prepare($sql_str);
        $stmt -> bindParam(':item' ,$item);
        $stmt ->execute();
    }
   
}

?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>企業特約</title>
    <link rel="stylesheet" href="../css/cms.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
</head>
<body>
    <?php include_once('header.php'); ?>
    <div id="storeText">
        <h2>新增企業名稱</h2>
        <div id="textBox">
                <input type="text" class="name" placeholder="企業名稱..." >
        </div>
        <button id="addBtn">增加</button>
        <button id="btn">送出</button>


        <div class="storeList">
            <?php foreach($RS_store_text as $item){ ?>
               <div class="storeListItem">
                <p><?php echo $item['name']; ?></p> 
                <a href="./deleteStoreText.php?id=<?php echo $item['id']; ?>">刪除</a>
               </div>
            <?php } ?>
        </div>
    </div>
     

    <script>
        const name = document.getElementsByClassName('name');
        const btn = document.getElementById('btn');
        const addBtn = document.getElementById('addBtn');
        let nameArr = [];
        btn.addEventListener('click',()=>{
            for(let i=0;i<name.length;i++){
                nameArr.push(name[i].value);
            }
            console.log(nameArr);
            axionFn(nameArr);
        })

        function axionFn(nameArr){
            var params = new URLSearchParams()
            params.append('name',nameArr );
            axios.post('./storeText.php',params).then(res=>{
                alert('新增成功!');
                window.location.reload();
            })
        }

        addBtn.addEventListener('click',()=>{
            var str = document.createElement('input');
            // str.innerHTML = `<input type="text" class="name" placeholder="企業名稱...">`;
            str.setAttribute('class','name');
            str.setAttribute('type','text');
            str.setAttribute('placeholder','企業名稱...');
            document.querySelector('#textBox').appendChild(str);
        })
       
        
        
        
    
    </script>
</body>
</html>