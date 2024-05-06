<?php
/**
 * Starts session and contains session-related functions
 * 
 * @see DatabaseStructure.md
 */


/**
 * Redirects user to new page and terminates script
 *
 * @param	string	page address
 * @return	void
 */
function send($page) {
	header("Location: http://localhost/CSIS3743Project/$page?" . session_id());
}


/**
 * Checks session state and redirects to login page if no session has been created
 *
 * @param	string	page address
 * @return	void
 */
function session() {
	header('Location: http://localhost/CSIS3743Project/PortalLoginForm.html.php');
}


// create connection
session_start()
?>