<?php
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
    $_SERVER['HTTPS'] = 'on';

// ** MySQL settings ** //
/** The name of the database for WordPress */
define('DB_NAME', 'cutecrack');

/** MySQL database username */
define('DB_USER', 'cutecrack');

/** MySQL database password */
define('DB_PASSWORD', 'cut3crack42#');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('AUTH_KEY',         'Ijd!0!Y_|+F_I+MZ0ljNpYh:z>N`+-#4jSRH,no_YHLT&9yELI_I `#Nxen7f,lV');
define('SECURE_AUTH_KEY',  '+2]sGhQ<EpSfo e;A+i0hws~^C%#:}+31oLe2(7!K$O)quKH$DX(=}Yi#@V~:YQQ');
define('LOGGED_IN_KEY',    '@#$Qaf)2N |a|Y 3TjWrFl:sJ%R0/0%!D+w~$6Gh|az?GkXb*VV|H?OPx&fGwc..');
define('NONCE_KEY',        '7&Cnu3PF|^G-)Vj%Ix{n+i3!w2Dm{B8;Eh<v(81L21-Gr 6W$2J8?RGaVom*%i2W');
define('AUTH_SALT',        '|>U^(.d+jj%*/$4.m}k^1+k%b?O-QDvaC$wXT 0$%~)!D[Vo]q+]f|]N}@W:9r-I');
define('SECURE_AUTH_SALT', 'Ah:`[0=D+gSR9A%lW3[61&M#AuxozB5+?>y>sCB*[Gt#/rB89zvJzVvM+_s:xjD_');
define('LOGGED_IN_SALT',   '-P2xri;nbS%~_#gzwZH:ZBCc6A4|`F`rJPZ{#<X<?_q|#JRSY|Ik-W.|bb$YB#ha');
define('NONCE_SALT',       'I*6e%M^aHnF!.W(~=>@oWvF|iQ%o~1:!4uCL1oq)=c[S-P($7vzunF7!>pC`Zj)e');


$table_prefix = 'wp_';





/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
