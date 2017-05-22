<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################

    $id = "6";
	$time = time();
	$time1 = date("Ymd", $time);
    $data1 = file("coffeelini_adm/db/stats.db");
    $dat = explode ("|", $data1[$id]);
	$time2 = date("Ymd", $dat[3]);
	$ststvse = $dat[2];
    if($time1 != $time2){
	$zap = "0|0";
	$db=fopen("coffeelini_adm/db/stats.db","a");
	unset($data1[0]);
	unset($data1[7]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/stats.db", implode("", $data1));
    fputs ($db, $zap."|".$ststvse."|".$time."\r\n");
	fclose($db);
	$ww=fopen("coffeelini_adm/db/newuser.db","w+");
	fputs ($ww, "0000|".$time."\r\n");
	fclose($ww);
	};
?>