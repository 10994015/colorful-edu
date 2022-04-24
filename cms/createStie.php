<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新增租借場地</title>
    <link rel="stylesheet" href="../css/cms.css">
</head>
<body>
    <?php include_once('./header.php'); ?>
    <div id="createSite">
        <form action="./createSiteChk.php" method="post">
            <h2>新增場地</h2>
            <input type="text" placeholder="場地名稱" name="name">
            <input type="text" placeholder="英文名稱" name="englishname">
            <input type="text" placeholder="地址" name="address">
            <input type="text" placeholder="參觀日說明" name="day">
            <input type="text" placeholder="連絡電話" name="phone">
            <input type="text" placeholder="E-mail" name="email">
            <input type="submit" value="新增">
        </form>
    </div>
</body>
</html>