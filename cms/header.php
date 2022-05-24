<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<header id="header">
    <div id="menu"><i class="fas fa-times" id="menuIcon"></i></div>
    <img src="../images/logo.png" class="logo">
    <h2>冰芬文教後台管理系統</h2>
    <div class="link">
        <a href="./uploadImg.php">上傳圖片</a>
        <a href="./news.php">最新消息</a>
        <a href="./index_banner.php">上傳首頁輪播圖</a>
        <!-- <a href="./site.php">場地租借後台</a> -->
        <a href="./course.php">新增課程</a>
        <a href="./company.php">企業特約</a>
        <a href="./logout.php">登出</a>
    </div>
</header>

<script>
const menu = document.getElementById('menu');
const header = document.getElementById('header');
const menuIcon = document.getElementById('menuIcon');
menu.addEventListener('click',()=>{
    header.classList.toggle('close');
    
    if(header.classList[0]==='close'){
        menuIcon.className = 'fas fa-bars';
    }else{
        menuIcon.className = 'fas fa-times';
    }
});
</script>