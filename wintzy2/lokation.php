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

# Константа для Include
define("CONST_RUFUS", true);

# Автоподгрузка классов
function __autoload($name){ include("coffeelini_adm/classes/_class.".$name.".php");}

# Функции
$func = new func;

	if(isset($_GET["menu"])){
		
			$menu = strval($_GET["menu"]);
			
			switch($menu){

				case "login": include("coffeelini_adm/_login_form.php"); break; //
				case "dashboard": include("coffeelini_adm/_index.php"); break; //
				case "appearance": include("coffeelini_adm/pages/_appearance.php"); break; //
                case "contents": include("coffeelini_adm/pages/_contents.php"); break; //
				case "message": include("coffeelini_adm/pages/_message.php"); break; //
				case "settings": include("coffeelini_adm/pages/_settings.php"); break; //
				case "stats": include("coffeelini_adm/pages/_stats.php"); break; //
				// Modules
				case "about": include("coffeelini_adm/mainmodules/_about.php"); break; //
				case "contact": include("coffeelini_adm/mainmodules/_contact.php"); break; //
				case "footer": include("coffeelini_adm/mainmodules/_footer.php"); break; //
				case "header": include("coffeelini_adm/mainmodules/_header.php"); break; //
				case "photos": include("coffeelini_adm/mainmodules/_photos.php"); break; //
				case "team": include("coffeelini_adm/mainmodules/_team.php"); break; //
				case "whatwe": include("coffeelini_adm/mainmodules/_whatwe.php"); break; //
				// Processor
				case "icosave": include("coffeelini_adm/processor/upload_favicon.php"); break; //
				case "contsave": include("coffeelini_adm/processor/contents_save.php"); break; //
				case "customcode": include("coffeelini_adm/processor/save_custom.php"); break; //
				case "header_img_up": include("coffeelini_adm/processor/header_img_up.php"); break; //
				case "header_set_post": include("coffeelini_adm/processor/header_set_post.php"); break; //
				case "introduction_post": include("coffeelini_adm/processor/introduction_post.php"); break; //
				case "portfolio_post": include("coffeelini_adm/processor/portfolio_post.php"); break; //
				case "portfolio_get": include("coffeelini_adm/mainmodules/_photos_redact.php"); break; //
				case "portfolio_img_up": include("coffeelini_adm/processor/portfolio_img_up.php"); break; //
				case "about_post": include("coffeelini_adm/processor/about_post.php"); break; //
				case "about_up_img": include("coffeelini_adm/processor/about_up_img.php"); break; //
				case "item_img_up": include("coffeelini_adm/processor/item_img_up.php"); break; //
				case "item_post": include("coffeelini_adm/processor/item_post.php"); break; //
				case "contact_us_post": include("coffeelini_adm/processor/contact_us_post.php"); break; //
				case "contact_us_img_up": include("coffeelini_adm/processor/contact_us_upload.php"); break; //
				case "aparance_post": include("coffeelini_adm/processor/aparance_post.php"); break; //
				case "portfo_dvig": include("coffeelini_adm/processor/portfo_dvig.php"); break; //
				case "about_dvig": include("coffeelini_adm/processor/about_dvig.php"); break; //
				
				case "send": include("mail/contact_me.php"); break; //
			# Страница ошибки
			default: @include("coffeelini_adm/_404.php"); break;
			
			}
			
	}else @include("coffeelini_adm/_index.php");
?>