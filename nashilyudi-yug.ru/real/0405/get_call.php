<?php 
$name = $_POST['name'];
// $email = $_POST['email'];
$phone = $_POST['phone'];
//mail("nil_yug@mail.ru",$name,$name."\r\n".$email);
mail("nil_yug@mail.ru","Заказан звонок", $name."\r\n".$phone);
 ?>