<?php
require_once('../config/conn.php');

if(isset($_POST['icon'])){
    try{
        $sql_str = "UPDATE card SET icon = :icon,title = :title,content=:content WHERE id  = :id";
        //執行$conn物件中的prepare()預處理器
        $stmt = $conn->prepare($sql_str);
     
        //接收表單輸入的資料
        $icon    = $_POST['icon'];
        $title    = $_POST['title'];
        $content      = $_POST['content'];
        $id      = $_POST['id'];
        $stmt->bindParam(':icon' ,$icon);
        $stmt->bindParam(':title' ,$title);
        $stmt->bindParam(':content' ,$content);
        $stmt->bindParam(':id' ,$id);
        $stmt->execute();
        ?>
        <script>
        alertFn();
        function alertFn(){
            alert('編輯成功!');
            window.location.href = "./card.php";
        }
        </script>
        <?php
    }catch (PDOException $e ){
        die("ERROR!!!: ". $e->getMessage());
      }
}