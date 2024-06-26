<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
<link href="style.css" rel="stylesheet">

<head>
	<meta charset="utf-8">
  	<meta http-equiv="x-ua-compatible" content="ie=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- Register for registration portal -->
  	<title>Sign up to use SeatMe Registration Portal</title>
</head>
<body class="bkg">
	<div id="header">
		<!--FIXME: header-->
	</div>
	<div id="display_panel" class="center" >
		<div id="page_title">
			<h1 class="centertext notop" id="sign_up_for_registration_portal">Sign up for SeatMe <a href="LandingPage.html.php"><img alt="SeatMe logo" width="20" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0e/Windsor_Chair.svg/716px-Windsor_Chair.svg.png?20200505051955"></a>&nbsp; Registration Portal</h1>
		</div>
		<div id="signup_form">
			<div id="form_information">
				<p class="centertext" style="font-size:.9em">Note: All fields are required</p>
			</div>
			<form action="Registration.process.php" method="post" accept-charset="utf-8">
				<div id="inputs">
					<div class="row" id="student_email">
						<label for="email">Student Email</label>
						<input type="email" name="email" autocomplete="email" pattern="\S+@(wildcat.)?fvsu.edu" placeholder="      @wildcat.fvsu.edu" minlength="9" style="width: 13em" id="email">
					</div>
					<div class="row" id="student_id">
						<label for="username">Student ID</label>
						<input type="text" name="student_id" autocomplete="username" placeholder=" 910XXXXXX" minlength="9" maxlength="9" style="width: 15em" id="username">
					</div>
					<div class="row" id="new_PIN">
						<label for="new_password">New PIN</label>
						<input type="text" name="new_PIN" autocomplete="new-password" placeholder=" Between 8 and 20 characters" minlength="8" maxlength="20" style="width: 16em" id="new_password">
					</div>
					<div class="row" id="confirm_PIN">
						<label for="confirm_password">Confirm PIN</label>
						<input type="password" name="confirm_PIN" autocomplete="current-password" placeholder=" Must be the same as above" minlength="8" maxlength="20" style="width: 14em" id="confirm_password">
					</div>
				</div>
				<div id="submit" class="centertext" style="margin-top: 60px /* to match page_title margin */">
					<input type="submit" name="submit" class="button" value="Sign Up">
				</div>
			</form>
		</div>
	</div>
	<div id="footer">
		<!--FIXME: footer-->
	</div>
</body>
</html>