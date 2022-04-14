<?php
if(isset($_GET['msg'])&& $_GET['msg'] == '1'){
    echo "<script>alert('登入失敗!請重新登入!') </script>";
}
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登入</title>
    <link rel="stylesheet" href="../css/cms.css">
</head>
<body>
   <div id="login">
   <h1>LOGIN</h1>
    <form action="./memberchk.php" method="POST">
        <p>登入您的冰芬後台帳號</p>
        <input type="text" name="username" class="mem_mail" placeholder="請輸入帳號...." required/>
        <input type="password" name="password" class="mem_pwd" placeholder="請輸入密碼...." required/>
        <input type="hidden" name="member" value="member">
        <input type="submit" class="submit-btn" value="登入" />
    </form>
   </div>
</body>
</html>