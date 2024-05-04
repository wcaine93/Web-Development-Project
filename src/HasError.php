<?php
/**
 * Driver class for ErrorPage.html.php, collects errors for display on error page to user
 *
 * @see ErrorPage.html.php
 */

$file_name = basename(__FILE__); // file that calls HasError, for use on display page
$page_name = $file_name; // default page name to file name
$errors = [];

/**
 * Adds error text to $errors array
 *
 * @param	String	$error_text
 * @return	void
 */
function error($error_text) {
	global $errors;
	$errors[] = $error_text;
}

/**
 * Set page name for display on error page
 *
 * @return	void
 */
function page($name) {
	global $page_name;
	$page_name = $name;
}

/**
 * Displays error page using $errors array
 *
 * @return	void
 */
function display() {
	ob_start();
	include('ErrorPage.html.php');
	echo ob_get_clean();
}
?>