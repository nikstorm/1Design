<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################

	if(isset($_POST["log_login"])){
	$login = $_POST["log_login"];
	$pass = $_POST["log_pass"];
    $id = "1";
    $data1 = file("coffeelini_adm/db/config.db");
    $dat = explode ("*|*", $data1[$id]);
	$dat_login = $dat[0];
	$dat_pass = $dat[2];
	if($dat_login == $login){
	    if($dat_pass == $pass){
		
						$_SESSION["admin"] = $dat_login;
						
						echo "0";
						
	    }else echo "2";				
	}else echo "2";
	exit;
	};
    if(isset($_POST["re_login"])){

	$login = $_POST["re_login"];
	$email = $func->IsMail($_POST["re_email"]);
	$email1 = $email;
	$pass = $_POST["pass"];
	$pass_new = $_POST["pass_new"];
	$re_pass_new = $_POST["re_pass_new"];
		$text = trim($pass);
        $tmp_arr = explode(' ', $text);
	    $textpass_new = trim($pass_new);
        $tmp_pass_new = explode(' ', $textpass_new);
		$text_log = trim($login);
        $tmp_arr_log = explode(' ', $text_log);
		$i = 0;
			if(strlen($tmp_arr_log[$i]) != 0){
	  if(strlen($tmp_arr_log[$i]) >= 4){
	if($email !== false){
    $id = "1";
    $data1 = file("coffeelini_adm/db/config.db");
    $dat = explode ("*|*", $data1[$id]);
	$dat_email = $dat[1];
	$dat_pass = $dat[2];
	
		if(strlen($tmp_arr[$i]) != 0){
		if($pass == $dat_pass){
		if(strlen($tmp_pass_new[$i]) >= 5){
		if($pass_new == $re_pass_new){
	    $db=fopen("coffeelini_adm/db/config.db","a");
	    unset($data1[1]);
        file_put_contents("coffeelini_adm/db/config.db", implode("", $data1));
        fputs ($db, $login."*|*".$email."*|*".$pass_new."");
	    fclose($db);
	    $sender = new isender;
		if($email !== $dat_email){
		$sender -> SetNewPassword($login, $pass_new, $dat_email);
		}
		$sender -> SetNewPassword($login, $pass_new, $email);
		echo "1";
		}else echo "The new password and repeat new password don't match";
		}else echo "The new password must have more than 5 characters";
		}else echo "The password entered is not correct";
		}else{
	    $db=fopen("coffeelini_adm/db/config.db","a");
	    unset($data1[1]);
        file_put_contents("coffeelini_adm/db/config.db", implode("", $data1));
        fputs ($db, $login."*|*".$email."*|*".$dat_pass."");
	    fclose($db);
		$sender = new isender;
		if($email !== $dat_email){
		$sender -> SetNewPassword($login, $dat_pass, $dat_email);
		}
		$sender -> SetNewPassword($login, $dat_pass, $email);
		echo "1";
	    }				
	}else echo "Email has incorrect format";
	}else echo "The login should have more than 4 characters";
	}else echo "The username field must be filled";
	exit;
	};
	if(isset($_POST["recovery_email"])){
	$re_email = $func->IsMail($_POST["recovery_email"]);
	if($re_email !== false){
    $id = "1";
    $data1 = file("coffeelini_adm/db/config.db");
    $dat = explode ("*|*", $data1[$id]);
	$dat_login = $dat[0];
	$dat_email = $dat[1];
	$dat_pass = $dat[2];
	if($dat_email == $re_email){
	$sender = new isender;
	$sender -> RecoveryPassword($dat_login, $dat_pass, $dat_email);				
	echo "0";		
	
	}else echo "Email incorrect";
	}else echo "Email has incorrect format";
	exit;
	};
	Header("Location: /");
?>