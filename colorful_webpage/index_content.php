<?php
try{
    $sql_str = "SELECT * FROM banner ORDER BY sortnum ASC";
    $RS_banner = $conn -> query($sql_str);
    $total_RS_banner = $RS_banner -> rowCount();

    $sql_str_store = "SELECT * FROM store";
    $RS_store = $conn -> query($sql_str_store);

    $sql_str_news = "SELECT * FROM news  WHERE focus=1 ORDER BY id DESC";
    $RS_news = $conn -> query($sql_str_news);
    $total_RS_news = $RS_news -> rowCount();

}catch(PDOException $e){
    die('Error!:'.$e->getMessage());
}
?>

<link rel="stylesheet" type="text/css" href="./shared/slick-1.6.0/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="./shared/slick-1.6.0/slick/slick-theme.css"/>

<div id="index_content">
    <div class="responsive">
        <?php foreach($RS_banner as $item){?>
            <div><a href="<?php echo $item['url']; ?>"><img src="<?php echo $item['files_name'];?>" alt="新竹市私立冰芬美語文理短期補習班"></a></div>
        <?php } ?>
    </div>
    <?php if($total_RS_news >0){ ?>
    <div id="course">
        <h1>最新熱門課程</h1>
        <div class="content">
            <?php foreach($RS_news as $item){ ?>
            <a href="./?page=post&id=<?php echo $item['id']; ?>">
                <h2><?php echo $item['title']; ?></h2>
                <!-- <h2>【凡出示加入官方Line@證明，報名課程享免費多送一堂課！】</h2> -->
                <img src="./images/img_upload2/<?php echo $item['imgsrc']; ?>" class="courseImg" alt="新竹市私立冰芬美語文理短期補習班">
            </a>
            <?php } ?>
        </div>
    </div>
    <?php }?>
    <div id="nurture">
        <h1>師資培育</h1>
        <div class="content">
            <div class="step">
                <div class="stepItem">
                    <div>
                        <img src="./images/1.png" alt="新竹市補習班"">
                        <p>符合學歷資格</p>
                    </div>
                    <i class="fas fa-long-arrow-alt-right" v-show="item.rightopen"></i>
                </div>
                <div class="stepItem">
                    <div>
                        <img src="./images/2.png" alt="新竹市補習班"">
                        <p>參加培訓課程</p>
                    </div>
                    <i class="fas fa-long-arrow-alt-right" v-show="item.rightopen"></i>
                </div>
                <div class="stepItem">
                    <div>
                        <img src="./images/3.png" alt="新竹市補習班"">
                        <p>參加見習活動</p>
                    </div>
                    <i class="fas fa-long-arrow-alt-right" v-show="item.rightopen"></i>
                </div>
                <div class="stepItem">
                    <div>
                        <img src="./images/4.png" alt="新竹市補習班"">
                        <p>取得證明</p>
                    </div>
                    <i class="fas fa-long-arrow-alt-right" v-show="item.rightopen"></i>
                </div>
                <div class="stepItem">
                    <div>
                        <img src="./images/5.png" alt="新竹市補習班"">
                        <p>成為專業人員</p>
                    </div>
                </div>
            </div>
            <!-- <div class="contentText">
                <div>
                    <h3>Tesol</h3>
                    <p>Teaching English to Speakers of Other Languages。是⼀⾨教授英語給母語非英語人士的課程，課程的重點會圍繞在學習者的文化與背景上，使用量身訂製的授課方法和理論提升學習英文的效果以及老師本身的師資水準。
                    </p>
                </div>
                <div>
                    <h3>Steam</h3>
                    <p>STEAM是指跨域整合科學、科技、工程、藝術與數學。課程結束，必須參與教學演示檢定及通過檢核。為維持師資水準，定期參與師培與回訓機制，培訓新科技素材與技術，開發新課程與相關評量機制，並期望帶給學生們更高品質跨域教育。</p>
                </div>
            </div> -->
        </div>
    </div>
    <div class="cardbox">
        <div class="card">
            <i class="fas fa-paint-brush"></i>
            <h2>TESOL課程</h2>
            <p>不止是英語的實力，更強調的是「教學」。專業學術訓練範圍包括：語言學、語言教學法、方法學、外語教學理論與方法、教材設計、課程設計、課程管理、跨國文化的溝通與認識以及各種測驗評量、研究及教學實習。</p>
        </div>
        <div class="card">
            <i class="fas fa-vote-yea"></i>
            <h2>STEAM教育</h2>
            <p>STEAM是指跨域整合科學、科技、工程、藝術與數學。課程結束，必須參與教學演示檢定及通過檢核。為維持師資水準，定期參與師培與回訓機制，培訓新科技素材與技術，開發新課程與相關評量機制，並期望帶給學生們更高品質跨域教育。</p>
        </div>
        <div class="card">
            <i class="fas fa-handshake"></i>
            <h2>參加對象</h2>
            <p>1. 職前教師<br />2. 在職教師<br />3. 想增進教學技能的各方人才</p>
        </div>
    </div>
    <!-- <div id="teach">
        <h1>成為專業教師後你將能夠</h1>
        <div class="content">
            <div class="item">
                <h3>教授Tesol課程</h3>
                <p>Teaching English to Speakers of Other Languages。是⼀⾨教授英語給母語非英語人士的課程，課程的重點會圍繞在學習者的文化與背景上，使用量身訂製的授課方法和理論提升學習英文的效果以及老師本身的師資水準。</p>
            </div>
            <div class="item">
                <h3>獲取Tesol證照</h3>
                <div class="box">
                    <img src="./images/t.png" alt="新竹市補習班">
                    <div class="text">
                        <h4>證照的使用定義</h4>
                        <p>是能夠「教授非英文母語者」的師資證照，且無論是在英語還是非英語系國家都通用</p>
                    </div>
                </div>
                <div class="box">
                    <img src="./images/u.png" alt="新竹市補習班">
                    <div class="text">
                        <h4>如何考取證照</h4>
                        <p>是能夠「教授非英文母語者」的師資證照，且無論是在英語還是非英語系國家都通用</p>
                    </div>
                </div>
                <div class="box">
                    <img src="./images/y.png" alt="新竹市補習班">
                    <div class="text">
                        <h4>補充說明</h4>
                        <p>是能夠「教授非英文母語者」的師資證照，且無論是在英語還是非英語系國家都通用</p>
                    </div>
                </div>
            </div>
        </div>
        <a href="./?page=contact" class="signup">立即報名</a>
    </div> -->
    <div id="store">
        <h1>企業特約</h1>
        <div class="content">
            <?php foreach($RS_store as $item){ ?>
            <div class="imgbox"><img src="./images/store/<?php echo $item['files_name']; ?>" alt="新竹市美語補習班"></div>
            <?php } ?>
        </div>
    </div>
    <div class="partners">
        <h1>企業合作</h1>
        <div class="responsive2">
            <div><a href="https://www.edu-aequitas.com/"><img src="./images/chin.png" alt="EA清華"></a></div>
            <div><a href="https://www.evoneic.com/"><img src="./images/evone.png" alt="憶旺智慧股份有限公司"></a></div>
            <div><a href="https://www.esoleducation.com/"><img src="./images/esol.png" alt="伊索教育"></a></div>
        </div>
    </div>
   
    <!-- <div id="site">
        <h1>場地租借</h1>
        <div class="content">
            <div class="siteItem">
                <div class="imgBox"><img src="./images/a.jpg" alt=""></div>
                <h2>冰芬美語</h2>
            </div>
            
        </div>
        <a href="?page=site" class="seemore">SEE MORE</a>
    </div> -->
    <div id="courseImgModule">
        <div class="back" id="moduleBack"></div>
        <div class="moduleBox">
            <i class="fas fa-times" id="moduleClose"></i>
            <img src="./images/a.jpg" id="moduleImg">
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="./shared/slick-1.6.0/slick/slick.min.js"></script>
<script src="./js/slick.js"></script>
<script src="./js/scroll.js"></script>
<!-- <script src="./js/index_content.js"></script> -->
