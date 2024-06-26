<?php
/**
 * Driver class for ErrorPage.html.php, collects errors for display on error page to user. When included, page($name) should be called
 *
 * @see ErrorPage.html.php
 */

$file_name = basename(__FILE__); // file that calls HasError
$page_name = $file_name; // default page name to file name
$errors = [];

/**
 * Adds error text to $errors array
 *
 * @param	String	$error_text
 * @return	void
 */
function error($error_message) {
	global $errors;
	$errors[] = $error_message;
}

/**
 * Set file name for redirection from error page
 *
 * @return	void
 */
function redirect($name) {
	global $file_name;
	$file_name = $name;
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
 * Displays error page using $errors array.
 *
 * @return	bool	true if page displayed, false if no errors
 */
function display() {
	global $errors;
	if (count($errors) == 0) return false;
	
	ob_start();
	include('ErrorPage.html.php');
	echo ob_get_clean();
	return true;
}
?>