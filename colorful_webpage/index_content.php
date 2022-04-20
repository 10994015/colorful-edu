<?php
try{
    $sql_str = "SELECT * FROM banner ORDER BY id DESC";
    $RS_banner = $conn -> query($sql_str);
    $total_RS_banner = $RS_banner -> rowCount();
}catch(PDOException $e){
    die('Error!:'.$e->getMessage());
}
?>

<link rel="stylesheet" type="text/css" href="./shared/slick-1.6.0/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="./shared/slick-1.6.0/slick/slick-theme.css"/>
<link rel="stylesheet" href="./css/index_content.css">

<div id="index_content">
    <div class="responsive">
        <?php foreach($RS_banner as $item){?>
            <div><img src="<?php echo $item['files_name'];?>"></div>
        <?php } ?>
        <!-- <div><img src="./images/banner.png"></div>
        <div><img src="./images/banner2.png"></div>
        <div><img src="./images/banner3.png"></div>
        <div><img src="./images/banner4.png"></div> -->
    </div>
    <div id="course">
        <h1>幫助您進行課程規劃</h1>
        <div class="content">
            <a href="javascript:;">
                <h2>STEAM SCHOOL</h2>
                <img src="./images/003.png" class="courseImg">
            </a>
            <a href="javascript:;">
                <h2>機器人STEAM教室</h2>
                <img src="./images/001.png" class="courseImg">
            </a>
            <a href="javascript:;">
                <h2>夏令營新生家長說明會</h2>
                <img src="./images/002.png" class="courseImg">
            </a>
        </div>
    </div>
    <div id="nurture">
        <h1>人才培育</h1>
        <div class="content">
            <div class="step">
                <div class="stepItem">
                    <div>
                        <i class="fas fa-user-graduate"></i>
                        <p>大學以上學歷</p>
                    </div>
                    <i class="fas fa-long-arrow-alt-right" v-show="item.rightopen"></i>
                </div>
                <div class="stepItem">
                    <div>
                        <i class="fas fa-glasses"></i>
                        <p>參加培訓課程</p>
                    </div>
                    <i class="fas fa-long-arrow-alt-right" v-show="item.rightopen"></i>
                </div>
                <div class="stepItem">
                    <div>
                        <i class="far fa-building"></i>
                        <p>參加見習活動</p>
                    </div>
                    <i class="fas fa-long-arrow-alt-right" v-show="item.rightopen"></i>
                </div>
                <div class="stepItem">
                    <div>
                        <i class="fas fa-stamp"></i>
                        <p>取得證明</p>
                    </div>
                    <i class="fas fa-long-arrow-alt-right" v-show="item.rightopen"></i>
                </div>
                <div class="stepItem">
                    <div>
                        <i class="fas fa-chalkboard-teacher"></i>
                        <p>成為專業教師</p>
                    </div>
                </div>
            </div>
            
            <div class="contentText">
                <div>
                    <h2>Tesol</h2>
                    <p>不止是英語的實力，更強調的是「教學」。
                    專業學術訓練範圍包括：語言學、語言教學法、方法學、外語教學理論與方法、教材設計、課程設計、課程管理、跨國文化的溝通與認識以及各種測驗評量、研究及教學實習。
                    </p>
                </div>
                <div>
                    <h2>Steam</h2>
                    <p>STEAM是指跨域整合科學、科技、工程、藝術與數學。課程結束，必須參與教學演示檢定及通過檢核。為維持師資水準，定期參與師培與回訓機制，培訓新科技素材與技術，開發新課程與相關評量機制，並期望帶給學生們更高品質跨域教育。</p>
                </div>
            </div>
        </div>
    </div>
    <div id="site">
        <h1>場地租借</h1>
        <div class="content">
            <div class="siteItem">
                <div class="imgBox"><img src="./images/a.jpg" alt=""></div>
                <h2>冰芬美語</h2>
            </div>
            
        </div>
        <a href="?page=site" class="seemore">SEE MORE</a>
    </div>
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
<script src="./js/index_content.js"></script>
