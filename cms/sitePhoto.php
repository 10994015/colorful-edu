<?php 
require_once('../config/conn.php');

if(isset($_GET['site']) && $_GET['site']!=""){
    $site = $_GET['site'];
    $sql_str = "SELECT * FROM sites WHERE name=:site";
    $RS = $conn -> prepare($sql_str);
    $RS -> bindParam(':site', $site);
    
    $RS -> execute();
    $total = $RS -> rowCount();
    if( $total >= 1 ){
        $row_RS = $RS -> fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex">
    <title>Document</title>
    <link rel="stylesheet" href="../css/cms.css">
</head>
<body>
    <?php include_once('./header.php'); ?>
    <div id="sitePhoto">
        <h2>照片牆</h2>
        <div class="photoList">
            <?php foreach($row_RS as $item) {?>
            <img src="../images/site/<?php echo $item['name']."/".$item['files_name']; ?>" alt="點擊刪除" onclick="deleteSitefn(<?php echo $item['id'];?>)">
            <?php } ?>
        </div>
    </div>

    <script>
    function deleteSitefn(id){
        let chk = confirm('確定要刪除嗎?');
        if(chk){
            window.location.href = `./deleteSitePhoto.php?id=${id}&name=<?php echo $_GET['site'];?>`;
            return;
        }
    }
    </script>
</body>
</html>