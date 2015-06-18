<?php
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ek$-plyq;J<6ErNJ.SQzcH@y=ze+Rj9PW%8dg.ubU#{P=4rgP,~-|WQ8uZ(YhDH+');
define('SECURE_AUTH_KEY',  'f#l^{H#}ye1+{b+XfBCZZe9g,w=Q~aoeG@-8}s`rXJY(bu:(,D++)p:y$+poFTNc');
define('LOGGED_IN_KEY',    '*-=1P|2;V(Rxy+ebFYiP-u/)]H8%C,/x<jh#l-xdm/+NTdyf!S@qfv^kJk `LL{L');
define('NONCE_KEY',        '8f}oJTC_4UM1P)Q(HFL )|Aw>i^t2ULi?}|27*`|I3VEaFK}8e-A2qCP8|<h>v&*');
define('AUTH_SALT',        '-E5uiJ.%/.)H+qhVXJ*x6Fq3D7,1(L>SJKJdr-a=#mL:i`<c_@^?ALl<M1QEll%1');
define('SECURE_AUTH_SALT', 'Y pu36Xv!YL]:I&U4`Nv5<cK!^WMa6/Pt`F-a[9v4=7.-i]oe23oT Xt}PLvK!8g');
define('LOGGED_IN_SALT',   'Y_LcjlZ-Xp%-)M|mKB+k3FK_fl(B*)[HcQuDEV|!|tw@XrYj>!U3xyzQPn6AQ}G@');
define('NONCE_SALT',       ':?`gByN YfTBYRg{Pk^8Yy4Nn%oB%<rX-Z)U=V=x*[}f)HVd81(}M%mOE6|Xo?/L');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

define('WPLANG', '');
