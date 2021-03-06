<?php
/*
 * $file        接收保存了上傳檔案的5個訊息
 * $max_size    設定允許上傳檔案容量的最大值
 * $allow_ext   設定允許上傳檔案的類型
 * $path        設定上傳檔案存放的位置
 * $file_name   設定上傳檔案的檔案名稱
 */

function upload_chk( $file, $path, $max_size, $allow_ext, $file_name ){

  $source_file_name = $file['name'];         //上傳檔案的原來檔案名稱
  $file_type        = $file['type'];         //上傳檔案的類型(副檔名)
  $tmp_name         = $file['tmp_name'];     //上傳到暫存空間的路徑/檔名
  $file_size        = $file['size'];         //上傳檔案的檔案大小(容量)
  $error            = $file['error'];        //上傳工作傳回的錯誤訊息編號
  $msg = ''; //負責記錄回傳的訊息
 
  //1.判斷錯誤編號只有為0時表示沒有錯誤發生，才表示上傳成功 =================
  if( $error == 0 ){  
 
    //取得檔案延伸的副檔名, 以下函數可以取得檔案延伸的副檔名
    //pathinfo(上傳檔案的原來檔案名稱, PATHINFO_EXTENSION) 
    $ext = pathinfo($source_file_name, PATHINFO_EXTENSION);
    $ext = strtolower($ext);  //將延伸的副檔名轉小寫
 
    //2.判斷上傳檔案的大小 ====================================
    if( $file_size > $max_size ){
      //當目前檔案容量超過容量限制時, 以下準備顯示的資訊
      if( $max_size >= 4096*4096 ){ 
        $max_size /= (4096*4096);
        $max_size .= 'M';
      }elseif( $max_size >= 4096 ){
        $max_size /= 4096;
        $max_size .= 'K';
      }
      $msg ='上傳檔案過大，請選擇容量小於 '.$max_size.' 的檔案';
 
    //3.判斷檔案類型 ===========================================
    //in_array($ext, $allow_ext) 判斷 $ext變數的值 是否在 $allow_ext 這個陣列變數中
    }elseif( !in_array( $ext, $allow_ext ) ){
      $allow_str = ''; //準備將允許檔案類型的陣列內容, 組合成字串
      foreach( $allow_ext as $key=>$value ){
        //if的縮寫語法：條件?成立執行的工作:不成立執行的工作;
        $key==0? $allow_str.= $value : $allow_str.=', '.$value;
      }
      $msg = '檔案類型不符合，請選擇 '.$allow_str.' 檔案';
 
    //4.以上條件都沒問題的話, 則進行最後else中的工作===============
    }else{
      //搬移檔案 move_uploaded_file(要搬移的檔案, 目的地位置及目的檔案名稱), 成功傳回true(1)
      $msg = @move_uploaded_file($tmp_name, $path.$file_name);
    }
  }else{
    //這裡表示上傳有錯誤, 匹配錯誤編號顯示對應的訊息 ======================================
    switch ($error) {
      case 1:  $msg = '上傳檔案超過 upload_max_filesize 容量最大值';  break;
      case 2:  $msg = '上傳檔案超過 post_max_size 總容量最大值';  break;
      case 3:  $msg = '檔案只有部份被上傳';  break;
      case 4:  $msg = '沒有檔案被上傳';  break;
      case 6:  $msg = '找不到主機端暫存檔案的目錄位置';  break;
      case 7:  $msg = '檔案寫入失敗';  break;
      case 8:  $msg = '上傳檔案被PHP程式中斷，表示主機端系統錯誤';  break;
    }
  } //if( $error == 0 ){ ..... end
 
  return $msg;  //回傳$msg的結果
}// function end
?>