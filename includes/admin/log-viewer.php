<?php
/**
 * Simple page that shows the debug.log entries (newest first) under the Tools admin submenu.
 *
 * @package ConsoleLog
 */

/**
 * Create the Debug Log menu item in the WordPress admin page under the tools submenu.
 */
function php_console_log_viewer() {
	add_submenu_page( 'tools.php', 'Log Viewer', 'Debug Log', 'manage_options', 'php-console-log', 'show_php_console_log_viewer' );
}
add_action( 'admin_menu', 'php_console_log_viewer' );



/**
 * Create the Debug Log page content.
 */
function show_php_console_log_viewer() {

	ob_start();
	?>
	<div class="wrap">
		<h2>Debug Log Viewer</h2>
	</div>
		<br>
		<br>
	<div>
		<?php
		$logfile = file_get_contents( WP_CONTENT_DIR . '/debug.log' );
		$logs    = array_reverse( explode( '[', $logfile ) );

		foreach ( $logs as $log ) {
			echo '[' . $log . '<br><br>';
		}
		?>
	</div>
	<?php
	$debug_log_page = ob_get_clean();
	echo $debug_log_page;
}
