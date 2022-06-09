<?php
require_once('../config/conn.php');

if(isset($_POST['sort'])){
    try{
        $sql_str = "UPDATE banner SET sortnum = :sort,url = :url WHERE id  = :id";
        //執行$conn物件中的prepare()預處理器
        $stmt = $conn->prepare($sql_str);
     
        //接收表單輸入的資料
        $sort    = $_POST['sort'];
        $url    = $_POST['url'];
        $id      = $_POST['id'];
        $stmt->bindParam(':sort' ,$sort);
        $stmt->bindParam(':url' ,$url);
        $stmt->bindParam(':id' ,$id);
        $stmt->execute();
        ?>
        <script>
        alertFn();
        function alertFn(){
            alert('編輯成功!');
            window.location.href = "./index_banner.php";
        }
        </script>
        <?php
    }catch (PDOException $e ){
        die("ERROR!!!: ". $e->getMessage());
      }
}