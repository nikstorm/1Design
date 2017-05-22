<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'pets2');

/** Имя пользователя MySQL */
define('DB_USER', 'pets2');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'H5r8L8p7');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '27fW-5X14zHLp6|# r#eJQoCny>;Skz?W:k&#rAP#wzEv?c*W`(<hjvdh=q[jSDb');
define('SECURE_AUTH_KEY',  '?Z=n*+DfV;4W>@&447Z;mzoV;]Z7PRV3:OVe9ko*$vY8[=6LK9v$1KxgTx);tgvn');
define('LOGGED_IN_KEY',    'G`SIu{^b}~r8@eI.qoOb>L?Ma0hO^,~JxS)5FW;TS_v=4,$hC?5dHL9KVMg{`(8`');
define('NONCE_KEY',        '3y1S$3S{w%|X{^A~@|#etb3A6pL^kgYq!JD@Y[g?Qv6U$3Fx@%^B ~.Jmb2)Qj k');
define('AUTH_SALT',        ']ouNpFCCnfd2&$*x^EX/eKHOYA%=!pp>)ZJ ,#uBP:mM PHOXV*xoAkbh&TCLy&Y');
define('SECURE_AUTH_SALT', 'J1]m%Cr%Te`DM&6`Y=DOi=JQF~M|ov||DM_L`f^~:Y7d~#)cgmZ0qd^oOge@IC4Z');
define('LOGGED_IN_SALT',   'G)~<xD<t4Lw_LBDY;v{[HO}n2d7lyS[pP@4eZ5iHMlkPJuM7mx_<u&`0gs70,jfE');
define('NONCE_SALT',       'V^$z<S8SarP|fz}cO.|5B<sGi;;=tlhL#dNP*U(s14agcQg5Nt`HF_uc56^UB^k=');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
