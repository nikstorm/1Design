<?php 

        $title = $_POST['title_mail']; 

        $name =  $_POST['name']; 
        $tel =  $_POST['tel'];
        
        $yourEmail =  $_POST['your_email'];

        $mess = "Поступила заявка с Вашего сайта. Посетитель оставил свои данные: \n\nИмя: ".$name."\nТелефон: ".$tel."\nEmail: ".$yourEmail."\n\n";
        
        $to = 'rpk1@list.ru'; 
        $from = 'rpk1@list.ru';
        




        mail($to, $title, $mess, 'From:'.$from); 
        echo 'Заявка принята!'; 

?>
