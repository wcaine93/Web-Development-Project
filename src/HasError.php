<?php
/**
 * Driver class for ErrorPage.html.php, collects errors for display on error page to user
 *
 * @see ErrorPage.html.php
 */

$page_name = __FILE__; // default page name to file name
$errors = [];

/**
 * Adds error text to $errors array
 *
 * @param	String	$error_text
 * @return	void
 */
function error($error_text) {
	$errors[] = $error_text;
}

/**
 * Set page name for display on error page
 *
 * @return	void
 */
function page($name) {
	$page_name = 'the' . $name;
}

/**
 * Displays error page using $errors array
 *
 * @return	void
 */
function display() {
	readfile('ErrorPage.html.php');
}
?>
