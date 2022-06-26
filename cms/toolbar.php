<div id="toolbar">
    <a href="../"><i class="fa-solid fa-angles-left"></i>&nbsp;前往冰芬文教前台</a>
    <div class="toolbarTitle" id="toolbarTitle">新增公告</div>
    <div class="toolbarAdmin"> 
        <img src="../images/avatar.png"><?php echo $_SESSION['name']; ?>
    </div>
</div>

<script>
const toolbarTitle = document.getElementById('toolbarTitle');
const page_title =  document.querySelector('title');
toolbarTitle.innerHTML = page_title.innerHTML;
</script>