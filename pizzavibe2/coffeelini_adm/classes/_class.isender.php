<?php
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################

class isender{
    
	var $Hosts = "";
	
	/*======================================================================*\
	Function:	__construct
	Descriiption: Конструктор класса
	\*======================================================================*/
	function __construct(){
	
		$this->Hosts = str_replace("www.","",$_SERVER['HTTP_HOST']);
	
	}

	/*======================================================================*\
	Function:	RecoveryPassword
	Descriiption: Восстановление пароля
	\*======================================================================*/
	function RecoveryPassword($user, $pass, $mail){
	
		$text = "Hello!<BR />";
		$text.= "You have modified your data: <BR />";
		$text.= "<b>Login:</b> {$user}<BR />";
		$text.= "<b>Password:</b> {$pass}<BR />";
		$text.= "<b>Email:</b> {$mail}<BR />";
		$text.= "Please use this link to enter the Admin CP: <a href='http://".$this->Hosts."/admin'>Admin CP</a><BR/>Thank you!";
		$subject = "Your log in data at ".$this->Hosts."";
		
		return $this->SendMail($mail, $subject, $text);
		
	}

	/*======================================================================*\
	Function:	SetNewPassword
	Descriiption: Отправляет данные после смены пароля
	\*======================================================================*/
	function SetNewPassword($user, $pass, $mail){
	
		$text = "Hello!<BR />";
		$text.= "You have modified your data: <BR />";
		$text.= "<b>Login:</b> {$user}<BR />";
		$text.= "<b>Password:</b> {$pass}<BR />";
		$text.= "<b>Email:</b> {$mail}<BR />";
		$text.= "Please use this link to enter the Admin CP: <a href='http://".$this->Hosts."/admin'>Admin CP</a><BR/>Thank you!";
		$subject = "Your data has been modified at ".$this->Hosts."";
		
		return $this->SendMail($mail, $subject, $text);
		
	}
		function sendmsg($to, $name, $phone, $message, $mail){
	
		$text = "You have received a new message from your website contact form.<BR />";
		$text.= "Here are the details: <BR/><BR/>";
		$text.= "<b>Name:</b> {$name}<BR/>";
		$text.= "<b>Email:</b> {$mail}<BR/>";
		$text.= "<b>Phone:</b> {$phone}<BR/><BR/>";
		$text.= "<b>Message:</b> {$message}<BR/><BR/><BR/>";

		$subject = "You have a new message from ".$this->Hosts."";
		
		return $this->SendMail($to, $subject, $text);
		
	}
	
	/*======================================================================*\
	Function:	Headers
	Descriiption: Создание заголовков письма
	\*======================================================================*/
	function Headers(){
	
	$headers = "MIME-Version: 1.0\r\n";
	$headers.= "Content-type: text/html; charset=Windows-1251\r\n";
	$headers.= "From: ".$this->Hosts." <sapport@".$this->Hosts."> \r\n";
	$headers.= "Reply-To: sapport@".$this->Hosts." \r\n";
	
	return $headers;
	
	}
	
	/*======================================================================*\
	Function:	SendMail
	Descriiption: Отправитель
	\*======================================================================*/
	function SendMail($recipient, $subject, $message){
	
		$message .= "";
		return (mail($recipient, $subject, $message, $this->Headers())) ? true : false;
	
	}
	
	
	
}
?>