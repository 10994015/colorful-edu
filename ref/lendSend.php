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
            // header('Location:../?page=site');
            ?>
            <script>
            window.onload = ()=>{
                alertFn();
                function alertFn(){
                    alert('發送成功!我們將盡快與您聯絡!');
                    window.location.href = '../?page=site';
                }
            }
            </script>
            <?php
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
                

    $header = "From: service@ice-finland.pro\r\n";
    $header .= "Content-type: text/html; charset=utf8";

    //mail(收件者,信件主旨,信件內容,信件檔頭資訊)
    $result = mail('service@ice-finland.pro', $subject, $content, $header);
    return $result;
}