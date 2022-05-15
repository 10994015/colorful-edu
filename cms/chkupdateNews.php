<?php
require_once('../config/conn.php');
if($_FILES['imgsrc']['name']!=""){
    if(isset($_POST['id'])){
        try{
            $rand = strval(rand(1000,1000000));
            $sql_str = "UPDATE news SET title = :title,content=:content,imgsrc=:imgsrc,isShow=:isShow,smallimg=:smallimg,focus=:focus WHERE id  = :id";
            //執行$conn物件中的prepare()預處理器
            $stmt = $conn->prepare($sql_str);
        
            //接收表單輸入的資料
            $title    = $_POST['title'];
            $content      = $_POST['content'];
            $id      = $_POST['id'];
            $focus      = $_POST['focus'];

            $file      = $_FILES['imgsrc'];             //上傳檔案信息
            $file_name = $file['name'];                //上傳檔案的原來檔案名稱
            $file_type = $file['type'];                //上傳檔案的類型(副檔名)
            $tmp_name  = $file['tmp_name'];            //上傳到暫存空間的路徑/檔名
            $file_size = $file['size'];                //上傳檔案的檔案大小(容量)
            $error     = $file['error'];   
            $imgname = $rand.$file_name;

            if( $_POST['isShow'] == ""){
                $isShow = 0;
            }else{
                $isShow = $_POST['isShow'];
            }
            $smallimg = $_POST['smallimg'];
        
            //設定準備好的$stmt物件中對應的參數值
            $stmt->bindParam(':title' ,$title);
            $stmt->bindParam(':content' ,$content);
            $stmt->bindParam(':id' ,$id);
            $stmt->bindParam(':imgsrc' ,$imgname);
            $stmt->bindParam(':isShow' ,$isShow);
            $stmt->bindParam(':smallimg' ,$smallimg);
            $stmt->bindParam(':focus' ,$focus);
        
            //執行準備好的$stmt物件工作
            $stmt->execute();
            // $_SESSION['money'] = $money;
            // header('Location:./news.php');
            $allow_ext = array('jpeg', 'jpg', 'png', 'gif','JPG','JPEG','PNG','GIF');
            //設定上傳位置
            $path = '../images/img_upload/';
            if (!file_exists($path)) { mkdir($path); }
            $path2 = '../images/img_upload2/';
            if (!file_exists($path2)) { mkdir($path2); }
        
            //2.判斷上傳沒有錯誤時 => 檢查限制的條件 =============================================
            if ($error == 0) {
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            //in_array($ext, $allow_ext) 判斷 $ext變數的值 是否在 $allow_ext 這個陣列變數中
            if (!in_array($ext, $allow_ext)) {
                exit('檔案類型不符合，請選擇 jpeg, jpg, png, gif 檔案');
            }
            //搬移檔案
            $result = move_uploaded_file($tmp_name, $path.$file_name);
            // echo '<br>---------檔案傳送' . $result;
            
            if (file_exists($path.$file_name)) {
                //拷貝檔案
                $result = copy($path.$file_name, $path2.$rand.$file_name);
                // echo '<br>---------檔案拷貝' . $result;
                //刪除檔案
                $result = unlink($path.$file_name);
                // echo '<br>---------檔案刪除' . $result;
            }
            // header('Location:newsCreate.php');
        
            } else {
            //這裡表示上傳有錯誤, 匹配錯誤編號顯示對應的訊息
            switch ($error) {
                case 1:  echo '上傳檔案超過 upload_max_filesize 容量最大值';  break;
                case 2:  echo '上傳檔案超過 post_max_size 總容量最大值';  break;
                case 3:  echo '檔案只有部份被上傳';  break;
                case 4:  echo '沒有檔案被上傳';  break;
                case 6:  echo '找不到主機端暫存檔案的目錄位置';  break;
                case 7:  echo '檔案寫入失敗';  break;
                case 8:  echo '上傳檔案被PHP程式中斷，表示主機端系統錯誤';  break;
            }
            }
            ?>
            <script>
            alertFn();
            function alertFn(){
                alert('編輯成功!');
                window.location.href = "./news.php";
            }
            </script>
            <?php
        }catch (PDOException $e ){
            die("ERROR!!!: ". $e->getMessage());
        }
    }
}else{
    if(isset($_POST['id'])){
        try{
            $sql_str = "UPDATE news SET title = :title,content=:content,isShow=:isShow,smallimg=:smallimg,focus=:focus WHERE id  = :id";
            //執行$conn物件中的prepare()預處理器
            $stmt = $conn->prepare($sql_str);
        
            //接收表單輸入的資料
            $title    = $_POST['title'];
            $content      = $_POST['content'];
            $id      = $_POST['id'];
            $focus      = $_POST['focus'];

            $file      = $_FILES['imgsrc'];             //上傳檔案信息
           

            if( $_POST['isShow'] == ""){
                $isShow = 0;
            }else{
                $isShow = $_POST['isShow'];
            }
            $smallimg = $_POST['smallimg'];
        
            //設定準備好的$stmt物件中對應的參數值
            $stmt->bindParam(':title' ,$title);
            $stmt->bindParam(':content' ,$content);
            $stmt->bindParam(':id' ,$id);
            $stmt->bindParam(':isShow' ,$isShow);
            $stmt->bindParam(':smallimg' ,$smallimg);
            $stmt->bindParam(':focus' ,$focus);
        
            //執行準備好的$stmt物件工作
            $stmt->execute();
            // $_SESSION['money'] = $money;
            // header('Location:./news.php');
           
        
           
            
            ?>
            <script>
            alertFn();
            function alertFn(){
                alert('編輯成功!');
                window.location.href = "./news.php";
            }
            </script>
            <?php
        }catch (PDOException $e ){
            die("ERROR!!!: ". $e->getMessage());
        }
    }
}