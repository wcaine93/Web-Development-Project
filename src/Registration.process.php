<?php
/**
 * Processes form output from PortalRegistrationForm.html, redisplaying and notifying user on 
 * invalid input or uploading information to database and moving to ClassRegistrationForm.html
 * on valid input
 */

// Allow for display of errors on error page
include('HasError.inc.php'); // methods error($error_message), display()
page('Registration');


/**
 * I: Validates format of email and assigns valid string to $email
 * 
 * @see https://www.linuxjournal.com/article/9585
 */

/**
 * Validates format of email address. Taken from {@link https://www.linuxjournal.com/article/9585}
 * with domain validation altered.
 *
 * @param	String	$email	email address for validation
 * @return	bool	true if email address format correct, else false
 */
function validEmail($email) {
	// email must contain @
	$atIndex = strrpos($email, "@");
	if (is_bool($atIndex) && !$atIndex) {
		error('Your email must contain an @ sign');
		return false;
	}
	
	// email must be of domain @wildcat.fvsu.edu or @fvsu.edu
	$domain = substr($email, $atIndex);
	if (preg_match('/@(wildcat.)?fvsu.edu/', $domain) == FALSE) {
		error('This is not a Fort Valley State University email address');
		return false;
	}
	
	// local part validation
	$local = substr($email, 0, $atIndex);
	$localLen = strlen($local);
	if ($localLen < 1) {
		error('Your email is missing the part before the @ sign');
		return false;
	}
	if ($localLen > 64) {
		error('Your email is too long. Are you sure you entered it correctly?');
		return false;
	}
	if ($local[0] == '.') {
		error('Your email should not begin with .');
		return false;
	}

	if ($local[$localLen-1] == '.') {
		error('Your email should not have a . before the @ sign');
		return false;
	}
	if (preg_match('/\\.\\./', $local)) {
		error('Your email should not have .. in it');
		return false;
	}
	// check if there are unquoted special characters
	if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\","",$local))) {
		if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\","",$local))) {
			error('Your email contains an invalid character before the @ sign');
			return false;
		}
	}
	
	return true;
}

$email = $_POST['email'];
validEmail($email);


/**
 * II: Validate format of student ID (series of 9 digits starting with 910)
 */
$id = $_POST['student_id'];
if (preg_match('/910[0-9]{6}/', $id) == 0) {
	error('Invalid student ID. Must be in the form 910XXXXXX');
}


/**
 * III: Validate PIN (8-20 characters, matching confirm PIN field)
 */
$new_password = $_POST['new_PIN'];
$confirm_password = $_POST['confirm_PIN'];

// new and confirm PINs must match
if (strcmp($new_password, $confirm_password) != 0) {
	error('Confirm PIN must be the same as chosen PIN');
}

// PIN length
if (strlen($new_password) < 8 || strlen($confirm_password) < 8) {
	error('The chosen PIN is too short. Must be at least 8 characters');
}
if (strlen($new_password) > 20 || strlen($confirm_password) > 20) {
	error('The chosen PIN is too long. Must be no more than than 20 characters long.');
}

/**
 * IV: Display error page or place information into database
 */
if (display()) die();

// 
?>