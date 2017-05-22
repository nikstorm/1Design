<?php 
$name = $_POST['name'];
$type = $_POST['Вывески'];
$phone = $_POST['phone'];
//mail("nil_yug@mail.ru",$name,$name."\r\n".$email);
mail("nil_yug@mail.ru","Получить консультацию по".$type, $name."\r\n".$phone);
 ?>