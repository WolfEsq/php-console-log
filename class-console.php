<?php
/**
 * Creates the "Console" class allowing output to the JavaScript console.
 *
 * @package ConsoleLog
 */

/**
 * Console class determines the user's browser and allows output to the JavaScript console.
 */
class Console {

	/**
	 * Error constant
	 *
	 * @var string
	 */
	const ERROR = 'error';

	/**
	 * Warning constant
	 *
	 * @var string
	 */
	const WARNING = 'warn';

	/**
	 * Info constant
	 *
	 * @var string
	 */
	const INFO = 'info';

	/**
	 * Debug constant
	 *
	 * @var string
	 */
	const DEBUG = 'debug';

	/**
	 * Browser constants
	 *
	 * @var string
	 */
	const BROWSER_SAFARI  = 'safari';
	const BROWSER_OPERA   = 'opera';
	const BROWSER_FIREFOX = 'firefox';
	const BROWSER_IE      = 'ie';
	const BROWSER_CHROME  = 'chrome';
	const BROWSER_UNKOWN  = 'unkown';

	/**
	 * Log formats
	 *
	 * @var string
	 */
	const FORMAT_SAFARI_LOG  = 'if(window.console){ window.console.%s("%s"); }';
	const FORMAT_FIREFOX_LOG = 'if(console){ console.%s("%s"); }';
	const FORMAT_OPERA_LOG   = 'if(opera){ opera.postError("%s"); }';
	const FORMAT_CHROME_LOG  = 'if(console){ console.%s("%s"); }';
	const FORMAT_IE_LOG      = 'alert("%s");';

	/**
	 * Print a log in the console
	 *
	 * @param *      $value      The string/object/array that you want to print in the console.
	 * @param string $type  Default the type is debug.
	 * @return void
	 */
	public static function show( $value, $type = 'debug' ) {

		// Prepare value to print (convert array/object to string).
		if ( is_array( $value ) || is_object( $value ) ) {
			$value = addslashes( self::convert_to_string( $value ) );
			$value = str_replace( "\n", "\\n", $value );
		}

		// Show in console.
		echo '<script type="text/javascript">';
		switch ( self::get_browser() ) {
			case self::BROWSER_OPERA:
				printf( self::FORMAT_OPERA_LOG, $value );
				break;
			case self::BROWSER_CHROME:
				printf( self::FORMAT_CHROME_LOG, $type, $value );
				break;
			case self::BROWSER_FIREFOX:
				printf( self::FORMAT_FIREFOX_LOG, $type, $value );
				break;
			case self::BROWSER_SAFARI:
				printf( self::FORMAT_SAFARI_LOG, $type, $value );
				break;
			default:
				// Use alerts, this works in all browsers
				printf( self::FORMAT_IE_LOG, $value );
				break;
		}
		echo '</script>';

	}

	/**
	 * Convert object or array to string
	 *
	 * @param * $value The value to pass to the console.
	 * @return string
	 */
	private static function convert_to_string( $value ) {
		ob_start();
		var_dump( $value );
		$string = ob_get_contents();
		ob_end_clean();
		return $string;
	}

	/**
	 * Get the browser type
	 *
	 * @return string
	 */
	public static function get_browser() {

		$useragent = $_SERVER['HTTP_USER_AGENT'];

		if ( preg_match( '|MSIE ([0-9].[0-9]{1,2})|', $useragent, $matched ) ) {
			$browser_version = $matched[1];
			return self::BROWSER_IE;

		} elseif ( preg_match( '|Opera ([0-9].[0-9]{1,2})|', $useragent, $matched ) ) {
			$browser_version = $matched[1];
			return self::BROWSER_OPERA;

		} elseif ( preg_match( '|Chrome/([0-9\.]+)|', $useragent, $matched ) ) {
			$browser_version = $matched[1];
			return self::BROWSER_CHROME;

		} elseif ( preg_match( '|Firefox/([0-9\.]+)|', $useragent, $matched ) ) {
			$browser_version = $matched[1];
			return self::BROWSER_FIREFOX;

		} elseif ( preg_match( '|Safari/([0-9\.]+)|', $useragent, $matched ) ) {
			$browser_version = $matched[1];
			return self::BROWSER_SAFARI;

		} else {
			return self::BROWSER_UNKOWN;
		}
	}
}
