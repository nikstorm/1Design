<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
# Skype: studio_sv700
# Email: valentynborisovich@gmail.com
###########################################

# Счетчик
function TimerSet(){
	list($seconds, $microSeconds) = explode(' ', microtime());
	return $seconds + (float) $microSeconds;
}

$_timer_a = TimerSet();

# Старт сессии
@session_start();

# Старт буфера
@ob_start();

# Default
$_OPTIMIZATION = array();
$_OPTIMIZATION["title"] = "Coffeelini Welcome to Admin";
$_OPTIMIZATION["description"] = "Coffeelini Welcome to Admin";
$_OPTIMIZATION["keywords"] = "Coffeelini Welcome to Admin";

# Константа для Include
define("CONST_RUFUS", true);

# Автоподгрузка классов
function __autoload($name){ include("coffeelini_adm/classes/_class.".$name.".php");}

# Функции
$func = new func;

# Шапка
@include("coffeelini_adm/_header.php");

if(!isset($_SESSION["admin"])){ include("coffeelini_adm/_login.php"); return; return;}

		if(isset($_GET["menu"])){
		
			$menu = strval($_GET["menu"]);
			
			switch($menu){
				case "404": include("coffeelini_adm/_404.php"); break; // Страница ошибки
				case "admin4ik": include("coffeelini_adm/_index.php"); break; // Админка
				case "exit": @session_destroy(); Header("Location: /admin"); return; break; // Выход
			# Страница ошибки
			default: @include("coffeelini_adm/_404.php"); break;
			
			}
			
		}else @include("coffeelini_adm/_index.php");


# Подвал
@include("coffeelini_adm/_footer.php");


# Заносим контент в переменную
$content = ob_get_contents();

# Очищаем буфер
ob_end_clean();
	
	# Заменяем данные
	$content = str_replace("{!TITLE!}",$_OPTIMIZATION["title"],$content);
	$content = str_replace('{!DESCRIPTION!}',$_OPTIMIZATION["description"],$content);
	$content = str_replace('{!KEYWORDS!}',$_OPTIMIZATION["keywords"],$content);
	$content = str_replace('{!GEN_PAGE!}', sprintf("%.5f", (TimerSet() - $_timer_a)) ,$content);
		
// Выводим контент
echo $content;
?>