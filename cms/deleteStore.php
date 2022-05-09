<?php
require_once('../config/conn.php');

if(isset($_POST['id'])){
    try{
        $id = $_POST['id'];
        $sql_str = "DELETE FROM store WHERE id = :id";
        $stmt = $conn -> prepare($sql_str);
        $stmt -> bindParam(':id', $id);
        $stmt -> execute();

         
    }catch (PDOException $e ){
        die("ERROR!!!: ". $e->getMessage());
      }
}

?>