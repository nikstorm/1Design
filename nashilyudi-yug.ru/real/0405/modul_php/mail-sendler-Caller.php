<?php 

        $title = $_POST['title_mail']; 

        $name =  $_POST['name']; 
        $tel =  $_POST['tel'];
        
        $mess = "Завка с сайта. Посетитель оставил свои данные: \n\nИмя: ".$name."\nТелефон: ".$tel."\n\n";
        
        $to = 'rpk1@list.ru'; 
        $from = 'rpk1@list.ru';
        

        


        mail($to, $title, $mess, 'From:'.$from); 
        echo 'Заявка принята!'; 

?>
