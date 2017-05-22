<?php

    $data1 = file("coffeelini_adm/db/config.db");
    $dat = explode ("*|*", $data1[1]);
	$dat_email = $dat[1];
	$contact_us = file("coffeelini_adm/db/contact_us.db");
    $contact_us1 = explode ("*|*", $contact_us[1]);
	$Timeout = $contact_us1[16];
	$time = time() + $Timeout;
	$_SESSION["sendtime"] = $time;
	    $data1 = file("coffeelini_adm/db/stats.db");
    $dat1 = explode ("|", $data1[6]);
    $datmes = $dat1[0]+1;
	$statnew = $dat1[1];
	$ststvse = $dat1[2];
    $dattime = $dat1[3];
	$db=fopen("coffeelini_adm/db/stats.db","a");
	unset($data1[6]);
	unset($data1[7]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/stats.db", implode("", $data1));
    fputs ($db, $datmes."|".$statnew."|".$ststvse."|".$dattime."\n");
	fclose($db);
	
$name = $func->ifnot_utf($_POST['name']);
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $func->ifnot_utf($_POST['message']);
$sender = new isender;
$sender->sendmsg($dat_email, $name, $phone, $message, $email_address);
return true;			
?>