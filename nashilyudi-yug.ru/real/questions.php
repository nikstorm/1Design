<?php 
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
//mail("nil_yug@mail.ru",$name,$name."\r\n".$email);
mail("nil_yug@mail.ru","Остались вопросы", $name."\r\n".$phone."\r\n".$email);
 ?>