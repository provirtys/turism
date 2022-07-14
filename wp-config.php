<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'turism' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'F01S9!W>so_!0*Xp*Mo33XsvFhL+g 6_q4,RQ{n;i!w9ODrsFVbpf}*KQn8rg 3Q' );
define( 'SECURE_AUTH_KEY',  'YV.fFU!c.56.wT#CB4Q4)MC{e$JEPPgZe-etR9CJE0e8w%Yk5J(}hK`(k;,OP$M#' );
define( 'LOGGED_IN_KEY',    'D71nI]_VttHQL/%4?pf[$>b)c[7sB~HFm#8^D{G2aK+%6LU81~pGE|!c8;Pz#UL.' );
define( 'NONCE_KEY',        'k9M#(w3h[la6|tlt,JRI[1{@$yP6R1^w%:^mE2~ps5J_2xvjS i$AjSknr9f^,.8' );
define( 'AUTH_SALT',        'yYwgI.wP/E8{_@R`cWYi[md/v@j1Z&%`mTBtndXh]g8ty9/u2.a9#~k:-<]ojZx+' );
define( 'SECURE_AUTH_SALT', 'EBe|OuzYdEz[.tDp6xp=gt_P/|XJ^:oh3B`:=NHT2Q,4;@uuN|+SNX.C~&h]6mYw' );
define( 'LOGGED_IN_SALT',   'Rkn0&N(;X&aJZxtgZPjs{|eVPtz!yCkI?U3soy~a=m@<jf;Z-H0 gpWsHX<xdfef' );
define( 'NONCE_SALT',       'Z{<V/rez$d+XAzqY&v3Ied<!WRBRiA^2U~Liy]f)b.E`ToI0T>z3Aq1(W,iJyzO|' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
