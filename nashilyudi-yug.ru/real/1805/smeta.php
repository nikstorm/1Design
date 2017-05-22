<?php 
// $name = $_POST['name'];
// $phone = $_POST['phone'];

// mail("nil_yug@mail.ru","Составление сметы", $name."\r\n".$phone);

require("./mail.php");
mail($mail,"zzz","Форма смета");
 ?>