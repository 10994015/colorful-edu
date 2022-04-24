<?php
require_once('../config/conn.php');
try{
    $sql_str = "SELECT * FROM sitename";
    $RS_site = $conn -> query($sql_str);
    $RS_site2 = $conn -> query($sql_str);
    $total_RS_site = $RS_site -> rowCount();
}catch(PDOException $e){
    die('Error!:'.$e->getMessage());
}
//1.判斷接收到上傳檔案 => 通過 $_FILES 檔案上傳變數接收上傳檔案信息 ======================
if (isset($_FILES['upload_file'])) {
    $files = $_FILES['upload_file'];
    $siteName = $_POST['siteName'];
      //   print_r($files); //這是一個二維陣列, 第一層是檔案的5個資料, 第二層分別紀錄著多個檔案
      //   echo '<hr><br><br><br>';
  
      //   $new_array = array();  //建立新陣列, 將收到檔案的陣列轉換後存放在新陣列
      
          //依收到檔案的陣列依第一層繞迴圈, 因為是5個資訊所以會繞5圈
      foreach( $files as $file ){
          $i = 0;  //新陣列的索引編號
          // print_r($file);
          // echo '<hr>';
          
          //依收到的檔案數繞迴圈, 也就是有3個檔案就繞3圈
          foreach( $file as $key => $val ){
              $new_array[$i]['name']     = $files['name'][$key];
              $new_array[$i]['type']     = $files['type'][$key];
              $new_array[$i]['tmp_name'] = $files['tmp_name'][$key];
              $new_array[$i]['error']    = $files['error'][$key];
              $new_array[$i]['size']     = $files['size'][$key];
              $i++;
              } //foreach 第2層 end
          } //foreach 第1層 end
        //   print_r( $new_array );
        //   echo '<hr><br><br><br>';
          //檔案限制條件
      $max_size  = 4096*4096;                     //設定允許上傳檔案容量的最大值(1M)
      $allow_ext = array('jpeg', 'jpg', 'png');   //設定允許上傳檔案的類型
      $path      = '../images/site/'.$siteName.'/';
      if (!file_exists($path)) { mkdir($path); }
      include('./fn_upload_chk.php');
      include('./fn_thumbnail.php');
      $msg_result = '';  //負責接收所有檔案檢測後的回傳訊息
      
      //依新陣列的檔案資訊逐項進行限制檢查
      foreach( $new_array as $key => $file ){
      $randNum = rand(1000,10000000);
      $file_name = $randNum.$file['name'];
      $msg = upload_chk( $file,$path, $max_size, $allow_ext,  $file_name );
      if($msg==1){ 
          $msg = '檔案傳送成功！';
          $sql_str = "INSERT INTO sites (name,files_name) VALUES (:siteName,:imgname)";
          $stmt = $conn -> prepare($sql_str);
          $stmt -> bindParam(':imgname' ,$file_name);
          $stmt -> bindParam(':siteName' ,$siteName);
          $stmt ->execute();
       }
      $msg_result .= '第' . ($key+1) . '個上傳檔案的結果：' . $msg . '<br/>';
      $src_name = $path.$file['name'];
      if( file_exists($src_name) ){
          $extname  = pathinfo($src_name, PATHINFO_EXTENSION);  //副檔名部份
          $basename = basename($src_name, '.'.$extname);        //主檔名部份
          // $dst_name = $basename.'_s.'.$extname;                  //準備小圖檔名
          // $dst_w = 200;
          // $dst_h = 200;
          // thumbnail( $src_name, $path, $dst_name, $dst_w, $dst_h, $del_source=false );
      }
      }
      
    //   echo $msg_result;
      echo "<script>alert('上傳成功!');window.location.href = 'site.php?upload=ok' </script>";
      }

?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>場地租借</title>
    <link rel="stylesheet" href="../css/cms.css">
</head>
<body>
<?php include_once('./header.php'); ?>
    <div id="site">
        <form name="uploadForm" enctype="multipart/form-data" method="POST" action="">
            <p> (上傳的檔案名稱請符合英數字及減號或底線，檔案類型必須是jpg、png、gif，檔案容量必須小於1M) </p>
            <input type="file" name="upload_file[]" multiple>
            <select name="siteName" id="">
            <?php foreach($RS_site as $item){ ?>
                <option value="<?php echo $item['englishname']; ?>"><?php echo $item['name']; ?></option>
            <?php } ?>
            </select>
            <a href="./createStie.php">新增場地</a>
            <input type="submit" value="確定上傳">
        </form>
        <h2>查看相片</h2>
        <div class="siteList">
            <?php foreach($RS_site2 as $item){ ?>
            <a href="./sitePhoto.php?site=<?php echo $item['englishname']; ?>"><?php echo $item['name']; ?></a>
            <?php } ?>
        </div>
    </div>
</body>
</html>