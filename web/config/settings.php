<?php

error_reporting(0);
ini_set('display_errors', '0');

// Timezone
date_default_timezone_set('Europe/London');

return [

	'root' => dirname(__DIR__),
	'temp' => dirname(__DIR__) . '/tmp',
	'public' => dirname(__DIR__) . 'public',
	'error' => [
		// Should be set to false in production
		'display_error_details' => true,

		// Parameter is passed to the default ErrorHandler
		// View in rendered output by enabling the "displayErrorDetails" setting.
		// For the console and unit tests we also disable it
		'log_errors' => true,

		// Display error details in error log
		'log_error_details' => true
	]

];