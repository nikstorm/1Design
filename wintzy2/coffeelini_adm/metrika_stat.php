<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################

$ip_dos =   ( !empty($_SERVER['REMOTE_ADDR']) ) ? $_SERVER['REMOTE_ADDR'] : ( ( !empty($_ENV['REMOTE_ADDR']) ) ? $_ENV['REMOTE_ADDR'] : "unknown" );
$time = time();
$data = file("coffeelini_adm/db/newuser.db");
for ($i=0;$i<count($data);$i++) {
$dat = explode ("|", $data[$i]);
if ($ip_dos == $dat[0])
{
exit;
}
}
$fp = fopen ("coffeelini_adm/db/newuser.db", "a");
flock ( $fp, 1);
fputs ($fp, $ip_dos."|".$time."\r\n");
flock ($fp, 3);
fclose ($fp);
    $data1 = file("coffeelini_adm/db/stats.db");
    $dat1 = explode ("|", $data1[6]);
    $datmes = $dat1[0];
	$statnew = $dat1[1] + 1;
	$ststvse = $dat1[2] + 1;
    $dattime = $dat1[3];
	$db=fopen("coffeelini_adm/db/stats.db","a");
	unset($data1[6]);
	unset($data1[7]);
	//записали остачу в файл
    file_put_contents("coffeelini_adm/db/stats.db", implode("", $data1));
    fputs ($db, $datmes."|".$statnew."|".$ststvse."|".$dattime."\n");
	fclose($db);
    exit;
?>