<?php 
if(isset($_GET['site']) && $_GET['site']!=""){
    try{
        $sql_str = "SELECT * FROM sites WHERE name=:site";
        $RS = $conn -> prepare($sql_str);
       
        $site = $_GET['site'];  
        $RS -> bindParam(':site', $site);
        $RS -> execute();
        $total = $RS -> rowCount();
        if( $total >= 1 ){
          $row_RS = $RS -> fetchAll(PDO::FETCH_ASSOC);
        }
    }catch ( PDOException $e ){
        die("ERROR!!!: ". $e->getMessage());
      }
}
?>
<link rel="stylesheet" href="./css/photobox.css">

<div id="photobox">
    <div class="box">
        <h2>照片牆</h2>
        <div class="imgbox">
            <?php foreach($row_RS as $item){?>
                <img src="./images/site/<?php echo $item['name']?>/<?php echo $item['files_name']?>" class='imgList'>
            <?php } ?>
        </div>
    </div>
    <div class="lightBox" id="lightBox">
        <div class="back" id="back"></div>
        <div class="lightBoxImgbox">
            <img src="./images/a.jpg" alt="" id="imgsrc">
            <i class="fa fa-times" id="imgClose"></i>
        </div>
    </div>
</div>

<script src="./js/photobox.js"></script>