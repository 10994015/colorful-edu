<header id="header">
    <div id="menu"><i class="fas fa-times" id="menuIcon"></i></div>
    <img src="../images/logo.png" class="logo">
    <h2>冰芬文教後台管理系統</h2>
    <div class="link">
        <a href="./news.php">最新消息</a>
        <a href="./logout.php">登出</a>
    </div>
</header>

<script>
const menu = document.getElementById('menu');
const header = document.getElementById('header');
const menuIcon = document.getElementById('menuIcon');
menu.addEventListener('click',()=>{
    header.classList.toggle('close');
    console.log(header.classList[0]);
    
    if(header.classList[0]==='close'){
        menuIcon.className = 'fas fa-bars';
    }else{
        menuIcon.className = 'fas fa-times';
    }
})
</script>