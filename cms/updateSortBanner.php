<?php
require_once('../config/conn.php');
session_start();
if(isset($_GET['id'])){
    try{
        $id = $_GET['id'];
        $sql_str = "SELECT * FROM banner WHERE id = :id";
        $stmt = $conn -> prepare($sql_str);
        $stmt -> bindParam(':id', $id);
        $stmt -> execute();
        $row_sort = $stmt->fetch(PDO::FETCH_ASSOC);
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
    <title>編輯排序</title>
    <link rel="stylesheet" href="../css/cms.css">
</head>
<body>
    <?php include_once('./header.php'); ?>
    <?php include_once('./toolbar.php'); ?>
        <div id="updateSortBanner">
            <form action="./updataSortChk.php" method="post">
                <input type="text" value="<?php echo $row_sort['sortnum']; ?>" name="sort">
                <input type="hidden" value="<?php echo $row_sort['id'];  ?>" name="id">
                <input type="submit" value="更新">
            </form>
        </div>
</body>
</html>