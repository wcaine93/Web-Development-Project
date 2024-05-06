<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
<link href="style.css" rel="stylesheet">

<head>
	<meta charset="utf-8">
  	<meta http-equiv="x-ua-compatible" content="ie=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- SeatMe Landing Page -->
  	<title>Welcome to SeatMe!</title>
</head>
<body class="bkg">
	<div id="header">
		<!--FIXME: header-->
	</div>
	<div id="display_panel" class="center" >
		<div id="page_title">
			<h1 class="centertext notop" id="welcome_to_seatme_registration_portal">Welcome to SeatMe <a href="LandingPage.html.php"><img alt="SeatMe logo" width="20" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0e/Windsor_Chair.svg/716px-Windsor_Chair.svg.png?20200505051955"></a>&nbsp; Registration Portal!</h1>
		</div>
		<div id="site_information">
			<p class="centertext" style="margin: 100px; margin-top: 0px">SeatMe <a href="LandingPage.html.php"><img alt="SeatMe logo" width="20" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0e/Windsor_Chair.svg/716px-Windsor_Chair.svg.png?20200505051955"></a>&nbsp; is a revolutionary student registration portal designed after the Coursicle framework. Imagine being able to register for classes in the click of a button. Now you can!</p>
		</div>
		<div class="row" id="signup_login_buttons" style="font-size: 1.5em; margin-bottom: 30px /* to match page_title margin */">
			<div id="sign_up_button">
				<form action="PortalRegistrationForm.html.php" method="post" accept-charset="utf-8">
						<input type="submit" name="submit" class="button" value="Sign Up">
				</form>
			</div>
			<div id="log_in_button">
				<form action="PortalLoginForm.html.php" method="post" accept-charset="utf-8">
					<input type="submit" name="submit" class="button" value="Log In">
				</form>
			</div>
		</div>
	</div>
	<div id="footer">
		<!--FIXME: footer-->
	</div>
</body>
</html>