# PHP Console Log

Contributors: WolfEsq <br>
Requires at least: 3.0 <br>
Tested up to: 4.9.8 <br>
Requires PHP: 5.2 <br>
Stable tag: 1.0.1 <br>
License: GPL 2 <br>

Allows you to write PHP log/debug information to the browser JavaScript console. You can use console_log() in your PHP just like you would use console.log() in JavaScript.

## Examples

 * console_log( "Content to log:" . $variable , 'info' );
 * console_log( $array , 'error' );
 * console_log( $object , 'warning' );
 * console_log( "Debug test" , 'debug' );

 Make sure the console is set to show debug or in verbose mode if you use 'debug'.

## Installation
Upload the ```php-console-log``` folder to the ```/wp-content/plugins/``` directory then activate through the Plugins dashboard in WordPress.