<?php
/**
 * Plugin Name: PHP Console Log
 * Plugin URI: https://
 * Description: Allows you to write PHP log/debug information to the browser JavaScript console.
 * Author: WolfEsq
 * Version: 1.0.0
 * Author URI: https://
 *
 * @package ConsoleLog
 *
 * @example console_log( "Content to log:" . $variable , 'info' );
 * @example console_log( $array , 'error' );
 * @example console_log( $object , 'warning' );
 * @example console_log( "Debug test" , 'debug' ); // Make sure the console is set to show debug or in verbose mode.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require dirname( __FILE__ ) . '/class-console.php';

/**
 * Translate simplified function to Console class
 *
 * @param *      $info The information to display in the console.
 * @param string $type Whether it is info, error, warning, or debug type in the console.
 */
function console_log( $info, $type = 'info' ) {

	$output_type = $type;

	if ( 'info' === $type ) {
		$output_type = Console::INFO;

	} elseif ( 'debug' === $type ) {

		$output_type = Console::DEBUG;

	} elseif ( 'warning' === $type ) {
			$output_type = Console::WARNING;

	} elseif ( 'error' === $type ) {
		$output_type = Console::ERROR;

	} else {
		$output_type = Console::INFO;
	}

	Console::show( $info, $output_type );

}

// console_log( array( 'one', 'two', 'three' ), 'warning' ); // test call.
