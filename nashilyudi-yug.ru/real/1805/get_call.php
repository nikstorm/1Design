<?php 
// $name = $_POST['name'];

// $phone = $_POST['phone'];
// mail("nil_yug@mail.ru","Заказан звонок", $name."\r\n".$phone);

require("./mail.php");
mail($mail,"zzz","Форма сверху заказать звонок");
 ?>