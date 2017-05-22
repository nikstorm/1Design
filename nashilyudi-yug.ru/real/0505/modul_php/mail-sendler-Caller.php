<?php 

         $title = $_POST['title_mail']; 

         $name =  $_POST['name']; 
         $tel =  $_POST['tel'];
        
         $mess = "Завка с сайта. Посетитель оставил свои данные: \r\nИмя: ".$name."\nТелефон: ".$tel."\r\n";
        
        // $to = 'nikstorm@mail.ru'; 
        // $from = 'rpk1@list.ru';
        

        


        // mail($to, $title, $mess, 'From:'.$from); 
        // echo 'Заявка принята!'; 
	mail("nil_yug@mail.ru",$title,$mess);
?>
