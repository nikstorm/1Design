<?php 
	session_start();
	$mail = "alexxei83@gmail.com";
	if ($_GET["kasko"]) {
		if ($_GET['voditel']==4){ // Без ограничений
			$voditel4="\n \n Минимальный возраст: ".$_GET['minvoz']."\n Минимальный стаж: ".$_GET['minstaz']."\n ";
			$vod='Без ограничений';
			if($_REQUEST['minvoz']!="" && $_REQUEST['minstaz']!=""){
				mail($mail, "Заявка с формы КАСКО", "Заявка с формы КАСКО \n Прописка собственника: ".$_GET['propiska']."\n Форма возмещения: ".$_GET['forma']."\n Оплата : ".$_GET['oplata']."\n Марка ТС: ".$_GET['marka']."\n Модель ТС: ".$_GET['model']."\n Год выпуска: ".$_GET['hod']."\n Дата эксплуатации по ПТС: ".$_GET['data']."\n Стоимость ТС: ".$_GET['stoimost']."\n Лошадиные силы: ".$_GET['sili']."\n Водительей: ".$vod."$voditel4 \n Имя: ".$_GET['name']."\n Телефон: ".$_GET['tel']."\n Mail: ".$_GET['mail']."\n"); 
				$_SESSION["send"]="ok";
			}
		}
		else{
			$vod=$_GET['voditel'];
			if ($_GET['voditel']==1){ //1
				$voditel1="\n \n Возраст: ".$_GET['vozrast1']."\n Стаж: ".$_GET['staz1']."\n Пол: ".$_GET['pol1']."\n ";
			}
			if ($_GET['voditel']==2){ //2
				$voditel1="\n \n Возраст: ".$_GET['vozrast21']."\n Стаж: ".$_GET['staz21']."\n Пол: ".$_GET['pol21']."\n ";
				$voditel2="\n \n Возраст: ".$_GET['vozrast22']."\n Стаж: ".$_GET['staz22']."\n Пол: ".$_GET['pol22']."\n ";
			}
			if ($_GET['voditel']==3){ //3
				$voditel1="\n \n Возраст: ".$_GET['vozrast31']."\n Стаж: ".$_GET['staz31']."\n Пол: ".$_GET['pol31']."\n ";
				$voditel2="\n \n Возраст: ".$_GET['vozrast32']."\n Стаж: ".$_GET['staz32']."\n Пол: ".$_GET['pol32']."\n ";
				$voditel3="\n \n Возраст: ".$_GET['vozrast33']."\n Стаж: ".$_GET['staz33']."\n Пол: ".$_GET['pol33']."\n ";
			}
			if($_REQUEST['vozrast1']!="" && $_REQUEST['staz1']!="" && $_REQUEST['pol1']!=""){
				mail($mail, "Заявка с формы КАСКО", "Заявка с формы КАСКО \n Прописка собственника: ".$_GET['propiska']."\n Форма возмещения: ".$_GET['forma']."\n Оплата : ".$_GET['oplata']."\n Марка ТС: ".$_GET['marka']."\n Модель ТС: ".$_GET['model']."\n Год выпуска: ".$_GET['hod']."\n Дата эксплуатации по ПТС: ".$_GET['data']."\n Стоимость ТС: ".$_GET['stoimost']."\n Лошадиные силы: ".$_GET['sili']."\n Водителей: ".$vod."$voditel1 $voditel2 $voditel3 \n Имя: ".$_GET['name']."\n Телефон: ".$_GET['tel']."\n Mail: ".$_GET['mail']."\n"); 
				$_SESSION["send"]="ok";
			}
		}
		$_SESSION["send"]="ok";
	}	
	elseif($_GET["osago"]){
		if ($_GET['voditel']==6){ // Без ограничений
			$voditel6="\n \n Фамилия, Имя, Отчество: ".$_GET['fio6']."\n Серия паспорта: ".$_GET['seria6']."\n Номер паспорта: ".$_GET['nomer6']."\n Дата рождения: ".$_GET['dataroz6']."\n Vin номер: ".$_GET['vin']." \n ";
			$vod='Без ограничений';
			if($_REQUEST['fio6']!="" && $_REQUEST['seria6']!="" && $_REQUEST['nomer6']!="" && $_REQUEST['dataroz6']!="" && $_REQUEST['vin']!=""){
				mail('alexxei83@gmail.com', iconv("utf-8", "windows-1251" ,"Заявка с формы ОСАГО"), "Заявка с формы ОСАГО \n Прописка собственника: ".$_GET['propiska']."\n Период страхования: ".$_GET['period']."\n Категория ТС: ".$_GET['kategori']."\n Лошадиные силы: ".$_GET['losh']."\n Дата окончания полиса: ".$_GET['date']."\n Расширение: ".$_GET['razshiren']."\n Водителей: ".$vod."$voditel6 \n Имя: ".$_GET['name']."\n Телефон: ".$_GET['tel']."\n Mail: ".$_GET['mail']."\n"); 
				$_SESSION["send"]="ok";
			}
		}
		else{
			$vod=$_GET['voditel'];
			if ($_GET['voditel']==1){ //1
				$voditel1="\n \n Фамилия, Имя, Отчество: ".$_GET['fio1']."\n Серия прав: ".$_GET['seria1']."\n Номер прав: ".$_GET['nomer1']."\n Дата рождения: ".$_GET['dataroz1']."\n Дата начала стажа: ".$_GET['datastaz1']."";
			}

			if ($_GET['voditel']==2){ //2
				$voditel1="\n \n Фамилия, Имя, Отчество: ".$_GET['fio21']."\n Серия прав: ".$_GET['seria21']."\n Номер прав: ".$_GET['nomer21']."\n Дата рождения: ".$_GET['dataroz21']."\n Дата начала стажа: ".$_GET['datastaz21']."";
				$voditel2="\n \n Фамилия, Имя, Отчество: ".$_GET['fio22']."\n Серия прав: ".$_GET['seria22']."\n Номер прав: ".$_GET['nomer22']."\n Дата рождения: ".$_GET['dataroz22']."\n Дата начала стажа: ".$_GET['datastaz22']."";
			}

			if ($_GET['voditel']==3){ //3
				$voditel1="\n \n Фамилия, Имя, Отчество: ".$_GET['fio31']."\n Серия прав: ".$_GET['seria31']."\n Номер прав: ".$_GET['nomer31']."\n Дата рождения: ".$_GET['dataroz31']."\n Дата начала стажа: ".$_GET['datastaz31']."";
				$voditel2="\n \n Фамилия, Имя, Отчество: ".$_GET['fio32']."\n Серия прав: ".$_GET['seria32']."\n Номер прав: ".$_GET['nomer32']."\n Дата рождения: ".$_GET['dataroz32']."\n Дата начала стажа: ".$_GET['datastaz32']."";
				$voditel3="\n \n Фамилия, Имя, Отчество: ".$_GET['fio33']."\n Серия прав: ".$_GET['seria33']."\n Номер прав: ".$_GET['nomer33']."\n Дата рождения: ".$_GET['dataroz33']."\n Дата начала стажа: ".$_GET['datastaz33']."";
			}

			if ($_GET['voditel']==4){ //4
				$voditel1="\n \n Фамилия, Имя, Отчество: ".$_GET['fio41']."\n Серия прав: ".$_GET['seria41']."\n Номер прав: ".$_GET['nomer41']."\n Дата рождения: ".$_GET['dataroz41']."\n Дата начала стажа: ".$_GET['datastaz41']."";
				$voditel2="\n \n Фамилия, Имя, Отчество: ".$_GET['fio42']."\n Серия прав: ".$_GET['seria42']."\n Номер прав: ".$_GET['nomer42']."\n Дата рождения: ".$_GET['dataroz42']."\n Дата начала стажа: ".$_GET['datastaz42']."";
				$voditel3="\n \n Фамилия, Имя, Отчество: ".$_GET['fio43']."\n Серия прав: ".$_GET['seria43']."\n Номер прав: ".$_GET['nomer43']."\n Дата рождения: ".$_GET['dataroz43']."\n Дата начала стажа: ".$_GET['datastaz43']."";
				$voditel4="\n \n Фамилия, Имя, Отчество: ".$_GET['fio44']."\n Серия прав: ".$_GET['seria44']."\n Номер прав: ".$_GET['nomer44']."\n Дата рождения: ".$_GET['dataroz44']."\n Дата начала стажа: ".$_GET['datastaz44']."";
			}

			if ($_GET['voditel']==5){ //5
				$voditel1="\n \n Фамилия, Имя, Отчество: ".$_GET['fio51']."\n Серия прав: ".$_GET['seria51']."\n Номер прав: ".$_GET['nomer51']."\n Дата рождения: ".$_GET['dataroz51']."\n Дата начала стажа: ".$_GET['datastaz51']."";
				$voditel2="\n \n Фамилия, Имя, Отчество: ".$_GET['fio52']."\n Серия прав: ".$_GET['seria52']."\n Номер прав: ".$_GET['nomer52']."\n Дата рождения: ".$_GET['dataroz52']."\n Дата начала стажа: ".$_GET['datastaz52']."";
				$voditel3="\n \n Фамилия, Имя, Отчество: ".$_GET['fio53']."\n Серия прав: ".$_GET['seria53']."\n Номер прав: ".$_GET['nomer53']."\n Дата рождения: ".$_GET['dataroz53']."\n Дата начала стажа: ".$_GET['datastaz53']."";
				$voditel4="\n \n Фамилия, Имя, Отчество: ".$_GET['fio54']."\n Серия прав: ".$_GET['seria54']."\n Номер прав: ".$_GET['nomer54']."\n Дата рождения: ".$_GET['dataroz54']."\n Дата начала стажа: ".$_GET['datastaz54']."";
				$voditel5="\n \n Фамилия, Имя, Отчество: ".$_GET['fio55']."\n Серия прав: ".$_GET['seria55']."\n Номер прав: ".$_GET['nomer55']."\n Дата рождения: ".$_GET['dataroz55']."\n Дата начала стажа: ".$_GET['datastaz55']."";
			}
			if($_REQUEST['fio51']!="" && $_REQUEST['seria51']!="" && $_REQUEST['nomer51']!="" && $_REQUEST['dataroz51']!="" && $_REQUEST['datastaz51']!=""){
				mail("alexxei83@gmail.com", iconv("utf-8", "windows-1251" ,"Заявка с формы ОСАГО"), "Заявка с формы ОСАГО \n Прописка собственника: ".$_GET['propiska']."\n Период страхования: ".$_GET['period']."\n Категория ТС: ".$_GET['kategori']."\n Лошадиные силы: ".$_GET['losh']."\n Дата окончания полиса: ".$_GET['date']."\n Расширение: ".$_GET['razshiren']."\n Водительей: ".$vod." $voditel1 $voditel2 $voditel3 $voditel4 $voditel5 \n Имя: ".$_GET['name']."\n Телефон: ".$_GET['tel']."\n Mail: ".$_GET['mail']."\n"); 
				$_SESSION["send"]="ok";
			}
		}
		$_SESSION["send"]="ok";
	}
	elseif($_POST["contact"]){
		if($_REQUEST['name22']!="" && $_REQUEST['mail22']!="" && $_REQUEST['sms22']!=""){
			mail("alexxei83@gmail.com", "Заявка с формы Контакты", "Заявка с формы Контакты \n Имя: ".$_POST['name22']."\n Mail: ".$_POST['mail22']."\n Сообщение: ".$_POST['sms22']." "); 
			$_SESSION["send"]="ok";
		}
	}
	header("Location: index.php");
	exit;

?>