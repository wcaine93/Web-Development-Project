<?php
/**
 * Processes form output from PortalRegistrationForm.html, redisplaying and notifying user on 
 * invalid input or uploading information to database and moving to ClassRegistrationForm.html
 * on valid input
 */

// Allow for display of errors on error page
include('HasError.php'); // methods error($error_message), display()
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

validEmail($_POST['email']);
?>