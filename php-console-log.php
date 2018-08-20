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
 * @example console_log( 'Content to log:' . $variable , 'info' );
 * @example console_log( $array , 'error' );
 * @example console_log( $object , 'warning' );
 * @example console_log( "Debug test" , 'debug' ); // Make sure the console is set to show debug or in verbose mode.
 * @example console_log( array( 'one', 'two', 'three' ), 'warning', true ); // Print array and write it to debug.log if enabled.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Require the Console class file.
require dirname( __FILE__ ) . '/includes/classes/class-console.php';

/**
 * Include the Debug Log admin page in Tools submenu if debug.log is enabled in wp-config.php.
 */
if ( ( true === WP_DEBUG ) && ( true === WP_DEBUG_LOG ) ) {
	include_once dirname( __FILE__ ) . '/includes/admin/log-viewer.php';
}

if ( ! function_exists( 'console_log' ) ) {
	/**
	 * Translate simplified function to Console class
	 *
	 * @param *      $info The information to display in the console.
	 * @param string $type Whether it is info, error, warning, or debug type in the console.
	 * @param bool   $log_it Whether to write the $info to the error log as well.
	 */
	function console_log( $info, $type = 'info', $log_it = false ) {

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

		// Write to the JavaScript console using the Console class.
		Console::show( $info, $output_type );

		// Write to debug.log if debugging is enabled and $log_it is true.
		if ( true === $log_it ) {
			write_log( $info );
		}

	}
}

if ( ! function_exists( 'write_log' ) ) {
	/**
	 * Record debugging in the error log if debugging is enabled in wp-config.php.
	 *
	 * @param string $info The value to write to the log.
	 */
	function write_log( $info ) {

		if ( ( true === WP_DEBUG ) && ( true === WP_DEBUG_LOG ) ) {

			if ( is_array( $info ) || is_object( $info ) ) {
				error_log( print_r( $info, true ) );
			} else {
				error_log( $info );
			}
		}
	}
}
