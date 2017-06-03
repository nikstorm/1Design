<?php

include("db.php");

session_start();

 

$msg='';

if($_SERVER["REQUEST_METHOD"] == "POST")

{

    $recaptcha=$_POST['g-recaptcha-response'];

    if(!empty($recaptcha))

    {
        include("getCurlData.php");
        $google_url="https://www.google.com/recaptcha/api/siteverify";
        $secret='Google Secret Key';
        $ip=$_SERVER['REMOTE_ADDR'];
        $url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
        $res=getCurlData($url);
        $res= json_decode($res, true);
        //reCaptcha введена
        if($res['success'])
        {
            // Продолжаем проверку данных формы
        }
        else
        {
            $msg="Please re-enter your reCAPTCHA.";
        }
 
    }
    else
    {
        $msg="Please re-enter your reCAPTCHA.";
    }
}
?>

