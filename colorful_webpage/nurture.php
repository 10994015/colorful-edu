<?php
$sql_str_card = "SELECT * FROM card";
$RS_card = $conn -> query($sql_str_card);
$total_RS_card = $RS_card -> rowCount();

?>
<div id="nurture">
    <div class="bigtitle">
        <h4>冰芬幫助您成為專業教師</h4>
        <p>一身的才華，就差一點點的火候，讓冰芬文教助你一臂之力！我們提供加拿大專業TESOL課程、實作演練及考核測驗，並且實習一個月，最終取得專業證照，一整套的教學，讓你發揮自己的天賦，成為有影響力的專業講師，透過難得的機會，使更多有志於多元教育的人才能被看見。</p>
    </div>
    <div class="cardbox">
        <?php foreach($RS_card as $item){ ?>
            <div class="card">
            <i class="<?php echo $item['icon']?>"></i>
            <h2><?php echo $item['title']?></h2>
            <p><?php echo nl2br($item['content']); ?></p>
        </div>
        <?php } ?>
      
        
    </div>
    <div class="step">
        <div class="stepItem">
            <div>
                <img src="./images/1.png" alt="新竹市補習班"">
                <p>符合學歷資格</p>
            </div>
            <i class="fas fa-long-arrow-alt-right"></i>
        </div>
        <div class="stepItem">
            <div>
                <img src="./images/2.png" alt="新竹市補習班"">
                <p>參加培訓課程</p>
            </div>
            <i class="fas fa-long-arrow-alt-right"></i>
        </div>
        <div class="stepItem">
            <div>
                <img src="./images/3.png" alt="新竹市補習班"">
                <p>參加見習活動</p>
            </div>
            <i class="fas fa-long-arrow-alt-right"></i>
        </div>
        <div class="stepItem">
            <div>
                <img src="./images/4.png" alt="新竹市補習班"">
                <p>取得證明</p>
            </div>
            <i class="fas fa-long-arrow-alt-right"></i>
        </div>
        <div class="stepItem">
            <div>
                <img src="./images/5.png" alt="新竹市補習班"">
                <p>成為專業人員</p>
            </div>
           
        </div>
    </div>
    <div id="teach">
        <h1>成為專業教師後您將能夠</h1>
        <div class="content">
            
            <div class="item">
                <h3>獲取TESOL證照</h3>
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
                        <h4>考取證照之後</h4>
                        <p>可取得TESOL習證明或於國內外大學取得TESOL碩士學位</p>
                    </div>
                </div>
                <div class="box">
                    <img src="./images/y.png" alt="新竹市補習班">
                    <div class="text">
                        <h4>補充說明</h4>
                        <p>強調的是教學，而不只是英語本身。英語系國家如美國、英國、澳洲支機構在招募教師時，多採認TESOL證照。</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <h3>什麼是TESOL課程?</h3>
                <p>Teaching English to Speakers of Other Languages。是⼀⾨教授英語給母語非英語人士的課程，課程的重點會圍繞在學習者的文化與背景上，使用量身訂製的授課方法和理論提升學習英文的效果以及老師本身的師資水準。</p>
            </div>
        </div>
        <!-- <a href="./?page=contact" class="signup">立即報名</a> -->
    </div>
    <div class="interview">
        <img src="./images/interview.jpg" alt="新竹市補習班">
        <div class="inter">
            <h2>面對面研習評估</h2>
            <div class="item">
                <h3>50分鐘 校內上課計畫準備及演練</h3>
                <p>5分鐘 - 熱身</p>
                <p>15分鐘 - 課程內容介紹</p>
                <p>25分鐘 - 團隊合作/課程內容</p>
                <p>5分鐘 - 課程收尾</p>
            </div>
            <div class="item">
                <h3>90分鐘 校外展演</h3>
                <p>90分鐘課程演示</p>
                <p>討論/建議</p>
                <p>結業式</p>
            </div>
        </div>
    </div>
    <div class="interviewclass">
        <img src="./images/messagesss.jpeg" alt="新竹市補習班">
    </div>
    <!-- <div class="class">
        <h2>開課不受限，開始傳授您擅長的技術</h2>
        <div class="classBox">
            <div class="box">
                <img src="./images/like.png" alt="新竹市補習班">
                <h3>國中小數學</h3>
            </div>
            <div class="box">
                <img src="./images/like.png" alt="新竹市補習班">
                <h3>高中數學</h3>
            </div>
            <div class="box">
                <img src="./images/like.png" alt="新竹市補習班">
                <h3>國中小英文</h3>
            </div>
            <div class="box">
                <img src="./images/like.png" alt="新竹市補習班">
                <h3>高中英文</h3>
            </div>
            <div class="box">
                <img src="./images/like.png" alt="新竹市補習班">
                <h3>成人英文</h3>
            </div>
            <div class="box">
                <img src="./images/like.png" alt="新竹市補習班">
                <h3>國中小全科</h3>
            </div>
        </div>
    </div> -->
</div>