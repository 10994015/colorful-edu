<?php
require_once('../config/conn.php');

if(isset($_GET['id']) && $_GET['id']!=""){
    try{
        $id = $_GET['id'];
        $sql_str = "DELETE FROM banner WHERE id = :id";
        $stmt = $conn -> prepare($sql_str);
        $stmt -> bindParam(':id', $id);
        $stmt -> execute();

        ?>
        <script>
            alertFn();
            function alertFn(){
                alert('刪除成功!'); window.location.href='./index_banner.php';
            }
        </script>
        <?php
    }catch (PDOException $e ){
        die("ERROR!!!: ". $e->getMessage());
      }

}