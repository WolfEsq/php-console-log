# Console_Log Plugin for WordPress

![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%205.2-8892BF.svg)
![GitHub license](https://img.shields.io/badge/license-GPL_2-blue.svg)

Contributors: WolfEsq  
Requires at least: 4.0  
Tested up to: 5.2.2  
Requires PHP: 5.2  
Stable tag: 1.0.1  
License: GPL 2+  

Allows you to write PHP log/debug information to the browser JavaScript console. You can use `console_log()` in your PHP just like you would use `console.log()` in JavaScript. It will automatically detect the browser you are using to correctly display the content in the console. Here is a basic example that will write a variable to the browser JavaScript console when a page loads:

 ```PHP
 console_log( $var );
 ```

This plugin also allows you to view the debug.log file (newest entries first) in the WordPress admin under the Tools menu.  

## How to Use

__console_log(__ *mixed* __$info,__ *string* __$type,__ *boolean* __$log_it );__

### Parameters

__$info__

*(string | integer | array | object | boolean) (Required)* The information to display in the console.

__$type__

*(string)* (Optional) Whether it is info, error, warning, or debug type in the console. 
*Accepts:* `info`, `debug`, `warning`, `error`
*Default value:* `'info'`

__$log_it__

(boolean) (Optional) Whether to write the $info to the error log as well.
*Default value:* `false`

### More Examples

Write string and variable to browser console at 'info' error level.
 ```PHP
 console_log( 'Content to log:' . $variable , 'info' );
 ```
   
 Write an array to the console as an error.
 ```PHP
 console_log( $array , 'error' );
 ```
   
 Write an object to the console as a warning. 
 ```PHP
 console_log( $object , 'warning' );
 ```
   
 Write string to the console as debug. Make sure console shows debug or verbose levels.
 ```PHP
 console_log( 'Debug test' , 'debug' );
 ```
   
 Passing the third parameter ( *$log_it* ) as true will write write the values to the WordPress `debug.log` file (if enabled).
 ```PHP
 console_log( $variable, 'warning', true );
 ```

## Installation
Upload the ```php-console-log``` folder to the ```/wp-content/plugins/``` directory then activate through the Plugins dashboard in WordPress.
