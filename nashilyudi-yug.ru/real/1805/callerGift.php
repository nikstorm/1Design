<?php 
// $name = $_POST['name'];

// $phone = $_POST['phone'];

// mail("nil_yug@mail.ru","Режим работы", $name."\r\n".$phone);

require("./mail.php");
mail($mail,"zzz","Форма получить режим работы");
 ?>