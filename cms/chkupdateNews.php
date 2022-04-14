<?php
require_once('../config/conn.php');

if(isset($_POST['id'])){
    try{
        $sql_str = "UPDATE news SET title = :title,content=:content,imgsrc=:imgsrc,isShow=:isShow,smallimg=:smallimg WHERE id  = :id";
        //執行$conn物件中的prepare()預處理器
        $stmt = $conn->prepare($sql_str);
     
        //接收表單輸入的資料
        $title    = $_POST['title'];
        $content      = $_POST['content'];
        $id      = $_POST['id'];
        $imgsrc      = $_POST['imgsrc'];
        if( $_POST['isShow'] == ""){
            $isShow = 0;
        }else{
            $isShow = $_POST['isShow'];
        }
        $smallimg = $_POST['smallimg'];
     
        //設定準備好的$stmt物件中對應的參數值
        $stmt->bindParam(':title' ,$title);
        $stmt->bindParam(':content' ,$content);
        $stmt->bindParam(':id' ,$id);
        $stmt->bindParam(':imgsrc' ,$imgsrc);
        $stmt->bindParam(':isShow' ,$isShow);
        $stmt->bindParam(':smallimg' ,$smallimg);
     
        //執行準備好的$stmt物件工作
        $stmt->execute();
        // $_SESSION['money'] = $money;
        // header('Location:./news.php');
        ?>
        <script>
        alertFn();
        function alertFn(){
            alert('編輯成功!');
            window.location.href = "./news.php";
        }
        </script>
        <?php
    }catch (PDOException $e ){
        die("ERROR!!!: ". $e->getMessage());
      }
}