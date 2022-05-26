<?php 
$max_rows = 5;
$total_rows = 0;
$total_pages = 0;
$curr_page = 0;
if(isset($_GET['curr_page'])){
    $curr_page = $_GET['curr_page'];
}
$first_row = $curr_page * $max_rows;
$last_row = $first_row + $max_rows - 1;
try{
    $sql_str = "SELECT * FROM news WHERE isShow=1 ORDER BY id ASC";
    $RS_news_all = $conn -> query($sql_str);
    $total_rows = $RS_news_all -> rowCount();
    $total_pages = ceil($total_rows / $max_rows);

    $sql_str = "SELECT * FROM news WHERE isShow=1 ORDER BY id DESC LIMIT $first_row,$max_rows";
    $RS_news = $conn -> query($sql_str);
  
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
          <div class="post-item <?php if($item['isShow']==1){echo "isShow";}else{echo 'onShow';}?>">
              <img src="./images/img_upload2/<?php echo $item['imgsrc']; ?>" alt="">
              <div class="content">
                  <h2 class="title"><?php echo $item['title'];?></h2>
                  <p><?php echo nl2br($item['content']); ?> </p>
                  <a href="?page=post&id=<?php echo $item['id']; ?>" class="continue"><span>CONTINUE READING</span> <i class="fas fa-arrow-right"></i></a>
              </div>
          </div>
          <?php } ?>
      </div>
      <?php include_once('./shared/pager.php'); ?>
</div>

<script src='./js/latestnews.js'></script>