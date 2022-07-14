<?php 
require_once('../config/conn.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql_str = "DELETE FROM card WHERE id = :id";
    $stmt = $conn -> prepare($sql_str);
    $stmt -> bindParam(':id', $id);
    $stmt -> execute();
    ?>
    <script>
        alertFn();
        function alertFn(){
            alert('刪除成功!'); window.location.href='./card.php';
        }
    </script>
    <?php
}

?>