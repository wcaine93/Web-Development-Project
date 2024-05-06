<?php
/**
 * Processes form output from PortalLoginForm.html.php, redisplaying and notifying user on
 * invalid input or uploading information to database and moving to HomePage.html.php on
 * valid input
 */

// Allow for display of errors on error page
include('HasError.inc.php'); // methods error($error_message), display()
page('Login');
redirect('PortalLoginForm.html.php');


/**
 * I: Connect to database and verify user data
 */
// connect to database
include('db_connect.inc.php'); // $mysqli object, sql_error()

// verify user exists
$id = stripslashes($_POST['student_id']);
$stmt = 'SELECT user_id FROM student_info WHERE student_id=?';
$result = $mysqli->execute_query($stmt, [$id]);
if ($result !== FALSE) {
	$user_id = $result->fetch_row[0];
	if (!($user_id >= 0)) {
		error("The student ID you entered is not registered to use SeatMe. If you entered the correct student ID, please use the Sign Up page at the top right to create an account. If you entered your student ID incorrectly, please use the back button below to re-enter it correctly. <br> The student ID you entered: $id");
		display();
		die();
	}
} else sql_error();

// compare PIN
$password = stripslashes($_POST['PIN']);
$result = $mysqli->execute_query("SELECT md5_PIN FROM users WHERE user_id=$user_id");
if ($result !== FALSE) {
	$PIN = $result->fetch_row[0];
	if (strcmp(md5($password), $PIN) != 0) {
		error('The password you entered is not what we have on file for the student ID.');
		display();
		die();
	}
} else sql_error();


/**
 * II: Start session and redirect user to next page in user flow
 */
include ('session.inc.php');
$_SESSION['user_id'] = $user_id;
send('HomePage.html.php');
?>