<?php 
try{
    $sql_str = "SELECT * FROM news ORDER BY id ASC";
    $RS_news = $conn -> query($sql_str);
    $total_RS_news = $RS_news -> rowCount();
    
}
catch(PDOException $e){
    die('Error!:'.$e->getMessage());
  }
?>

<link rel="stylesheet" href="./css/latestnews.css">
<div id="latestnews">
      <div class="search">
          <input type="text" placeholder="搜尋文章..." id="searchBox">
          <button id="searchBtn"><i class="fas fa-search"></i></button>
      </div>
      <div class="post">
          <?php foreach($RS_news as $item){ ?>
          <div class="post-item <?php if($item['isShow']==1){echo "isShow";}?>">
              <img src="<?php echo $item['imgsrc']; ?>" alt="">
              <div class="content">
                  <h2 class="title"><?php echo $item['title'];?></h2>
                  <p><?php echo nl2br($item['content']); ?> </p>
                  <a href="?page=post&id=<?php echo $item['id']; ?>" class="continue"><span>CONTINUE READING</span> <i class="fas fa-arrow-right"></i></a>
              </div>
          </div>
          <?php } ?>
      </div>
</div>

<script src='./js/latestnews.js'></script>