<?php
/**
 * Configuración de wordpress para diferentes ambientes.
 *
 * No editar este archivo, cualquier configuración debe
 * hacerse dentro del directorio config.
 */

// Existe la variable 'WP_ENV'.
if (getenv('WP_ENV') !== false) {
    // Filtrado por seguridad.
    define('WP_ENV', preg_replace('/[^a-z]/', '', getenv('WP_ENV')));
}

// Define site host.
if (isset($_SERVER['X_FORWARDED_HOST']) && !empty($_SERVER['X_FORWARDED_HOST'])) {
    $hostname = $_SERVER['X_FORWARDED_HOST'];
} else {
    $hostname = $_SERVER['HTTP_HOST'];
}

// Si aun no esta definido el ambiente intenta con el hostname.
if (!defined('WP_ENV')) {
    require_once(dirname(__FILE__) . '/config/wp-environment.php');
}

// Define el protocolo.
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
    $protocol = 'https://';
} else {
    $protocol = 'http://';
}

// Cargar la configuración default.
require_once(dirname(__FILE__) . '/config/wp-default.php');

// Cargar configuración por ambiente.
require_once(dirname(__FILE__) . '/config/wp-' . WP_ENV . '.php');

// Debemos cambiar estas dos constantes para reflejar el ambiente
// en el que estamos actualmente, esto sobreescribe las opciones
// que se definen en base de datos.
if (!defined('WP_HOME')) {
    define('WP_HOME', $protocol . rtrim($hostname, '/'));
}
if (!defined('WP_SITEURL')) {
    define('WP_SITEURL', $protocol . rtrim($hostname, '/') . '/wp');
}

// Se define nuestro directorio de contenidos fuera del core de
// wordpress para un mejor manejo de nuestro tema.
define('WP_CONTENT_DIR', dirname(__FILE__) . '/app' );
define('WP_CONTENT_URL', WP_HOME . '/app');

// Ya no necesitamos estas variables.
unset($hostname, $protocol);

/**
 * Las líneas que siguen son parte del wp-config.php 
 * default que instala wordpress 
 */

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
