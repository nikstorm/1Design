<?php 

$message = rand();
for($x=0;$x<15;$x++){
mail("a.dyshkov@mail.ru", rand(), $message, 
     "From:".rand()."@".rand().".ru \r\n" 
    ."X-Mailer: JS/" );
    sleep(2);
    } 
 ?>