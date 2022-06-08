<?php if(isset($_GET['id']) && $_GET['id'] != ""){ 
    try{
        $sql_str = "SELECT * FROM news WHERE id = :id";
        $stmt = $conn -> prepare($sql_str);
        $id = $_GET['id'];
        $stmt -> bindParam(':id',$id);
        $stmt -> execute();
        $total = $stmt -> rowCount();
        echo $total;
        if($total>=1){
            $row_RS = $stmt -> fetch(PDO::FETCH_ASSOC);
        }
    }
    catch(PDOException $e){
        die('Error!:'.$e->getMessage());
      }    
?>

<?php if($total>=1){ ?>
    <div id="text">
      <h2><?php echo $row_RS['title'];?></h2>
      <img src="./images/img_upload2/<?php echo $row_RS['imgsrc'];?>" alt="">
      <p><?php echo nl2br($row_RS['content']);?></p>
      <div class="smallImgBox">
          <!-- <img class="smallImg" src="<?php echo $row_RS['imgsrc'];?>"> -->
          <?php echo $row_RS['smallimg'];?>
      </div>
      <!-- <div class="smallVideoBox">
          <video  width="320" height="240"  controls>
                <source  src="svideo.video" type="video/mp4" >
          </video>
      </div> -->

      <div class="moudel" id="moudel">
          <div class="back"></div>
          <div class="moudel-imgbox">
            <img src="" id="moudelImg">
            <i class="fa fa-times" id="closeMoudel"></i>
          </div>
      </div>
  </div>
<?php }else{ ?>
    <div id="error">
        <img src="./images/logo.pn" alt="">
        <h1>Sorry，找不到資料</h1>
        <a href="./">回首頁</a>
    </div>
<?php } ?>
<?php }else{ ?>
  <div id="error">
      <img src="./images/logo.pn" alt="">
      <h1>Sorry，找不到資料</h1>
      <a href="./">回首頁</a>
  </div>
<?php } ?>

<script src="./js/post.js"></script>