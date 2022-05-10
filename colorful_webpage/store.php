<?php 
$sql_str_store = "SELECT * FROM store";
$RS_store = $conn -> query($sql_str_store);
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>企業特約</title>
    <link rel="stylesheet" href="./css/store.css">
</head>
<body>
    <div id="store">
        <h1>企業特約</h1>
        <div class="content">
            <?php foreach($RS_store as $item){ ?>
            <div class="imgbox"><img src="./images/store/<?php echo $item['files_name']; ?>" alt="新竹市美語補習班"></div>
            <?php } ?>
        </div>
    </div>
</body>
</html>