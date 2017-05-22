<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################


class func{

	public $UserIP = "Undefined"; # IP пользователя
	public $UserCode = "Undefined"; # Код от IP
	public $TableID = -1; # ID таблицы
	public $UserAgent = "Undefined"; // Браузер пользователя

	/*======================================================================*\
	Function:	__construct
	Output:		Нет
	Descriiption: Выполняется при создании экземпляра класса
	\*======================================================================*/
	public function __construct(){
		$this->UserIP = $this->GetUserIp();
		$this->UserCode = $this->IpCode();
		$this->UserAgent = $this->UserAgent();
	}
	
	/*======================================================================*\
	Function:	__destruct
	Output:		Нет
	Descriiption: Уничтожение объекта
	\*======================================================================*/
	public function __destruct(){
	
	}
	
	
	
	/*======================================================================*\
	Function:	IpToLong
	Descriiption: Преобразует IP в целочисленное
	\*======================================================================*/
	public function IpToInt($ip){ 
	
		$ip = ip2long($ip); 
		($ip < 0) ? $ip+=4294967296 : true; 
		return $ip; 
	}
	
	
	/*======================================================================*\
	Function:	IpToLong
	Descriiption: Преобразует целочисленное в IP
	\*======================================================================*/
	public function IntToIP($int){ 
  		return long2ip($int);  
	}
	
	
	/*======================================================================*\
	Function:	GetUserIp
	Output:		UserIp
	Descriiption: Определяет IP пользователя
	\*======================================================================*/
	public function GetUserIp(){
	
		if($this->UserIP == "Undefined"){
			
			if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) AND !empty($_SERVER['HTTP_X_FORWARDED_FOR']))
   			{
				
			$client_ip = ( !empty($_SERVER['REMOTE_ADDR']) ) ? $_SERVER['REMOTE_ADDR'] : ( ( !empty($_ENV['REMOTE_ADDR']) ) ? $_ENV['REMOTE_ADDR'] : "unknown" );
      		$entries = split('[, ]', $_SERVER['HTTP_X_FORWARDED_FOR']);

      		reset($entries);
				
				while (list(, $entry) = each($entries))
				{
				$entry = trim($entry);
					if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
				 	{
					
					$private_ip = array(
						  '/^0\./',
						  '/^127\.0\.0\.1/',
						  '/^192\.168\..*/',
						  '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/',
						  '/^10\..*/');
		
						$found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);
		
						if ($client_ip != $found_ip)
						{
					   	$client_ip = $found_ip;
					   	break;
						}
						
					}
					
				}
			
			$this->UserIP = $client_ip;
			return $client_ip;
			
			}else return ( !empty($_SERVER['REMOTE_ADDR']) ) ? $_SERVER['REMOTE_ADDR'] : ( ( !empty($_ENV['REMOTE_ADDR']) ) ? $_ENV['REMOTE_ADDR'] : "unknown" );
		
		}else return $this->UserIP;
	
	}
	
	
	/*======================================================================*\
	Function:	IsLogin
	Output:		True / False
	Input:		Строка логина, Маска, Длина ("10, 25") && ("10") 
	Descriiption: Проверяет правильность ввода логина
	\*======================================================================*/
	public function IsLogin($login, $mask = "^[a-zA-Z0-9]", $len = "{4,13}"){
		
		return (is_array($login)) ? false : (ereg("{$mask}{$len}$", $login)) ? $login : false;
	
	}
	
	/*======================================================================*\
	Function:	IsPassword
	Output:		True / False
	Input:		Строка пароля, Маска, Длина ("10, 25") && ("10") 
	Descriiption: Проверяет правильность ввода пароля
	\*======================================================================*/
	public function IsPassword($password, $mask = "^[a-zA-Z0-9]", $len = "{4,20}"){
		
		return (is_array($password)) ? false : (ereg("{$mask}{$len}$", $password)) ? $password : false;
	
	}
	

	/*======================================================================*\
	Function:	IsMail
	Output:		True / False
	Input:		Email 
	Descriiption: Проверяет правильность ввода email адреса
	\*======================================================================*/
	public function IsMail($mail){
		
		if(is_array($mail) && empty($mail) && strlen($mail) > 255 && strpos($mail,'@') > 64) return false;
			return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $mail)) ? false : strtolower($mail);
			
	}
	
	/*======================================================================*\
	Function:	IpCode
	Output:		String, Example 255025502550255
	Input:		- 
	Descriiption: Возвращает IP с замененными знаками "." на "0"
	\*======================================================================*/
	public function IpCode(){
		
		$arr_mask = explode(".",$this->GetUserIp());
		return $arr_mask[0].".".$arr_mask[1].".".$arr_mask[2].".0";

	}
	
	/*======================================================================*\
	Function:	GetTime
	Descriiption: Возвращаер дату
	\*======================================================================*/
	public function GetTime($tis = 0, $unix = true, $template = "d.m.Y H:i:s"){
		
		if($tis == 0){
			return ($unix) ? time() : date($template,time());
		}else return date($template,$unix);
	}
	
	/*======================================================================*\
	Function:	UserAgent
	Descriiption: Возвращает браузер пользователя
	\*======================================================================*/
	public function UserAgent(){
		
		return $this->TextClean($_SERVER['HTTP_USER_AGENT']);
		
	}
		
	/*======================================================================*\
	Function:	TextClean
	Descriiption: Очистка текста
	\*======================================================================*/
	public function TextClean($text){
		
		$array_find = array("`", "<", ">", "^", '"', "~", "\\");
		$array_replace = array("&#96;", "&lt;", "&gt;", "&circ;", "&quot;", "&tilde;", "");
		
		
		
		return str_replace($array_find, $array_replace, $text);
		
	}
	/*======================================================================*\
	Function:	ShowError
	Descriiption: Выводит список ошибок строкой
	\*======================================================================*/
	public function ShowError($errorArray = array(), $title = "Исправьте следующие ошибки"){
		
		if(count($errorArray) > 0){
		
		$string_a = "<div class='Error'><div class='ErrorTitle'>".$title."</div><ul>";
		
			foreach($errorArray as $number => $value){
				
				$string_a .= "<li>".($number+1)." - ".$value."</li>";
				
			}
			
		$string_a .= "</ul></div><BR />";
		return $string_a;
		}else return "Неизвестная ошибка :(";
		
	}
	
	/*======================================================================*\
	Function:	ControlCode
	Descriiption: Возвращает контрольное число
	\*======================================================================*/
	public function ControlCode($time = 0){
		
		return ($time > 0) ? date("Ymd", $time) : date("Ymd");
		
	}

	
    public function ifnot_utf($str){ // Функция из UTF-8 
    if(!preg_replace('#[\x00-\x7F]|\xD0[\x81\x90-\xBF]|\xD1[\x91\x80-\x8F]#s', '', $str )) {  
        $str = iconv('UTF-8','windows-1251', $str);
    }
    return $str;
    }
		public function Butgoto($A){ // Aree Buttongoesto
	        $text = stripcslashes($A);
			$_pattern = array("#services", "#portfolio", "#about", "#team", "#contact", "http://", "https://");
			$_replacement = array("Introduction", "Gallery", "Vertical items", "Team", "Contact us", "", "");
			$_return = str_ireplace($_pattern, $_replacement, $text);
		return $_return;
	}
			public function Butgotono($A){ // Aree Buttongoesto
	        $text = stripcslashes($A);
			$_pattern = array("header-bg.jpg", "#services", "#portfolio", "#about", "#team", "#contact", "www.");
			$_replacement = array("0", "1", "2", "3", "4", "5", "");
			$_return = str_ireplace($_pattern, $_replacement, $text);
		return $_return;
	}
	  
    public function img_crop($image, $w_o, $h_o, $posi) {
    if (($w_o < 0) || ($h_o < 0)) {
      echo "Некорректные входные параметры";
      return false;
    }
    list($w_i, $h_i, $type) = getimagesize($image); // Получаем размеры и тип изображения (число)
    $types = array("", "gif", "jpeg", "png"); // Массив с типами изображений
    $ext = $types[$type]; // Зная "числовой" тип изображения, узнаём название типа
    if ($ext) {
      $func = 'imagecreatefrom'.$ext; // Получаем название функции, соответствующую типу, для создания изображения
      $img_i = $func($image); // Создаём дескриптор для работы с исходным изображением
    } else {
      echo 'Некорректное изображение'; // Выводим ошибку, если формат изображения недопустимый
      return false;
    }
	if($h_i == $h_o){
	$wig = $w_i - $w_o; // От ширены отрезаем
    if(($posi == 0) || ($posi == 3) || ($posi == 1) || ($posi > 4)){ $top = 0; $left = $wig/2;}
	if($posi == 2){ $top = 0; $left = $wig;}
	if($posi == 4){ $top = 0; $left = 0;}
	$width = $w_o;
	$height = $h_o;
	}else if($w_i == $w_o){
	$hig = $h_i - $h_o; // От ширены отрезаем 
    if(($posi == 0) || ($posi == 2) || ($posi == 4) || ($posi > 4)){ $top = $hig/2; $left = 0;}
	if($posi == 1){ $top = 0; $left = 0;}
	if($posi == 3){ $top = $hig; $left = 0;}	
	$width = $w_o;
	$height = $h_o;
	}
	
    $img_o = imagecreatetruecolor($width, $height); // Создаём дескриптор для выходного изображения
    imagecopy($img_o, $img_i, 0, 0, $left, $top, $width, $height); // Переносим часть изображения из исходного в выходное
    $func = 'image'.$ext; // Получаем функция для сохранения результата
    return $func($img_o, $image); // Сохраняем изображение в тот же файл, что и исходное, возвращая результат этой операции
  }
    public function size_img($smil, $image, $w_o, $h_o, $crop, $posi){
   list($w_i, $h_i, $type) = getimagesize($image); // Получаем размеры и тип изображения (число)
   $types = array("", "gif", "jpeg", "png"); // Массив с типами изображений
   $ext = $types[$type]; // Зная "числовой" тип изображения, узнаём название типа
   $create = 'imagecreatefrom'.$ext; // Получаем название функции, соответствующую типу, для создания изображения
   $reset = 'Image'.$ext;
   $img = $create($image); // Создаём дескриптор для работы с исходным изображением
    if($w_i > $w_o || $h_i > $h_o){
    if($w_i > $h_i){ 
	$h = $h_o;
	if((($w_i/$h_i)*$h) >= $w_o){ $w = ($w_i/$h_i)*$h; }else{ $w =  $w_o;}
	}else{
	$w = $w_o;
	$h = ($h_i/$w_i)*$w;
	}
	}else{
    $w = $w_o;
	$h = $h_i;
    }	
    $srcWidth  = ImageSX($img); 
    $srcHeight = ImageSY($img); 
    $resImage = ImageCreateTrueColor($w, $h);
    imagesavealpha($resImage, true );
	imagealphablending($resImage, false );
    ImageCopyResampled($resImage, $img, 0, 0, 0, 0, $w, $h, $srcWidth, $srcHeight); 
	 $r = $reset($resImage, $smil);
	 $des = ImageDestroy($img);
	 $des1 = ImageDestroy($resImage);
	 if($crop == true){ $crop = $this->img_crop($smil, $w_o, $h_o, $posi);  }else{ $crop = false;}
	 
	 
	return $r; $des; $des1;
  }
  
   public function size_img_big($smil, $image, $w_o, $h_o){
   list($w_i, $h_i, $type) = getimagesize($image); // Получаем размеры и тип изображения (число)
   $types = array("", "gif", "jpeg", "png"); // Массив с типами изображений
   $ext = $types[$type]; // Зная "числовой" тип изображения, узнаём название типа
   $create = 'imagecreatefrom'.$ext; // Получаем название функции, соответствующую типу, для создания изображения
   $reset = 'Image'.$ext;
   $img = $create($image); // Создаём дескриптор для работы с исходным изображением
   if(($w_i > $w_o) || ($h_i > $h_o)){
   if($w_o > 10){ 
	$w = $w_o;
	$h = ($h_i/$w_i)*$w;
	}else if($h_o > 10){
	$h = $h_o;
	$w = ($w_i/$h_i)*$h;
	}
	}else{
	$w = $w_i;
	$h = $h_i;
	}
    $srcWidth  = ImageSX($img); 
    $srcHeight = ImageSY($img); 
    $resImage = ImageCreateTrueColor($w, $h);
    imagesavealpha($resImage, true );
	imagealphablending($resImage, false );
    ImageCopyResampled($resImage, $img, 0, 0, 0, 0, $w, $h, $srcWidth, $srcHeight); 
	 $r = $reset($resImage, $smil);
	 $des = ImageDestroy($img);
	 $des1 = ImageDestroy($resImage);
	 if($w > 980){ $war = $this->size_img_big($smil, $image, 980, false); }
	 if($h > 800){ $war = $this->size_img_big($smil, $image, false, 800); }
	return $r; $des; $des1; $war;
	
  }

  public function text_wizwi($text){

	  $_pattern = array('border-box:', 'color:', 'font-family:', 'Roboto Slab', 'Helvetica Neue', 'Helvetica', 'Arial', 'sans-serif', 'font-size:', 'line-height:', 'text-align:', 'background-color:', 'background');
	  $_replacement = array('ttt:', 'ttt:', 'ttt:', 'ttt:', 'ttt:', 'ttt:', 'ttt:', 'ttt:', 'ttt:', 'ttt:', 'ttt:', 'ttt:', 'ttt:');
	  $_return = str_ireplace($_pattern, $_replacement, $text);
 return $_return;
 }
	
}
?>