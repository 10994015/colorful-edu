<?php
require_once('../config/conn.php');
session_start();
try{
    $sql_str = "SELECT * FROM banner ORDER BY sortnum ASC";
    $RS_banner = $conn -> query($sql_str);
    $total_RS_banner = $RS_banner -> rowCount();
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
    <meta name="robots" content="noindex">
    <title>編輯首頁輪播圖</title>
    <link rel="stylesheet" href="../css/cms.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
</head>
<body>
<?php include_once('./header.php'); ?>
    <div id="index_banner">
        <a href="./create_index_banner.php">點擊新增輪播圖</a>
        <div class="imgBox">
            <?php foreach($RS_banner as $item){ ?>
                <div class="imgList">
                    <img src="<?php echo $item['files_name'];?>" alt="">
                    <p>
                        <span>排序:<?php echo $item['sortnum']; ?></span>
                        <input type="number" value="<?php echo $item['sortnum']; ?>" class="sortnumClassName">
                        <button class="sortbtn" value="<?php echo $item['id']; ?>">更新</button>
                        <!-- <a href="./updateSortBanner.php?id=<?php echo $item['id']; ?>" class="updateSort">編輯排序</a> -->
                    </p>
                   
                    <a href="javascript:;" onclick="deleteFn(<?php echo  $item['id']; ?>)">刪除</a>
                </div>
            <?php } ?>
           
        </div>
    </div>

<script>
    const sortbtn = document.getElementsByClassName('sortbtn');
    for(let i=0;i<sortbtn.length;i++){
        sortbtn[i].addEventListener('click',sortnumFn);
    }
    function deleteFn(id){
        let chk = confirm('確定要刪除嗎?');
        if(chk){
            window.location.href = `./deleteBanner.php?id=${id}`;
            return;
        }
    }
    function sortnumFn(e){
        console.log(e.target.value);
        console.log(e.target.parentNode.getElementsByClassName('sortnumClassName')[0].value);
        
        var params = new URLSearchParams()
        var sortnum = e.target.parentNode.getElementsByClassName('sortnumClassName')[0].value;
        params.append('sort',sortnum )
        params.append('id', e.target.value)
        axios.post('./updataSortChk.php',params).then(res=>{
            alert('更新成功!');
            window.location.reload();
        })
    }
</script>
</body>
</html>