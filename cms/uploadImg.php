<?php
require_once('../config/conn.php');
session_start();
try{
    $sql_str = "SELECT * FROM uploads";
    $RS_img = $conn -> query($sql_str);
    $total_RS_img = $RS_img -> rowCount();
}catch(PDOException $e){
    die('Error!:'.$e->getMessage());
}
if (isset($_FILES['upload_file'])) {
    $files = $_FILES['upload_file'];
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
      $path      = '../images/img_upload2/';
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
          $sql_str = "INSERT INTO uploads (files_name) VALUES (:imgname)";
          $stmt = $conn -> prepare($sql_str);
          $stmt -> bindParam(':imgname' ,$file_name);
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
      echo "<script>alert('上傳成功!');window.location.href = 'uploadImg.php?upload=ok' </script>";
      }
  
if(isset($_SESSION['username'])){
?>

<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex">
    <title>上傳圖片</title>
    <link rel="stylesheet" href="../css/cms.css">
</head>
<body>
<?php include_once('./header.php');?>
<?php include_once('./toolbar.php'); ?>
    <div id="uploadImg">
       
        <form name="uploadForm" enctype="multipart/form-data" method="POST" action="">
            <p> (上傳的檔案名稱請符合英數字及減號或底線，檔案類型必須是jpg、png、gif，檔案容量必須小於1M) </p>
            <input type="file" name="upload_file[]" multiple>
            <input type="submit" value="確定上傳">
        </form>
        <div class="photo">
            <?php foreach($RS_img as $item){ ?>
               <div class="imglist">
                    <img src="../images/img_upload2/<?php echo $item['files_name']; ?>" alt="">
                    <a href="javascript:;" onclick="deleteLink(<?php echo $item['id']; ?>)"><i class="fas fa-times" id="deleteImg"></i></a>
               </div>
            <?php } ?>
        </div>

        <div id="loading">
                <img src="../images/loading.gif" alt="">
        </div>
    </div>
    <script>
    const file = document.getElementById('file');
    const submit = document.getElementById('submit');
    const loading = document.getElementById('loading');
    function deleteLink(id){
        chk = confirm('確定要刪除嗎?');
        if(chk){
            window.location.href = `./deleteNewsImg.php?id=${id}`;
            return;
        }
    }
    submit.addEventListener('click',()=>{
        loading.style.display = "flex";
    })
    file.addEventListener('change',()=>{
        if(file.value !=""){
            submit.disabled = false;
        }else{
            submit.disabled = true;
        }
    });
    </script>
</body>
</html>


<?php }else{ ?>
    <link rel="stylesheet" href="../css/cms.css">
   <div class="error">
    <h1>你無權限進入此網站</h1>
        <a href="./login.php">點此登入</a>
   </div>

<?php
}