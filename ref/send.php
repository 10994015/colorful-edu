<?php
if(isset($_POST['name'])){
    try{
        $name = $_POST['name'];
        $email = $_POST['email'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $result2 = 1;

        $result2 = sendMail($name,$email,$title,$content);
        if($result2 == 1){
            // echo "<script> alert('發送成功\n我們會盡快回復您!'); location.href='../?page=contact'</script>";
            header('Location:../?page=contact');
        }else{
            header('Location:../?page=error');
        }

    }catch(PDOException $e){
        die("Error!:發送失敗.....".$e->getMessage());
    }
}

function sendMail($name,$email,$title,$content){
    $subject = "=?UTF-8?B?".base64_encode('冰芬美語訊息通知')."?=";
    $text = '姓名:'.$name.'<br>'
                .'發送者信箱:'.$email
                .'主旨:'.$title
                .'訊息:<br>'.$content;
                

    $header = "From: a0938599191@gmail.com\r\n";
    $header .= "Content-type: text/html; charset=utf8";

    //mail(收件者,信件主旨,信件內容,信件檔頭資訊)
    $result = mail('a0938599191@gmail.com', $subject, $text, $header);
    echo $result;
    return $result;
}