<?php
require_once('../config/conn.php');

if(isset($_POST['id'])){
    try{
        $sql_str = "UPDATE news SET title = :title,content=:content,imgsrc=:imgsrc WHERE id  = :id";
        //執行$conn物件中的prepare()預處理器
        $stmt = $conn->prepare($sql_str);
     
        //接收表單輸入的資料
        $title    = $_POST['title'];
        $content      = $_POST['content'];
        $id      = $_POST['id'];
        $imgsrc      = $_POST['imgsrc'];
     
        //設定準備好的$stmt物件中對應的參數值
        $stmt->bindParam(':title' ,$title);
        $stmt->bindParam(':content' ,$content);
        $stmt->bindParam(':id' ,$id);
        $stmt->bindParam(':imgsrc' ,$imgsrc);
     
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