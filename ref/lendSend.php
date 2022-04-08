<?php
if(isset($_POST['leaseName'])){
    try{
        $leaseSite = '冰芬美語';
        $leaseName = $_POST['leaseName'];
        $leasePhone = $_POST['leasePhone'];
        $leaseEmail = $_POST['leaseEmail'];
        $leaseTimeStart = $_POST['leaseTimeStart'];
        $leaseTimeEnd = $_POST['leaseTimeEnd'];
        $leaseUse = $_POST['leaseUse'];
      
        $result2 = sendMail($leaseSite,$leaseName,$leasePhone,$leaseEmail,$leaseTimeStart,$leaseTimeEnd,$leaseUse);
        if($result2 == 1){
            echo "<script> alert('發送成功\n我們會盡快回復您!'); location.href='../?page=site'</script>";
        }else{
            header('Location:../?page=error');
        }

    }catch(PDOException $e){
        die("Error!:發送失敗.....".$e->getMessage());
    }
}

function sendMail($leaseSite,$leaseName,$leasePhone,$leaseEmail,$leaseTimeStart,$leaseTimeEnd,$leaseUse){
    $subject = "=?UTF-8?B?".base64_encode('冰芬美語租借場地通知訊息')."?=";
    $content =  '姓名:'.$leaseName.'<br>'
                .'租借場地:'.$leaseSite.'<br>'
                .'發送者信箱:'.$leaseEmail.'<br>'
                .'發送者手機:'.$leasePhone.'<br>'
                .'租借時間:'.$leaseTimeStart
                .'至:'.$leaseTimeEnd.'<br>'
                .'租借用途:'.$leaseUse;
                

    $header = "From: a0938599191@gmail.com\r\n";
    $header .= "Content-type: text/html; charset=utf8";

    //mail(收件者,信件主旨,信件內容,信件檔頭資訊)
    $result = mail('a0938599191@gmail.com', $subject, $content, $header);
    return $result;
}