<?php 

         $title = $_POST['title_mail']; 

         $name =  $_POST['name']; 
         $tel =  $_POST['tel'];
        
         $yourEmail =  $_POST['your_email'];

        $mess = "Поступила заявка с Вашего сайта. Посетитель оставил свои данные: \r\nИмя: ".$name."\nТелефон: ".$tel."\nEmail: ".$yourEmail."\r\n";
        
        // $to = 'rpk1@list.ru'; 
        // $from = 'rpk1@list.ru';
        




        // mail($to, $title, $mess, 'From:'.$from); 
        // echo 'Заявка принята!'; 
mail("nil_yug@mail.ru",$title,$mess);
?>
