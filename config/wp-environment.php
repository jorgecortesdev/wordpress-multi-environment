<?php
// Establece el ambiente a partir del hostname
// Se pueden agregar mas casos al switch en
// caso de contar con un ambiente stage.
switch ($hostname) {
    case 'dev.midominio.com':
        define('WP_ENV', 'development');
        break;
    default: 
        define('WP_ENV', 'production');
}
