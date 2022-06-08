<?php 
$sql_str_store = "SELECT * FROM store";
$RS_store = $conn -> query($sql_str_store);

$sql_str_text = "SELECT * FROM storetext";
$RS_store_text = $conn -> query($sql_str_text);
?>

<div id="store">
    <h1>企業特約</h1>
    <div class="content">
        <?php foreach($RS_store as $item){ ?>
        <div class="imgbox"><img src="./images/store/<?php echo $item['files_name']; ?>" alt="新竹市美語補習班"></div>
        <?php } ?>
    </div>
    <div class="searchDiv">
        <input type="text" placeholder="搜尋..." id="searchBox">
        <button id="searchBtn">搜尋</button>
        <button id="allBtn">全部</button>
    </div>
    <div class="textBox">
        <div class="textHeader">
            企業名稱
        </div>
        <?php foreach($RS_store_text as $item){ ?>
            <div class="textList"><?php echo  $item['name']; ?></div>
        <?php } ?>
    </div>
</div>

<script src="./js/store.js"></script>
