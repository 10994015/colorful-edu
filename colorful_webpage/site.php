<?php 
try{
  $sql_str = "SELECT * FROM sitename";
  $RS_site = $conn -> query($sql_str);
  $total_RS_site = $RS_site -> rowCount();
}catch ( PDOException $e ){
  die("ERROR!!!: ". $e->getMessage());
}
?>


<div id="site">
    <div class="banner">
        <img src="./images/site.jpg" alt="">
        <h2>想上課卻沒有場地嗎?</h2>
        <p>我們與眾多文教機構合作，並提供場地的租借使用，歡迎各大文教機構使用</p>
    </div>
    <?php foreach($RS_site as $item){ ?>
      <div class="sitebox">
        <div class="left">
              <h2><?php echo $item['name']; ?></h2>
              <p>地址 : <?php echo $item['address']; ?><br />
              <?php echo $item['day']; ?><br />
              預約電話 : <?php echo $item['phone']; ?><br />
                Email : <?php echo $item['email']; ?> </p>
                <button id="leaseBtn" value="<?php echo $item['name']; ?>">我要租借</button>
          </div>
      
        <div class="right">
          <div class="imgbox">
            <?php 
            $sql_str = "SELECT * FROM sites WHERE name=:englishname";
            $RS = $conn -> prepare($sql_str);

            $englishname = $item['englishname'];  

            $RS -> bindParam(':englishname', $englishname);
            $RS -> execute();
            $total = $RS -> rowCount();
            if( $total >= 1 ){
              $row_RS = $RS -> fetchAll(PDO::FETCH_ASSOC);
            }
            foreach($row_RS as $i){
            ?>
                <img src="./images/site/<?php echo $i['name'];?>/<?php echo $i['files_name']; ?>" class='imgList imgopenclick' alt="<?php echo $item['name']; ?>">
            <?php } ?>
          </div>
            <i class="fa-solid fa-circle-chevron-left leftbtn" class="leftbtn"></i>
            <i class="fa-solid fa-circle-chevron-right rightbtn" class="rightbtn"></i>
          <a href="./?page=photobox&site=<?php echo $item['englishname'];?>" class="seemore">查看更多</a>
        </div>
      </div>
    <?php } ?>
  <div class="leaseModule" id="leaseModule">
      <div class="contentModule">
          <div class="header">我要租借 <i class="fas fa-times" id="leaseClose"></i></div>
          <form class="content" action="./ref/lendSend.php" method="POST">
              <div><p>租借場地: <span>(必填)</span> </p><input id="leaseSite" name="leaseSite" value="冰芬美語" disabled></div>
              <div><p>您的大名:<span>(必填)</span></p><input id="leaseName" name="leaseName" placeholder="ex:王冰芬" required></div>
              <div><p>聯絡電話:<span>(必填)</span></p><input id="leasePhone" name="leasePhone" required></div>
              <div><p>電子信箱:<span>(必填)</span></p><input type="email" id="leaseEmail" name="leaseEmail" required></div>
              <div><p>租借時間:<span>(必填)</span></p><input type="date" id="leaseTimeStart" name="leaseTimeStart" required></div>
              <div><p>至</p><input type="date" id="leaseTimeEnd" name="leaseTimeEnd" required></div>
              <div><p>租借用途:</p><textarea placeholder="請簡短說明..." name="leaseUse" id="leaseUse" value=""></textarea></div>
              <div><input type="submit" id="submit" name="submit" value="租借"></div>
          </form>
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


<script src="./js/site.js"></script>